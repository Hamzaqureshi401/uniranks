<div>
    <div class="row">
        <div class="col-12">
            <div x-data="{ showFilters:false }" class="w-100">
                <div class="row">
                    <div class="col-12 blue">
                        <div class="h5 blue">@lang('Event Packages')
                        @include('about-icon')</div>
                        <p class="gray">
                            @lang('The UNIRANKS Events Packages enable universities and education agents to connect with
                            students during the SchoolsMaster university fair events. These packages are designed to provide
                            comprehensive support, including powerful tools that facilitate communication and student matching both
                            during and after the event.')
                        </p>
                    </div>
                </div>
            </div>
            @php
                /**@var \App\Models\General\EventPackage[] $event_packages*/
            @endphp
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive" style="overflow: hidden">
                        <table class="table blue">
                            <thead>
                            <!--Heading Row-->
                            <tr>
                                <td class="w-25">@lang('Package Options')</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">{{$event_package->title}}</td>
                                @endforeach
                            </tr>
                            <!--End Heading row-->
                            </thead>
                            <tbody class="blue">
                            <!--Row Start-->
                            <tr>
                                <td>@lang('University Fair School Campus')</td>
                                @foreach($event_packages as $event_package)
                                <td class="text-center">{{$event_package->university_fair_schools_campus}}</td>
                                @endforeach
                            </tr>
                            <!--Row Start-->
                            <tr>
                                <td>@lang('International Virtual Event (any types)')</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">{{$event_package->international_virtual_events ?: "N/A"}}</td>
                                @endforeach
                            </tr>
                            <!--Row Start-->
                            <tr>
                                <td>@lang('Career talk School Campus/session')</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">{{$event_package->career_talks_school_campus ?: "N/A"}}</td>
                                @endforeach
                            </tr>

                            <!--Row Start-->
                            <tr>
                                <td>@lang('Workshop University Campus')</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">{{$event_package->work_shops_university_campus ?: "N/A"}}</td>
                                @endforeach
                            </tr>

                            <!--Row Start-->
                            <tr>
                                <td>@lang('Open Day University Campus')</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">{{$event_package->open_days_university_campus ?: "N/A"}}</td>
                                @endforeach
                            </tr>

                            <!--Row Start-->
                            <tr>
                                <td>@lang('Student for a day University Campus')</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">{{$event_package->student_for_a_day_university_campus ?: "N/A"}}</td>
                                @endforeach
                            </tr>
                            <!--Row Start-->
                            <tr>
                                <td>@lang('Completion University Campus')</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">{{$event_package->compilation_university_campus ?: "N/A"}}</td>
                                @endforeach
                            </tr>
                            <!--Row Start-->
                            <tr>
                                <td>@lang('Repositories Credit ')</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">{{$event_package->repositories_credit}}<sup>UR</sup></td>
                                @endforeach
                            </tr>
                            <!--Row Start-->
                            <tr>
                                <td>@lang('Schools Tour')</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">{{$event_package->schools_tours ?: "N/A"}}</td>
                                @endforeach
                            </tr>
                            <!--Row Start-->
                            <tr>
                                <td>@lang('Country')</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">{{$event_package->countries ?: "N/A"}}</td>
                                @endforeach
                            </tr>
                            </tbody>
                            <tfoot class="secondary-text border-collapse">
                            <!--Row Start-->
                            <tr >
                                <td>@lang('Cost of 1 Event')</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">${{$event_package->cost_per_event}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>@lang('Discount') ~</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">{{$event_package->discount_percentage}}%</td>
                                @endforeach
                            </tr>

                            <tr>
                                <td>@lang('Original Price')</td>
                                @foreach($event_packages as $event_package)
                                    <td class="text-center">
                                        @if($event_package->discount_percentage > 0)
                                            <s class="red">${{$event_package->full_price}}</s>
                                    @else
                                            ${{$event_package->full_price}}
                                        @endif
                                    </td>
                                @endforeach
                            </tr>

                            <tr>
                                <td>@lang('Price')</td>
                                @foreach($event_packages as $event_package)
                                    @php
                                     $final_price = $event_package->full_price - ( $event_package->full_price * ($event_package->discount_percentage/100))
                                    @endphp

                                <td class="text-center"><button class="button-sm button-blue w-100" type="button"
                                    wire:click="openModal({{$event_package->id}})">${{$final_price}}</button></td>
                                @endforeach
                            </tr>
                            </tfoot>
                        </table>

                    </div>

                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
    <x-general.loading wire:target="openModal" message="Loading..."/>
    @php
     /**@var \App\Models\General\EventPackage $package*/
    @endphp
    <x-jet-modal wire:model="isModalOpen">
        <x-slot name="title">
            <h4 class="modal-title h3 fw-bold blue" id="staticBackdropLabel">
                @lang('Event Package') {{$package?->title}}
            </h4>
        </x-slot>
        <div class="row mt-3 blue">
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
        @if($currency_id != AppConst::CURRENCY_USD)
            <div class="row mt-3 blue">
                <div class="col-6">
                    @lang('Amount in USD')
                </div>
                <div class="col-6 text-end">
                    USD {{ number_format($package?->full_price,2)  }}
                </div>
            </div>
        @endif
        <div class="row mt-3 blue">
            <div class="col-6">
                @lang('Original Amount')
            </div>
            <div class="col-6 text-end">
                {{$currency_icon}}  {{ number_format($orignal_amount,2) }}
            </div>
        </div>
        <div class="row mt-3 blue">
            <div class="col-6">
                @lang('Discount') {{$package?->discount_percentage}}%
            </div>
            <div class="col-6 text-end">
                {{$currency_icon}} {{ number_format($discount_amount,2) }}
            </div>
        </div>
        <div class="row mt-3 blue">
            <div class="col-6">
                @lang('Payment Due')
            </div>
            <div class="col-6 text-end">
                {{$currency_icon}} {{ number_format($due_amount,2) }}
            </div>
        </div>
        <div class="row mt-3 blue">
            <div class="col-6">
                @lang('Processing Fee') 3%
            </div>
            <div class="col-6 text-end">
                {{$currency_icon}} {{ number_format($processing_fee,2) }}
            </div>
        </div>
        <div class="row mt-3 blue">
            <div class="col-6">
                <b>@lang('Payment Due')</b>
            </div>
            <div class="col-6 text-end">
                {{$currency_icon}} {{ number_format($total_amount_due,2) }}
            </div>
        </div>
        <hr class="mt-3">
        <h5 class="modal-title h5 fw-bold blue">@lang('UNIRANKS Credit Value') </h5>
        <div class="row mt-3 blue">
            <div class="col-6">
                @lang('Credit Conversion')
            </div>
            <div class="col-6 text-end">
                {{ $package?->repositories_credit  }}<sup>UR</sup>
            </div>
        </div>
        <hr class="mt-3">
        <div class="row mt-3 blue">
            <div class="col-6">
                <b>@lang('Payment Due')</b>
            </div>
            <div class="col-6 text-end">
                {{$currency_icon}} {{ number_format($total_amount_due,2) }}
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <button wire:click="generateInvoice"
                        class="button-sm button-light-blue w-100">@lang('Generate an invoice first for the initial amount of')
                    {{$currency_icon}} {{ number_format($total_amount_due,2) }}
                </button>
            </div>
            <div class="col-12 mt-2">
                <button wire:click="payNow" class="button-sm button-blue w-100 blue">@lang('Confirm and pay') {{$currency_icon}} {{ number_format($total_amount_due,2) }}</button>
            </div>
        </div>
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
        <x-general.loading wire:target="changeCurrency, generateInvoice, payNow" message="Processing..."/>

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
