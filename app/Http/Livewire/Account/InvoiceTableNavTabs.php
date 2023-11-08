<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;

class InvoiceTableNavTabs extends Component
{
    public $links = [];
    public $exportExcelUrl = null;
    public $exportPdfUrl = null;
    public function mount(){
        $this->links = [
            ['title'=>'Invoices','route'=>'admin.account.invoicesList'],
            ['title'=>'Event Credits','route'=>'admin.account.eventCredits'],
            ['title'=>'RepositoryTransactions','route'=>'admin.account.repositoryTransactions'],
        ];
    }

    public function exportExcel(){
        $this->emit('export-excel');
    }
    public function exportPdf(){
        $this->emit('export-pdf');
    }
    public function render()
    {
        return view('livewire.account.invoice-table-nav-tabs');
    }
}
