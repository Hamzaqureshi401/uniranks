<?php

namespace App\Http\Livewire\Account;

use App\Models\Transactions\Invoice;

trait CanPayNow
{

    private function pay(Invoice $inv)
    {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        $checkout_session = $stripe->checkout->sessions->create
        ([
            'line_items' => [[
                'price_data' => [
                    'currency' => $inv->currency?->code,
                    'product_data' => [
                        'name' => $inv->transaction_details,
                    ],
                    'unit_amount' => round($inv->payable_amount * 100),
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => \URL::signedRoute('admin.account.payment.success', ['invoice' => $inv->id]) . "&session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => \URL::signedRoute('admin.account.payment.cancel', ['invoice' => $inv->id]),
        ]);
        return redirect()->away($checkout_session->url, 303);
    }
}
