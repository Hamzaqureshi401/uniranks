<div>
    @php
        /**
        * @var \App\Models\School\SchoolSponsoredEvent $event
        **/
        $school = $event->school;
        $currency = $event->createdByUser?->preferences?->currency?->code;
    @endphp
    <div class="">
        <div class="row align-items-center gap-1">
            <div class="col-lg-2 university-img-div ">
                <img src="{{$school->logo_url}}" class="" alt="Logo" width="140px">
            </div>
            <div class="col-lg-10 ms-3 ms-lg-0">
                <div class="h2 blue">{{$school->school_name}}</div>
                <div class="blue h5 mt-1">{{$school->address1}}</div>
                <div
                    class="h2 blue mt-1">{{$event->name}} @lang('Looking for') {{$event->amount}} {{$currency}} @lang('Sponsorship')</div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <div class="d-md-flex">
                <div class="col-md-6 pe-4">
                    <div class="light-blue h5 mb-0">
                        @lang('In') {{$school->country?->country_name}}
                    </div>
                    <div class="light-blue h5 mb-0">
                        @lang('Event Date'): {{$event->event_datetime?->toDayDateTimeString()}}
                    </div>
                    <div class="light-blue h5 mb-0">
                        @lang('Event Deadline'): {{$event->deadline?->toDayDateTimeString()}}
                    </div>
                    <div class="paragraph-style2 blue mt-3">
                        {{$event->description}}
                    </div>
                </div>
                <div class="border-left3 col-md-6">
                    <div class="ps-4 mobile-marg">
                        <div class="blue h4">
                            @lang('Looking for') {{$event->amount}} {{$currency}} @lang('Sponsorship')
                        </div>
                        <div class="text__center h5 gray mt-3">@lang('School Detail')</div>

                        <div class="blue h5 mt-4">
                            @lang('Fees'): <span
                                class="light-blue">{{$school->g_12_fee_range?->currency_range ?? 'N/A'}}</span>
                        </div>
                        <div class="blue h5 mt-3">
                            <span>@lang('Students G12'): <span
                                    class="light-blue">{{$school->number_grade12}}</span></span>
                            <span>@lang('G11'): <span class="light-blue">{{$school->number_grade11}}</span></span>
                        </div>
                        <div class="blue h5 mt-3">
                            @lang('School Curriculums'): {{$school->curriculum?->title}}
                        </div>
                        <div class="blue h5 mt-3">
                            @lang('Location'): {{$school->address1}}
                        </div>
                        <div class="h5">
                            @if(!empty($school->website) &&  $school->website != "#")
                                <a href="{{$school->website}}" class="light-blue">{{$school->website}}</a>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-md-flex justify-content-between mt-4">
        <div class="h3 blue">@lang('Sponsorship Action')</div>
        @php
            $deadline = $event->deadline->diff(\Illuminate\Support\Carbon::now());
        @endphp
        <div class="h3 blue d-flex">@lang('Deadline'):
            <div class="d-grid px-2">{{$deadline->d < 10 ? "0" : ""}} {{$deadline->d}}<span
                    class="light-blue h6 minus-02-margin">@lang('days')</span></div>
            :
            <div class="d-grid px-2">{{$deadline->h < 10 ? "0" : ""}} {{$deadline->h}} <span
                    class="light-blue h6 minus-02-margin"> @lang('hours')</span></div>
            :
            <div class="d-grid px-2">{{$deadline->i < 10 ? "0" : ""}} {{$deadline->i}} <span
                    class="light-blue h6 minus-02-margin"> @lang('minutes')</span></div>
        </div>
    </div>
    <div class="blue">
        @lang('Here is where you can offer sponsorship, school is looking for 5000 AED you may offer less or more than this amount.')
        <br>
        @lang('Please Note: the school will receive other offers from different universities , the more attractive is your off the more chance to be accepted.')
    </div>
    @php
        /**
        * @var \App\Models\School\SchoolSponsoredEventOffer $university_offer
        **/
    @endphp
    <div class="card my-2">
        <div class="p-3">
            <div class="d-md-flex justify-content-between align-items-center">
                @if(!empty($university_offer))
                    <div class="h5 blue col-md-7 col-12 mb-0">
                        @lang('Offer of') {{$university_offer->amount}} {{$currency}}
                        {{$university_offer->status_name}}
                    </div>
                    <div class="col-12 col-md-5">
                        @switch($university_offer->status)
                            @case(AppConst::APPROVED)
                                <button class="button-sm button-green mobile-btn w-98">@lang('Approved')</button>
                                @break
                            @case(AppConst::PENDING)
                                <div class="d-flex justify-content-end">
                                    <button class="button-sm button-blue mobile-btn w-50"
                                            wire:click="makeAnOffer">@lang('Change Offer')</button>
                                    <button class="button-sm button-orange mobile-btn w-50">@lang('Pending')</button>
                                </div>
                                @break
                            @case(AppConst::REJECTED)
                                <div class="d-flex justify-content-end">
                                    <button class="button-sm button-blue mobile-btn w-50"
                                            wire:click="makeAnOffer">@lang('Change Offer')</button>
                                    <button class="button-sm button-red mobile-btn w-50">@lang('Rejected')</button>
                                </div>
                                @break
                        @endswitch
                    </div>
                @elseif($event->offers_count > 0)
                    <div class="h5 blue col-md-9 col-12 mb-0">
                        {{$event->offers_count}} @lang('offer(s) were submitted, The highest of') {{$event->max_offer}} {{$currency}}
                    </div>
                    <div class="col-12 col-md-3 ">
                        <button class="button-blue button-sm mobile-btn w-98"
                                wire:click="makeAnOffer">@lang('Make an offer')</button>
                    </div>
                @else
                    <div class="h5 blue col-md-9 col-12 mb-0">
                        @lang('No offers were received yet')
                    </div>
                    <div class="col-12 col-md-3 ">
                        <button class="button-blue button-sm mobile-btn w-98"
                                wire:click="makeAnOffer">@lang('Make an offer')</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <x-jet-modal wire:model="openOffersModel">
        <x-slot name="title">
            @if(!empty($university_offer))
                {{__('Edit Previous Offer of ')}} {{$university_offer->amount}} {{$currency}}
            @else
                {{__('Make an offer')}}
            @endif
        </x-slot>

        <div class="row">
            <div class="col-lg-11">
                <div class="form-floating w-100">
                    <input class="form-control input-field" id="floatingInput" min="1" type="number" wire:model="offer_amount" placeholder="Offer Amount">
                    <label for="floatingInput">@lang('Offer Amount')</label>
                </div>
            </div>
            <div class="col-1 blue d-flex align-items-center">
                {{$currency}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <x-jet-input-error for="offer_amount" class="mt-2" />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <button class="button-sm button-blue w-98" wire:click="saveOffer">@lang('Submit Offer')</button>
            </div>
            <div class="col-6">
                <button class="button-sm button-red w-98" wire:click="closeOfferModel">@lang('Cancel')</button>
            </div>
        </div>
        <x-general.loading wire:target="saveOffer" message="Saving Data" />
    </x-jet-modal>

    <x-general.loading message="Loading..." wire:traget="makeAnOffer"/>
</div>
