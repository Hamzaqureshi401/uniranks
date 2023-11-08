<?php

namespace App\Http\Livewire\Account;

use App\Models\Transactions\RepositoryTransaction;
use Livewire\Component;

class RepositoryTransactions extends Component
{
    public function render()
    {
        $invoices = $this->loadInvoices();
        return view('livewire.account.repository-transactions',compact('invoices'));
    }

    public function loadInvoices(){
        return RepositoryTransaction::selectUniversityBalance()->whereUniversityId(\Auth::user()->selected_university->id)
            ->orderByDesc('id')->get();
    }
}
