<div class="currency-select col">
<button class="blue border-none" style="background: none" type="button" wire:click="openCurrencySelection">{{$user_currency}}</button>
<x-jet-modal wire:model="currency_selection_active" size="lg">
    <x-slot name="title">
        {{ __("Select Your Currency") }}
    </x-slot>
    @php
        /**
         * @var   \Illuminate\Database\Eloquent\Collection $currencies
         * @var  \App\Models\General\Currency $currency
         */
    @endphp
    @foreach($currencies->chunk(4) as $currency_chunk)
        <div class="d-flex blue">
            @foreach($currency_chunk as $currency)
                <div class="col-lg-3 currency-div" wire:click="selectCurrency('{{$currency->id}}')">
                    <div class="currency-name">{{$currency->name}}</div>
                    <div class="currency-symbol gray">{{$currency->code}}</div>
                </div>
            @endforeach
        </div>
    @endforeach
    <x-general.loading wire:target="selectCurrency" message="Updating Currency" />
</x-jet-modal>
</div>
