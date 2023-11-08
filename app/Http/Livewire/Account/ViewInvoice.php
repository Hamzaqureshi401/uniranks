<?php

namespace App\Http\Livewire\Account;

use App\Models\General\BankAccount;
use App\Models\Transactions\Invoice;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class ViewInvoice extends Component
{
    use CanPayNow;
    use WithFileUploads;
    public Invoice $invoice;
    public $bank_accounts = [];
    public $bank_account_id ='';
    public $bank_account = null;

    public $document;

    protected $validationAttributes = [
        'document' => 'proof of payment'
    ];
    protected $messages = [
        'document.required' => 'The proof of payment is required to mark invoice as paid',
    ];
    public function mount(){
        $this->invoice->load(['university.city','university.country','currency']);
        $this->bank_accounts = BankAccount::whereCurrencyId($this->invoice->currency_id)->get();
        if ($this->bank_accounts->isEmpty()){
            $this->bank_accounts = BankAccount::whereCurrencyId(\AppConst::CURRENCY_USD)->get();
        }
        $this->bank_account = $this->bank_accounts->first();
        $this->bank_account_id = $this->bank_account->id;
    }

    public function loadBankAccount(){
        $this->bank_account = BankAccount::find($this->bank_account_id);
    }
    public function render()
    {
        return view('livewire.account.view-invoice');
    }

    public function payNow()
    {
        return $this->pay($this->invoice);
    }

    public function initForm(){
        $this->document = null;
    }

    protected function Rules(){
        return [
            'document'=>['required','image'],
        ];
    }


    public function markAsPaid(){
        $this->validate();
        $path = $this->document->storePublicly('images/document_proof', 's3');
        $this->invoice->update([
            'bank_account_id' => $this->bank_account_id,
            'payment_method_id' => \AppConst::PM_BANK,
            'payment_proof_document_path'=>$path,
            'payment_status' => \AppConst::UNDER_REVIEW,
            'payment_date'=>Carbon::now()->toDateString()
            ]);
        $this->initForm();
        $this->emit('goToTop');
        session()->flash('status', 'Operation Successful!');
    }


}
