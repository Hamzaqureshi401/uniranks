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
                <div class="h2 blue mt-1">@lang('University Fair')</div>
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
                </div>
                <div class="border-left3 ps-3 col-md-4">
                    <div class="padding-left-4 mobile-marg">
                        <div class="blue h4">
                            @lang('Fees'): <span class="light-blue">{{$school?->g_12_fee_range?->currency_range ?? 'N/A'}}</span>
                        </div>
                        <div class="blue h4 mt-3">
                            <div class="mt-2">
                                @lang('Students G12'): <span class="light-blue">{{$school->number_grade12 ?? 'N/A'}}</span>
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
                            @lang('Remaining Seats'): {{intVal($fair->max) - $fair->confirmed_universities_count}}/ {{$fair->max}}

                        </div>

                    </div>
                </div>
            </div>
            <div class="d-md-flex mt-5 justify-content-between align-items-end">
                <div class="col-md-8 mt-5">
                    @if(!empty($school->website) &&  $school->website != "#")
                        <a href="{{$school->website}}" class="light-blue paragraph-style1">{{$school->website}}</a>
                    @endif
                    &nbsp;
                </div>
                <div class="mt-5 col-md-4">
                    @if($fair->invitation->isEmpty())
                        @if($events_credit > 0)
                            <div class="d-flex">
                                <button class="button-sm button-red m-0 regsiter-button-div"
                                        wire:click="rejectFair('{{$fair->id}}')">@lang('Reject')</button>
                                <button class="button-sm button-blue m-0 regsiter-button-div ms-2"
                                        wire:click="acceptFair('{{$fair->id}}')">@lang('Join')</button>
                            </div>
                        @else
                            <div class="red h6 mb-0 mt-2 text-place-end">@lang("You don't have any events credit,")<br><a href="javacript:void(0)" class="red">@lang('click here for more info')</a></div>
                        @endif
                    @else

                        @php
                            /**@var \App\Models\Fairs\Invitation $invitation*/
                            $invitation = $fair->invitation->first();
                        @endphp
                        @if($fair->invitation->first()?->status == AppConst::INVITATION_ACCEPTED)
                            <div class="mobile-marg text-end">
                                @if($invitation->accepted_by_school == AppConst::REGISTARTION_ACCEPTED)
                                    <div
                                        class="green h6 mb-0 mt-2 text-place-end">@lang('Approved by School!')</div>
                                @elseif($invitation->accepted_by_school == AppConst::REGISTARTION_REJECTED)
                                    <div
                                        class="red h6 mb-0 mt-2 text-place-end">@lang('Rejected by School!')</div>
                                @else
                                    {{--                                                <div class="light-blue h6 mb-0 mt-2 text-place-end">@lang('Pending Approval From School')</div>--}}
                                    <button class="button-sm button-red m-0 width-45 mobile-btn"
                                            wire:click="rejectFair('{{$fair->id}}')">@lang('Reject')</button>

                                    <div class="gray h6 mb-0 mt-2 text-place-end">@lang('Accepted do you want to reject')</div>
                                @endif
                            </div>
                        @else
                            @if($events_credit > 0)
                                <div class="d-flex justify-content-end mobile-marg">
                                    <button class="button-sm button-blue m-0 width-45 mobile-btn" wire:click="acceptFair('{{$fair->id}}')">@lang('Join')</button>
                                </div>
                                <div class="gray h6 mb-0 mt-2 text-place-end">@lang('Rejected do you want to accept')</div>
                            @else
                                <div class="red h6 mb-0 mt-2 text-place-end">@lang("You have Rejected the fair. You don't have any events credit, to join the fair")</div>
                            @endif

                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <x-general.loading message="Loading" />
</div>
