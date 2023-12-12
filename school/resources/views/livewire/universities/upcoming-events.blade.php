<div x-data="{ showFilters:false }">
    @php
        /**
        * @var \App\Models\General\Countries[] $countries
        * @var \App\Models\University\UniversityEvent[] $events
        **/
    @endphp
    <div class="d-flex justify-content-between pb-2 pe-3">
        <h5 class="blue h5">@lang('Upcoming University') {{$type_title}}</h5>
        <i class="d-md-none fas fa-filter pointer blue blue" @click="showFilters = !showFilters"></i>
    </div>
    <div class="row align-items-center my-3 d-md-flex small5" x-cloak :class="showFilters ? '':'d-none' ">
        <div class="col-12 col-md-3">
            <select wire:model="country" class="input-field form-control me-2" wire:change="loadEvents" aria-label="">
                <option value="">@lang('Select Country')</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-100 d-block d-md-none my-1"></div>
        <!--to force new line-->
        <div class="col-12 col-md-3">
            <x-elements.date-range-picker wire:model="period" wire:change="loadEvents" placeholder="Select Period"/>
        </div>
    </div>
    <!-- Body Top End-->
    <x-general.loading message="Loading"/>

    <!-- Card 1 start -->
    @forelse($events as $event)

        @php
            $university = $event->university;
            $inv = $event->eventInvitations?->first();
            /**@var \App\Models\University\UniversityEventInvitation $inv */
        @endphp
        <div class="row my-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-self-start">
                            <div class="university-img-div">
                                <img src="{{$university->logo_url}}" class="univeristy-img"
                                     alt="{{$university->university_name}}">
                            </div>
                            <div class="align-self-center ms-3 w-100">
                                <div class="row">
                                    <div class="col-md-5"><h5 class="h5 blue">{{$university?->university_name}}</h5>
                                    </div>
                                    <div
                                        class="col-md-4 light-blue light-blue-text text-md-end">{{$event->start_datetime->toDayDateTimeString()}}</div>
                                    <div
                                        class="col-md-3 light-blue light-blue-text text-md-end">{{$event->max_students}} {{__('Students Max')}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-9">
                                        <p class="paragraph-style2 blue university-event-description">
                                            {{\Illuminate\Support\Str::limit($event->description,250)}}
                                            @if(Str::length($event->description) > 250)
                                                <span>
                                            <a href="javascript:void(0)" class="secondary-text"
                                               onclick="openReadMoreModal(@js($event->description))">@lang('Read More')</a>
                                            @endif
                                        </span>
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-3 align-self-end  text-end">
                                        @if($event->start_datetime->isPast())
                                            <span class="red">
                                            {{$inv?->accepted_by_school == AppConst::INVITATION_ACCEPTED ? __('Registered').'-' : ''}}
                                                @lang('Past')
                                        </span>
                                        @else
                                            @if($inv?->accepted_by_school == AppConst::INVITATION_ACCEPTED)
                                                <button class="button-sm button-red mt-2 mt-md-0"
                                                        wire:click="revoke('{{$inv->id}}')">
                                                    @lang('Registered')/@lang('Revoke')</button>
                                            @else
                                                <button class="button-sm button-blue m-0 regsiter-button-div"
                                                        wire:click="register({{$inv?->id}},{{$event?->id}})">
                                                    @lang('Register')</button>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty

        <div class="row my-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="text-center mb-0">{{__('No Events')}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforelse
    <x-elements.read-more-modal title="Event Details"/>
</div>
