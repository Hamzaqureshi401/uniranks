<?php

namespace App\Http\Livewire\User;

use App\Models\General\Currency;
use Livewire\Component;

class UserCurrencySelection extends Component
{
    public $user_currency;
    public $currencies = [];
    public $currency_selection_active = false;
    public function mount(){

        $user_preferences = \Auth::user()?->preferences;

        if (empty($user_preferences)){
            $user_preferences  = \Auth::user()?->preferences()->create(['currency_id'=>\AppConst::CURRENCY_USD]);
        }

        if (empty($user_preferences->currency)){
            $user_preferences->update(['currency_id'=>\AppConst::CURRENCY_USD]);
            $user_preferences->refresh();
        }

        $this->user_currency = $user_preferences?->currency?->code;
        $this->currencies = Currency::orderBy('name')->get();
    }

    public function openCurrencySelection(){
        $this->currency_selection_active = true;
    }

    public function selectCurrency($currency_id){
        $user_preferences = \Auth::user()?->preferences;
        $user_preferences->update(['currency_id'=>$currency_id]);
        $this->user_currency = $user_preferences?->currency?->code;
        $this->currency_selection_active = false;
        \Cache::forget(\AppConst::USER_CURRENCY_CONVERSION_RATE_CACHE."-".\Auth::id());
        $this->dispatchBrowserEvent('refresh');
    }
    public function render()
    {
        return view('livewire.user.user-currency-selection');
    }
}
