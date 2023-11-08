<?php

namespace App\Http\Livewire\Account;

use App\Models\General\Currency;
use App\Models\General\EventPackage;
use App\Models\Transactions\Invoice;
use Carbon\Carbon;
use Livewire\Component;

class EventPackages extends Component
{

    use CanPayNow;
    public $event_packages = [];
    public $currencies  = [];

    public $amount = 0;
    public $currency_id;

    public $currency_icon;
    public $orignal_amount;
    public $discount_amount;
    public $due_amount = 0;
    public $processing_fee = 0;

    public $total_amount_due = 0;
    public $selected_currency;
    public $conversion_rate = 1;

    public $isModalOpen = false;
    /**@var EventPackage | null $package*/
    public $package = null;

    protected $listeners = ['openModal', 'onModelClose'];

    public function openModal(EventPackage $package)
    {
        $this->package = $package;
        $this->changeCurrency();
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function onModelClose()
    {
        $this->resetForm();
        $this->closeModal();
    }

    public function changeCurrency()
    {
        $this->selected_currency = Currency::find($this->currency_id, ['code', 'icon','conversion_rate']);
        $this->currency_icon = $this->selected_currency?->icon ?: $this->selected_currency?->code;
        $conversion_rate = $this->selected_currency->conversion_rate;
        $this->conversion_rate = $conversion_rate > 0 ? $conversion_rate : 1;
        $this->orignal_amount = $this->package?->full_price * $this->conversion_rate;
        $this->discount_amount =  $this->orignal_amount * ($this->package?->discount_percentage/100);
        $this->due_amount = $this->orignal_amount - $this->discount_amount;
        $this->processing_fee = $this->due_amount * 0.03;
        $this->total_amount_due = $this->due_amount + $this->processing_fee;
    }



    public function resetForm()
    {
        $this->currency_id = \AppConst::CURRENCY_USD;
        $this->selected_currency = Currency::find($this->currency_id, ['code', 'icon']);
        $this->currency_icon = $this->selected_currency?->icon ?: $this->selected_currency?->code;
        $this->conversion_rate = 1;
        $this->discount_amount = 0;
        $this->due_amount = 0;
        $this->orignal_amount = 0;
        $this->processing_fee = 0;
        $this->total_amount_due = 0;
    }

    public function generateInvoice($payment_method = 1)
    {
        $inv = $this->createInvoice();
        $this->emit('view-invoice', route('admin.account.viewInvoice', $inv->id));
        $this->resetForm();
        $this->closeModal();
    }

    public function payNow()
    {
        $inv = $this->createInvoice();
        return $this->pay($inv);
    }

    private function createInvoice()
    {
        $count = Invoice::latest()->first(['invoice_number', 'ref_id']);
        $invoice_number = 10001;
        $ref_id = 71713260;
        if (!empty($count)) {
            $invoice_number = ++$count->invoice_number;
            $ref_id = ++$count->ref_id;
        }

        return Invoice::create([
            'university_id' => \Auth::user()->selected_university->id,
            'transaction_details' => 'Event Package '.$this->package?->title,
            'invoice_number' => $invoice_number,
            'ref_id' => $ref_id,
            'package_id' => $this->package?->id,
            'full_amount' => $this->orignal_amount,
            'discount' => $this->discount_amount ,
            'discount_percentage'=> $this->package?->discount_percentage,
            'processing_fee' => $this->processing_fee,
            'processing_fee_percentage' => 3,
            'payable_amount' => $this->total_amount_due,
            'qty' => 1,
            'ur_credit'=>$this->package?->repositories_credit ?? 0,
            'events_credit'=>$this->package?->university_fair_schools_campus ?? 0,
            'admissions_credit'=>0,
            'currency_id' => $this->currency_id,
            'due_date' => Carbon::now()->addDays(30)->toDateString(),
            'created_by_id' => \Auth::id(),

        ]);
    }

    public function mount(){
        $this->event_packages = EventPackage::all();
        $this->currencies = Currency::all();
        $this->currency_id = \AppConst::CURRENCY_USD;
    }
    public function render()
    {
        return view('livewire.account.event-packages');
    }
}
