<?php

namespace App\Http\Livewire\Account;

use App\Models\Transactions\EventCreditTransaction;
use Livewire\Component;

class EventCreditTransactions extends Component
{
    public $balance = 0;

    public function render()
    {
        $invoices = $this->loadInvoices();
        return view('livewire.account.event-credit-transactions',compact('invoices'));
    }

    public function loadInvoices(){

        return EventCreditTransaction::selectUniversityBalance()->whereUniversityId(\Auth::user()->selected_university->id)
            ->with('event')->orderByDesc('id')->get();
    }
}
