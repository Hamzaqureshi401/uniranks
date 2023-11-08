<div>
    @php
        /**
        * @var \App\Models\Fairs\Fair $fair
        **/
        $school = $fair->school;
    @endphp
    <div class="">
        <div class="row align-items-center gap-1">
            <div class="col-lg-2 university-img-div ">
                <img src="{{$school->logo_url}}" class="" alt="Logo" width="140px">
            </div>
            <div class="col-lg-10 ms-3 ms-lg-0">
                <div class="h2 blue">{{$school->school_name}}</div>
                <div class="blue h5 mt-1">{{$school->address1}}</div>
                <div class="h2 blue mt-1">@lang('Career Talk')</div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <div class="d-md-flex">
                <div class="col-md-8">
                    <div class="blue paragraph-style2">
                        @lang('Fair Name'): {{$fair->fair_name ?: "$school->school_name {$fair->eventType->name}" }}
                    </div>
                    <div class="blue paragraph-style2 mt-3">
                        @lang('Fair Date and Time'): {{$fair->datetime}}
                    </div>
                    <div class="blue paragraph-style2 mt-3">
                        @lang('Location'): {{$school->address1 ?? 'N/A'}}
                    </div>
                    <div class="blue paragraph-style2 mt-3">
                        @lang('Map Location'): @if(!empty($school->map_link)) <a href="{{$school->map_link}}" target="_blank" class="a-underline blue">{{$school->map_link}}</a>@else N/A @endif
                    </div>
                    <div class="blue  paragraph-style2 mt-3">
                        @lang('School Curriculums'): {{$school->curriculum?->title ?? 'N/A'}}
                    </div>
                    <div class="blue  paragraph-style2 mt-3">
                        @lang('Number of Halls'): {{$fair->number_of_halls ?? 'N/A'}}
                    </div>
                </div>
                <div class="border-left3 ps-3 col-md-4">
                    <div class="padding-left-4 mobile-marg">
                        <div class="blue h4">
                            @lang('Fees'): <span
                                class="light-blue">{{$school?->g_12_fee_range?->currency_range ?? 'N/A'}}</span>
                        </div>
                        <div class="blue h4 mt-3">
                            <div class="mt-2">
                                @lang('Students G12'): <span
                                    class="light-blue">{{$school->number_grade12 ?? 'N/A'}}</span>
                            </div>
                            <div class="mt-2">
                                @lang('G11'): <span class="light-blue">{{$school->number_grade11 ?? 'N/A'}}
                                </span>
                            </div>
                        </div>
                        <div class="blue h4 mt-3">
                            {{$fair->start_date->toDateString()}}
                        </div>
                        <div class="blue paragraph-style2  mt-3">
                            @lang('Fair Type'): {{$fair->fairType?->fair_type_name ?? 'N/A'}}
                        </div>
                        <div class="blue  paragraph-style2 mt-2">
                            {{--                            @lang('Universities can attend this fair'): {{$fair->max}}--}}
                            @lang('Number of Sessions'): {{$fair->sessions_count}}

                        </div>
                        <div class="blue  paragraph-style2 mt-2">
                            {{--                            @lang('Universities can attend this fair'): {{$fair->max}}--}}
                            @lang('Number of Majors'): {{$no_majors}}
                        </div>
                        @if(!empty($school->website) &&  $school->website != "#")
                            <div class="blue  paragraph-style2 mt-2">
                                @lang('Website'): <a href="{{$school->website}}"
                                                     class="light-blue paragraph-style1">{{$school->website}}</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-between blue">
            <div class="h4 blue">@lang('Book a session')</div>
        </div>
    </div>
    @php
        /**@var \App\Models\Fairs\FairSession[] $sessions*/
    @endphp
    @forelse($sessions as $session)
        @php
            $request = $session->reservationRequests?->first();
             /**@var \App\Models\Fairs\FairReserveSessionRequest $request*/
        @endphp
        <div class="card my-2">
            <div class="p-3">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div class="h5 blue col-md-9 col-12 mb-0">@lang('Slot') {{$loop->iteration}}
                        , {{$session->major?->title}}
                    </div>
                    <div class="col-12 col-md-3 ">
                        @if(!empty($session->university_id) || !empty($session->agent_id))
                            @if($session->university_id != Auth::user()->selected_university?->id)
                                <div class="my-2 gray d-flex justify-content-end align-items-center">@lang('This slot is already booked!')</div>
                            @else
                                <div class="d-flex justify-content-end">
                                    <button class="button-sm button-red mobile-btn w-45" wire:click="cancelBooking({{$session->id}})">@lang('Cancel')</button>
                                    <button class="button-sm button-green mobile-btn w-45">@lang('Booked')</button>
                                </div>
                            @endif
                        @elseif(!empty($request))
                            @if($request->status == AppConst::REGISTARTION_REJECTED)
                                <button class="button-sm button-red mobile-btn w-98">@lang('Booking Rejected')</button>
                            @else
                                <div class="d-flex justify-content-end">
                                    <button class="button-sm button-orange mobile-btn w-50" wire:click="withdrawBookingRequest({{$request->id}})">@lang('Withdraw')</button>
                                    <button class="button-sm button-light-blue mobile-btn w-50">@lang('Pending')</button>
                                </div>
                            @endif
                        @else
                            @if($events_credit > 0)
                                <button class="button-blue button-sm mobile-btn w-98" wire:click="requestBooking({{$session->id}})">@lang('Request Booking')</button>
                            @else
                                <div class="my-2 red d-flex justify-content-end align-items-center">@lang("You don't have any events credit")</div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse
    <x-general.loading message="Loading"/>
</div>
