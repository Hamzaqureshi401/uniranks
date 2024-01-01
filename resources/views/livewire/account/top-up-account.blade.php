<div>
    <div class="row">
        <div class="col-12">
            <div x-data="{ showFilters:false }" class="w-100">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between blue">
                        <div class="h5 blue">@lang('Packages and Account Top')
                        @include('about-icon')</div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body primary-text">
                    <p class="h4">@lang('Student Admissions Agreement')</p>
                    <p class="paragraph-style2">@lang("The Student Admissions Agreement provides you with access to a pool of leads
                        that closely align with your agent profile's study destinations, majors, and programs. The unique benefit
                        of this agreement is that you can access these leads without the requirement of adding actual funds to
                        your account. In exchange for this service, we will charge a commission fee of 20% based on the
                        enrollments you secure.")</p>
                    <div class="text-end">
                        <button class="button button-sm button-blue">@lang('Learn More & Subscribe')</button>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body primary-text">
                    <p class="h4">@lang('Top up your account')</p>
                    <p class="paragraph-style2">@lang('Our platform offers a comprehensive leads repository service, enabling you to
                        filter and discover students who align with your university preferences: By topping up your account, you
                        gain access to the tools necessary to search for and connect with these prospective students.')</p>
                    <div class="text-end">
                        <button class="button button-sm button-blue" type="button" wire:click="openModal">@lang('Top up Your Account')
                        </button>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body primary-text">
                    <p class="h4">@lang('Event Packages')</p>
                    <p class="paragraph-style2">@lang('The UNIRANKS Events Packages enable universities and education agents to connect
                        with students during the SchoolsMaster university fair events. These packages are designed to provide
                        comprehensive support, including powerful tools that facilitate communication and student matching both
                        during and after the event.')</p>
                    <div class="text-end mt-2">
                        <a href="{{route('admin.account.eventPackages')}}" class="button button-sm button-blue text-decoration-none">@lang('Purchase Event
                            Package')</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
    <x-general.loading wire:target="changeCurrency" message="Processing..."/>

    <x-jet-modal wire:model="isModalOpen">
        <x-slot name="title">
            <h4 class="modal-title h3 fw-bold blue" id="staticBackdropLabel">@lang('Top Up')
                <b>@lang('UR Credit')</b></h4>
        </x-slot>
        <x-slot name="description">
            <div class="row">
                <div class="col-12">
                    <p class="primary-text">@lang('UNIRANKS employs UR credits as a system currency to enhance the usability of repositories and various components within UNIRANKS. The pricing of lead repositories is predominantly influenced by factors including the admission program, study destination, university, and, most significantly, the matching score. Higher scores are typically associated with increased costs.')</p>
                </div>
            </div>
        </x-slot>
        <hr>
        <h5 class="modal-title h5 fw-bold blue">
            @lang('Minimum amount top Up') {{$min_amount}} {{$currency_icon}}
        </h5>

        <div class="row mt-3">
            <div class="col-6">
                @lang('Currency')
            </div>
            @php
                /**
                * @var \App\Models\General\Currency[] $currencies
                * @var \App\Models\General\Currency $selected_currency
                */
            @endphp
            <div class="col-6 text-end">
                <select wire:model="currency_id" wire:change="changeCurrency" class="form-select form-control">
                    @foreach($currencies as $currency)
                        <option value="{{$currency->id}}">{{$currency->icon}} {{$currency->code}} - {{$currency->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                @lang('Amount')
            </div>
            <div class="col-6 text-end">
                <input wire:model.devounce.500ms="amount" type="number" min="{{$min_amount}}" class="form-control form-input" placeholder="@lang('amount')"/>
            </div>
        </div>
        @if($amount < $min_amount)
            <p class="red text-end">@lang('Top up amount should be') {{$min_amount}} {{$currency_icon}} @lang('or higher')</p>
        @endif
        @if($currency_id != AppConst::CURRENCY_USD)
        <div class="row mt-3">
            <div class="col-6">
                @lang('Amount in USD')
            </div>
            @php
            $amount_entered = !is_numeric($amount)? 0 : $amount;
            @endphp
            <div class="col-6 text-end">
                {{$amount_entered }} / {{$conversion_rate}} = {{floor($amount_entered/$conversion_rate)}}
            </div>
        </div>
        @endif
        <div class="row mt-3">
            <div class="col-6">
                @lang('Total Due')
            </div>
            <div class="col-6 text-end">
                {{$currency_icon}}  {{ number_format($due_amount,2) }}
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                @lang('Processing Fee') 3%
            </div>
            <div class="col-6 text-end">
                {{$currency_icon}} {{ number_format($processing_fee,2) }}
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <b>@lang('Payment Due')</b>
            </div>
            <div class="col-6 text-end">
                {{$currency_icon}} {{ number_format($total_amount_due,2) }}
            </div>
        </div>
        <hr class="mt-3">
        <h5 class="modal-title h5 fw-bold blue">@lang('UNIRANKS Credit Value') </h5>
        <div class="row mt-3">
            <div class="col-6">
                @lang('Credit Conversion')
            </div>
            <div class="col-6 text-end">
                {{$ur_credit}}<sup>UR</sup>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                @lang('Credit Bonus') {{$ur_bonus_percentage}}%
            </div>
            <div class="col-6 text-end">
                {{$ur_bonus}}<sup>UR</sup>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <b>@lang('Credit Total')</b>
            </div>
            <div class="col-6 text-end">
                {{$ur_total}}<sup>UR</sup>
            </div>
        </div>
        <hr class="mt-3">
        <div class="row mt-3">
            <div class="col-6">
                <b>@lang('Payment Due')</b>
            </div>
            <div class="col-6 text-end">
                {{$currency_icon}} {{ number_format($total_amount_due,2) }}
            </div>
        </div>
        <div class="row mt-3">
            @if($amount < $min_amount)
                <div class="col-12">
                    <p class="red text-center">@lang('Top up amount should be') {{$min_amount}} {{$currency_icon}} @lang('or higher')</p>
                </div>
            @else
                <div class="col-12">
                    <button wire:click="generateInvoice"
                        class="button-sm button-light-blue w-100">@lang('Generate an invoice first for the initial amount of')
                        {{$currency_icon}} {{ number_format($total_amount_due,2) }}
                    </button>
                </div>
                <div class="col-12 mt-2">
                    <button wire:click="payNow" class="button-sm button-blue w-100">@lang('Confirm and pay') {{$currency_icon}} {{ number_format($total_amount_due,2) }}</button>
                </div>
            @endif
        </div>
        <x-general.loading wire:target="changeCurrency, generateInvoice, payNow" message="Processing..."/>

        <div class="row mt-5 align-items-center">
            <div class="col-8 ps-0">
                <img src="{{AppConst::ICONS}}/payment/lock.svg" style="width: 30px; height: 30px">
                <label>@lang('Guaranteed') <b>@lang('Safe & Secure') </b> @lang('Checkout')</label>
            </div>
            <div class="col-4 px-0">
                <button class="button-sm button-blue w-100 p-0">@lang('Powered By')
                    <img src="{{AppConst::ICONS}}/payment/stripe.svg" style="width: 45px"></button>
            </div>
        </div>
        <hr class="mb-2">
        <div class="row">
            <div class="col">
                <img src="{{AppConst::ICONS}}/payment/cc-visa.svg" style="width: 50px;">
            </div>
            <div class="col">
                <img src="{{AppConst::ICONS}}/payment/master-card.svg">
            </div>
            <div class="col">
                <img src="{{AppConst::ICONS}}/payment/american-express.svg">
            </div>
            <div class="col">
                <img src="{{AppConst::ICONS}}/payment/discover.svg">
            </div>
            <div class="col">
                <img src="{{AppConst::ICONS}}/payment/dunes.svg">
            </div>
            <div class="col">
                <img src="{{AppConst::ICONS}}/payment/jcb.svg">
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-2">
                <img src="{{AppConst::ICONS}}/payment/mc-afee.svg">
            </div>
            <div class="col-2">
                <img src="{{AppConst::ICONS}}/payment/norton.svg">
            </div>
            <div class="col-2">
                <img src="{{AppConst::ICONS}}/payment/pci-dss.svg">
            </div>
            <div class="col-2">
                <img src="{{AppConst::ICONS}}/payment/ssl.svg">
            </div>
        </div>
    </x-jet-modal>
    @push(AppConst::PUSH_JS)
        <script>
            Livewire.on('view-invoice', (url) => {
                console.log({url})
                window.open(url);
            })
        </script>
    @endpush

</div>
