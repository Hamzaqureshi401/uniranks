<?php

namespace App\Http\Controllers;

use App\Models\Transactions\EventCreditTransaction;
use App\Models\Transactions\Invoice;
use App\Models\Transactions\InvoicePaymentReceipt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Version\Exception;
use Stripe\Charge;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class StripeController extends Controller
{

    public function success(Invoice $invoice)
    {
//        dump($invoice);
        if ($invoice->payment_status == \AppConst::APPROVED) return redirect()->route('admin.account.invoicesList');
//        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
//
//        try {
//            $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);
//            dd($session);
//        } catch (Exception $e) {
//          dd($e);
//        }
        $invoice->load(['currency', 'university']);
        $receipt = $this->updateInvoiceAndGenerateReceipt($invoice);
        $this->updateAccountCredits($invoice);
        return view('pages.payment.success', compact('invoice', 'receipt'));
    }


    public function cancel(Invoice $invoice)
    {
        return view('pages.payment.cancel', compact('invoice'));
    }

    private function updateInvoiceAndGenerateReceipt(Invoice $invoice): Model|InvoicePaymentReceipt
    {
        $invoice->update(['payment_method_id' => \AppConst::PM_STRIPE, 'payment_status' => \AppConst::APPROVED, 'payment_date' => Carbon::now()->toDayDateTimeString()]);
        return $this->generateReceipt($invoice);
    }

    private function updateAccountCredits(Invoice $invoice)
    {
        \DB::transaction(function () use ($invoice) {
            $uni = $invoice->university;
            $uni->ur_credit += $invoice->ur_credit ?? 0;
            $uni->event_credit += $invoice->events_credit ?? 0;
            $uni->admissions_credit += $invoice->admissions_credit ?? 0;
            if (!empty($invoice->package_id)) {
                $uni->event_package_id = $invoice->package_id;
            }
            $uni->save();
            if ($invoice->events_credit > 0) {
                $uni->eventTransactions()->create([
                    'event_name' => $invoice->transaction_details,
                    'credit_out' => 0,
                    'credit_in' => $invoice->events_credit,
                    'by_user_id' => Auth::id()
                ]);
            }
            if ($invoice->ur_credit > 0) {
                $uni->repositoryTransactions()->create([
                    'description' => $invoice->transaction_details,
                    'quantity_purchased' => 0,
                    'ur_credit_out' => 0,
                    'ur_credit_in' => $invoice->ur_credit,
                    'by_user_id' => Auth::id()
                ]);
            }

        });

    }

    private function generateReceipt(Invoice $invoice): Model|InvoicePaymentReceipt
    {
        $last_receipt = InvoicePaymentReceipt::latest()->first(['receipt_number']);
        $receipt_number = !empty($last_receipt) ? ++$last_receipt->receipt_number : 173001;
        $invoice_number = "Inv-" . $invoice->invoice_number;
        return InvoicePaymentReceipt::create([
            'invoice_id' => $invoice->id,
            'receipt_number' => $receipt_number,
            'description' => "For Invoice# $invoice_number",
            'amount' => $invoice->payable_amount, 'created_by_id' => \Auth::id()
        ]);
    }


    public function stripe(Invoice $invoice)
    {
        $invoice->load('currency', 'university');
        return view('stripe', compact('invoice'));
    }

    /**
     * @throws ApiErrorException
     */
    public function stripePost(Request $request, Invoice $invoice)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create([
            "amount" => $invoice->payable_amount,
            "currency" => $invoice->currency?->code,
            "source" => $request->stripeToken,
            "description" => "Payment For Invoice# INV-" . $invoice->invoice_number,
        ]);

        \Session::flash('success', 'Payment Successfull!');;
        return back();
    }
}
