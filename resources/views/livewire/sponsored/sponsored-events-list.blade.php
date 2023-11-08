<div>
    <div class="row">
        <div class="col-12 d-flex justify-content-between blue">
            <div class="h4 blue">@lang('School Request Event Sponsor')</div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-between blue">
            <div class="h5 blue">@lang('Find schools are looking to have a solo event with you')</div>
        </div>
    </div>
    @php
        /**
        * @var \App\Models\School\SchoolSponsoredEvent[]|\Illuminate\Pagination\LengthAwarePaginator  $events
        **/
    @endphp
    @forelse($events as $event)
        @php
            $school = $event->school;
            $offer = $event->offers?->first();
            $currency = $event->createdByUser?->preferences?->currency?->code;
            /**
            * @var \App\Models\School\SchoolSponsoredEventOffer $offer
            **/
            $details_url = route('admin.sponsored.view',$event->id)
        @endphp
        <div class="card mt-3">
            <div class="p-3">
                <div class="d-flex align-self-start justify-content-between">
                    <a href="{{$details_url}}" class="w-10 university-img-div">
                        <img src="{{$school->logo_url}}" class="" width="89px">
                    </a>
                    <div class="w-90 ps-3 d-flex flex-column justify-content-between align-items-stretch">
                        <div class="top-content">
                            <div class="col-lg-8">
                                <a href="{{$details_url}}"
                                   class="h5 blue text-decoration-none">{{$school->school_name}}</a>
                            </div>
                            <div
                                class="col-lg-4 light-blue light-blue-text text-place-end">@lang('Multiple sponsorship are allowed')
                                : {{$event->is_multiple_sponsors_allowed}} </div>

                        </div>
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div
                                class="h5 font-light blue">{{$event->name}} @lang('Looking for') {{$event->amount}} {{$currency}} @lang('Sponsorship')</div>
                            <div>
                                @if(empty($offer))
                                    <a href="{{$details_url}}"
                                       class="button-xs button-blue m-0 text-decoration-none p-1">@lang('Sponsorship detail')</a>
                                @else
                                    <a href="{{$details_url}}"
                                        @class(['button-xs m-0 text-decoration-none p-1',
                                         'button-green'=>$offer->status == AppConst::APPROVED,
                                         'button-red'=>$offer->status == AppConst::REJECTED,
                                         'button-orange'=>$offer->status == AppConst::PENDING,
                                         ])>
                                        @lang('Applied and') @lang($offer->status_name)
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="d-md-flex h6 gray justify-content-between align-items-end mt-2 mb-0">
                            <div class="">@lang('Event date'): {{$event->event_datetime?->toDayDateTimeString()}}</div>
                            <div class="">@lang('Event Deadline'): {{$event->deadline?->toDayDateTimeString()}}</div>
                            <div>@lang('Fees'): {{$school->g_12_fee_range?->currency_range ?? "N/A"}}</div>
                            <div class="">@lang('Grade 12 Students'):{{$school->number_grade12 ?? "N/A"}}</div>
                            <div class="">@lang('Grade 11 Students'):{{$school->number_grade11 ?? "N/A"}}</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    @empty
        <div class="row">
            <div class="col-12">
                <h6 class="text-center mt-4 no-records">
                    @lang('No Record Found!')
                </h6>
            </div>
        </div>
    @endforelse
    @unless($events->hasPages())
        {!! $events->links() !!}
    @endunless
</div>
