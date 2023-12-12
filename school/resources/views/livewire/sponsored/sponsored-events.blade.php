<div>
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div class="h5 blue">@lang('Request Event Sponsor')</div>
        <a href="javascript:void(0)" class="secondary-text" wire:click="createEvent">
            {{__('Create a new request')}}
        </a>
    </div>
    <div class="card">
        <div id="event_lead">
            <div class="card-body">
                <div x-data="{}" class="w-100">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="primary-text">

                            <!--Heading Row-->
                            <tr>
                                <td class="w-5">#</td>
                                <td class="w-10">@lang('Date')</td>
                                <td class="w-20">@lang('Source')</td>
                                <td class="w-20">@lang('Status')</td>
                                <td class="w-10">@lang('Deadline')</td>
                                <td class="w-10">@lang('Offers')</td>
                                <td class="w-10">@lang('Amount')</td>
                                <td class="w-10">@lang('Top Offer')</td>
                                <td class="w-5 text-end">@lang('Action')</td>
                            </tr>
                            <!--End Heading row-->
                            </thead>
                            <tbody>
                            @php
                             /**
                             * @var \App\Models\School\SchoolSponsoredEvent[] $events
                             */
                            @endphp
                            @forelse($events as $event)
                            <!--Row Start-->
                            <tr>
                                <td>{{ $events->firstItem() + $loop->index }}</td>
                                <td>{{$event->event_datetime->toDayDateTimeString()}}</td>
                                <td>{{$event->name}}</td>
                                <td>
                                    @if($event->event_datetime->isPast())
                                        @lang('Past') / {{$event->offers_count > 0 ? 'Sponsored':'Not Sponsored' }}
                                    @else
                                        @lang('Upcoming')
                                    @endif
                                </td>
                                <td>{{$event->deadline->toDayDateTimeString()}}</td>
                                <td>
                                    @if($event->offers_count)
                                    <a href="javascript:void(0)" wire:click="viewOffers({{$event->id}})">{{$event->offers_count}} {{__('Offers')}}</a>
                                    @else
                                        {{__('No Offers Yet')}}
                                    @endif
                                </td>
                                <td>{{$event->amount}}</td>
                                <td>{{$event->top_offer ?? '---'}}</td>
                                <td class="text-end">
                                    @if(!$event->event_datetime->isPast())
                                        <a href="javascript:void(0)" class="secondary-text"
                                           wire:click="edit({{$event->id}})">{{__('Edit')}}
                                        </a>
                                    @else
                                        ---
                                    @endif
                                </td>
                            </tr>
                            @empty
                                <!--Row Start-->
                                <tr>
                                    <td colspan="9">
                                        <div class="w-100 text-center">
                                            @lang('No Data!')
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <x-general.loading message="Loading" />
    </div>
    @php
        /**
        * @var \App\Models\School\SchoolSponsoredEventType[] $event_types
        * @var \App\Models\General\Countries [] $countries
        * @var \App\Models\School\SchoolSponsoredEvent $selected_event
        */
    @endphp
    {{--Add/Edit Model--}}
    <x-jet-modal wire:model="openCreateModel">
        <x-slot name="title">
            @if(!empty($selected_event))
                {{__('Edit')}}  {{$selected_event->name}}
            @else
                {{ __('Create a new sponsor request') }}
            @endif
        </x-slot>

        <div class="row">
            <div class="col-lg-12">
                <div class="h-100">
                    <input type="text" wire:model.defer="form.name" class="input-field form-control" id="inputPassword2"
                           placeholder="{{__('Event Name')}}">
                    <x-jet-input-error for="form.name" class="mt-2" />
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="h-100">
                    <select class="input-field form-control" wire:model.defer="form.sponsored_event_type_id" aria-label="">
                        <option>@lang('Select Event Type')</option>
                        @foreach($event_types as $type)
                        <option value="{{$type->id}}">{{$type->title}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="form.sponsored_event_type_id" class="mt-2" />

                </div>
            </div>
            <div class="col-lg-6 mobile-marg-2">
                <div class="h-100">
                    <select class="h-100 input-field form-control" wire:model.defer="form.target_country_id" aria-label="">
                        <option>@lang('Target Sponsor Location')</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->country_name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="form.target_country_id" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="h-100">
                    <input type="text" wire:model.defer="form.amount" class="input-field form-control" id="amount"
                           placeholder="{{__('Sponsorship amount')}}">
                    <x-jet-input-error for="form.amount" class="mt-2" />
                </div>
            </div>
            <div class="col-lg-6  mobile-marg-2">
                <div class="form-check">
                    <input class="form-check-input mt-2" type="checkbox" wire:model.defer="form.allow_multiple_sponsors" id="flexCheckChecked">
                    <label class="paragraph-style2 mt-2 blue" for="flexCheckChecked">
                        @lang('Multiple sponsorships are allowed')
                    </label>
                    <x-jet-input-error for="form.allow_multiple_sponsors" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6">
                <input type="text" wire:model.defer="form.event_datetime" class="form-control input-field datetime"
                       placeholder="{{__('Event Date and Time')}}">
                <x-jet-input-error for="form.event_datetime" class="mt-2" />
            </div>
            <div class="col-lg-6 mobile-marg-2">
                <input type="text" wire:model.defer="form.deadline" class="form-control input-field datetime"
                       placeholder="{{__('Deadline')}}">
                <x-jet-input-error for="form.deadline" class="mt-2" />
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <textarea wire:model.defer="form.description" class="input-textarea form-control" rows="5"
                          placeholder="{{__('Explain more about this event, show some attractive benefits for the sponsor')}}"></textarea>
                <x-jet-input-error for="form.description" class="mt-2" />
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="text-center mt-3">
                    <button class="button-blue w-40 button-lg mobile-btn"
                            wire:loading.attr="disabled" wire:click="saveEvent">@lang('Save')</button>
                </div>
            </div>
        </div>
        <x-general.loading wire:target="saveEvent" message="Saving Data" />
    </x-jet-modal>
    {{--Offers Model--}}
    <x-jet-modal wire:model="openOffersModel">
        <x-slot name="title">{{ $selected_event?->name }} @lang('Offers')</x-slot>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <!--Heading Row-->
                <tr>
                    <td class="w-5">#</td>
                    <td class="">@lang('Sponsor Name')</td>
                    <td class="">@lang('Country')</td>
                    <td class="">@lang('Offer')</td>
                    <td class="w-20">@lang('Action')</td>
                </tr>
                <!--End Heading row-->
                @forelse($selected_event?->offers ??[] as $offer)
                    @php
                     $sponsor = $offer->university ?? $offer->agent;
                    @endphp
                <!--Row Start-->
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$sponsor->university_name ?? $sponsor->name}}</td>
                    <td>{{$sponsor->country->country_name}}</td>
                    <td>{{$offer->amount}}</td>
                    <td>
                        @if(!$selected_event->event_datetime->isPast())
                            <div  class="d-inline-flex">
                                @if($offer->status == AppConst::PENDING || is_null($offer->status))
                                    <a href="javascript:void(0)" class="blue"
                                       wire:click="acceptOffer('{{$offer->id}}')">@lang('Accept')</a>
                                    <a href="javascript:void(0)" class="red ms-3"
                                       wire:click="rejectOffer('{{$offer->id}}')">@lang('Reject')</a>
                                @else
                                    <label class="gray me-3">{{__($offer->status_name)}}</label>
                                    <a href="javascript:void(0)" class="light-blue"
                                       wire:click="resetOffer('{{$offer->id}}')">@lang('Reset')</a>
                                @endif
                            </div>
                        @else
                            @if($offer->status == AppConst::REJECTED)
                                <label class="red">@lang("Rejected")</label>
                            @elseif($offer->status == AppConst::APPROVED)
                                <label class="green">@lang("Accepted")</label>
                            @else
                                <label class="blue">@lang("No Action Taken")</label>
                            @endif
                        @endif
                    </td>
                </tr>
                @empty
                    <!--Row Start-->
                    <tr>
                        <td colspan="5">
                            <div class="w-100 text-center">
                                @lang('No Data!')
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <x-general.loading wire:target="acceptOffer, rejectOffer, resetOffer" message="Processing..." />
    </x-jet-modal>
    @push(AppConst::PUSH_CSS)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/confirmDate/confirmDate.css">
    @endpush
    @push(AppConst::PUSH_JS)
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        @if(app()->getLocale() != 'en')
            <script src="https://npmcdn.com/flatpickr/dist/l10n/{{app()->getLocale()}}.js"></script>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/confirmDate/confirmDate.js"></script>

        <script type="text/javascript">
            addDatePicker()
            Livewire.on('saved', addDatePicker)

            function addDatePicker() {
                $('.datetime').flatpickr({
                    locale: "{{app()->getLocale()}}",
                    enableTime: true,
                    allowInput: true,
                    minDate: "today",
                    plugins: [new confirmDatePlugin({})],
                    confirmIcon: ' <i class="fa-solid fa-circle-check"></i>', // your icon's html, if you wish to override
                    confirmText: "OK",
                    showAlways: false,
                });
            }
        </script>
    @endpush
</div>
