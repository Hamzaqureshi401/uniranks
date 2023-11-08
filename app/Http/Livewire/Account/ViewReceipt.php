<?php

namespace App\Http\Livewire\Account;

use App\Models\Transactions\InvoicePaymentReceipt;
use Livewire\Component;

class ViewReceipt extends Component
{
    public InvoicePaymentReceipt $receipt;

    public function mount(){
        $this->receipt->load(['invoice.currency','invoice.paymentMethod','invoice.university.country']);
    }
    public function render()
    {
        return view('livewire.account.view-receipt');
    }
}
