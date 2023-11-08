<?php

namespace App\Http\Livewire\Account;

use App\Models\Transactions\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class InvoicesList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $invoices = $this->loadInvoices();
        return view('livewire.account.invoices-list',compact('invoices'));
    }

    public function loadInvoices(){
        return Invoice::whereUniversityId(\Auth::user()->selected_university->id)->with(['currency','paymentMethod','paymentReceipt'])->paginate(50);
    }
}
