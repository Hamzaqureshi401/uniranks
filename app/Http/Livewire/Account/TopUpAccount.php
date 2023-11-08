<?php

namespace App\Http\Livewire\Account;

use App\Models\General\Currency;
use App\Models\Transactions\Invoice;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class TopUpAccount extends Component
{
    use CanPayNow;
    public $currencies = [];
    public $amount = 0;
    public $currency_id;

    public $currency_icon;
    public $due_amount = 0;
    public $processing_fee = 0;

    public $total_amount_due = 0;
    public $selected_currency;
    public $conversion_rate = 1;

    public $per_usd_ur_rate = 5;
    public $ur_credit = 0;
    public $ur_bonus = 0;
    public $ur_total = 0;

    public $ur_bonus_percentage = 0;


    public $min_amount = 500;

    public $isModalOpen = false;

    protected $listeners = ['openModal', 'onModelClose'];

    public function openModal()
    {
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
        $this->min_amount = 500 * $this->conversion_rate;
    }

    public function calculateUR()
    {
        if (!is_numeric($this->amount)) return;

        $this->due_amount = $this->amount;
        $usd = $this->amount / $this->conversion_rate;
        $bonus_per = floor($usd / 500 + 4);
        $this->ur_credit = ceil($usd * $this->per_usd_ur_rate);
        $this->ur_bonus_percentage = min($bonus_per, 100);
        $this->ur_bonus = ceil($this->ur_credit * ($this->ur_bonus_percentage / 100));
        $this->ur_total = $this->ur_credit + $this->ur_bonus;
        $this->processing_fee = ($usd * 0.03) * $this->conversion_rate;
        $this->total_amount_due = $this->amount + $this->processing_fee;

    }


    public function resetForm()
    {
        $this->currency_id = \AppConst::CURRENCY_USD;
        $this->selected_currency = Currency::find($this->currency_id, ['code', 'icon']);
        $this->currency_icon = $this->selected_currency?->icon ?: $this->selected_currency?->code;
        $this->conversion_rate = 1;
        $this->min_amount = 500;
        $this->due_amount = 0;
        $this->ur_credit = 0;
        $this->ur_bonus_percentage = 0;
        $this->ur_bonus = 0;
        $this->ur_total = 0;
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
            'transaction_details' => 'Account top up',
            'invoice_number' => $invoice_number,
            'ref_id' => $ref_id,
            'full_amount' => $this->amount,
            'discount' => 0,
            'processing_fee' => $this->processing_fee,
            'processing_fee_percentage' => 3,
            'payable_amount' => $this->total_amount_due,
            'ur_credit' => $this->ur_total,
            'events_credit' => 0,
            'admissions_credit' => 0,
            'qty' => $this->ur_total,
            'currency_id' => $this->currency_id,
            'due_date' => Carbon::now()->addDays(30)->toDateString(),
            'created_by_id' => \Auth::id(),
        ]);
    }

    public function mount()
    {
        $this->currencies = Currency::all();
        $this->resetForm();
    }


    public function render()
    {
        $this->calculateUR();
        return view('livewire.account.top-up-account');
    }
}
