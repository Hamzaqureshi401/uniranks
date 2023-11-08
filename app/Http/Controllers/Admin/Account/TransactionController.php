<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\Transactions\Invoice;
use App\Models\Transactions\InvoicePaymentReceipt;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class TransactionController extends Controller
{
    public function viewInvoice (Invoice $invoice): Factory|View|Application
    {
        return view('pages.account.view-invoice',compact('invoice'));
    }

    public function downloadInvoice (Invoice $invoice): Factory|View|Application
    {
        $invoice->load(['university.city','university.country','currency']);
        $title="UR_INVOICE_INV-".$invoice->invoice_number;
        return view('pages.account.download-invoice',compact('invoice','title'));
    }

    public function viewReceipt(InvoicePaymentReceipt $receipt): Factory|View|Application
    {
        return view('pages.account.view-receipt',compact('receipt'));
    }
    public function downloadReceipt(InvoicePaymentReceipt $receipt): Factory|View|Application
    {
        $receipt->load(['invoice.university.city','invoice.university.country','invoice.currency']);
        $title="UR_RECEIPT_NO_".$receipt->receipt_number;
        return view('pages.account.download-receipt',compact('receipt','title'));
    }


}
