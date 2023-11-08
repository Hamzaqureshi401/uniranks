<div>
    @php
        /**
        * @var \App\Models\General\Countries[] $countries
        * @var \App\Models\General\Cities[] $cities
        * @var \App\Models\General\Curriculum[] $curriculums
        * @var \App\Models\General\FeeRange[] $fee_ranges
        * @var \App\Models\Fairs\Fair[]|\Illuminate\Pagination\LengthAwarePaginator  $fairs
        **/
    @endphp
    <div x-data="{ showFilters:false }" class="w-100">
        <div class="row">
            <div class="col-12 d-flex justify-content-between blue">
                <div class="h4 blue">Upcoming University Fair</div>
                <i class="d-md-none fas fa-filter pointer blue blue" @click="showFilters = !showFilters"
                   aria-hidden="true"></i>
            </div>
        </div>
        <div class="align-items-center my-3 d-md-flex small5" :class="showFilters ? '':'d-none' ">
            <div class="col mobile-marg-2 col-marg mx-1">
                <select wire:model="filter_by_country" class="input-field form-control" aria-label=""
                        wire:change="loadFilteredData">
                    <option value="">@lang('Select Country')</option>
                    @foreach($countries ?? [] as $country)
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <div class="col mobile-marg-2 col-marg mx-1">
                <select wire:model="filter_by_city" class="input-field form-control" aria-label=""
                        wire:change="loadFilteredData">
                    <option value="">@lang('Select City')</option>
                    @foreach($cities ?? [] as $city)
                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <!--to force new line-->
            <div class="col mobile-marg-2 col-marg mx-1 ">
                <x-elements.date-range-picker wire:model="period" wire:change="loadFilteredData"
                                              placeholder="Select Period"/>
            </div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <!--to force new line-->
            <div class="col mobile-marg-2 col-marg mx-1">
                <select wire:model="filter_by_school_fee" class="input-field form-control" aria-label=""
                        wire:change="loadFilteredData">
                    <option value="">@lang('Select Fee Range')</option>
                    @foreach($fee_ranges ?? [] as $fee_range)
                        <option value="{{$fee_range->id}}">{{$fee_range->currency_range}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <!--to force new line-->
            <div class="col mobile-marg-2 col-marg mx-1">
                <select wire:model="filter_by_curriculum" class="input-field form-control" aria-label=""
                        wire:change="loadFilteredData">
                    <option value="">@lang('Select Curriculum')</option>
                    @foreach($curriculums ?? [] as $curriculum)
                        <option value="{{$curriculum->id}}">{{$curriculum->title}}</option>
                    @endforeach
                </select>
            </div>
            {{--            <div class="w-100 d-block d-md-none my-1"></div>--}}
            {{--            <!--to force new line-->--}}
            {{--            <div class="col col-marg">--}}
            {{--                <select class="input-field form-control" aria-label="">--}}
            {{--                    <option>Number of Students</option>--}}
            {{--                    <option>2000&gt;</option>--}}
            {{--                    <option>2000&gt;</option>--}}
            {{--                </select>--}}
            {{--            </div>--}}
        </div>
    </div>
    @forelse($fairs as $fair)
        <div class="card mt-3">
            <div class="p-3">
                <div class="row">
                    <a href="{{route('admin.schoolFairs.fair.view',$fair->id)}}" class="col-12 col-lg-2 university-img-div">
                        <img src="{{$fair->school->logo_url}}" class="" width="93px">
                    </a>
                    <div class="col-12 col-lg-10 ps-3 d-flex flex-column justify-content-between align-items-stretch">
                        <div class="top-content">
                            <div class="col-lg-9">
                                <a href="{{route('admin.schoolFairs.fair.view',$fair->id)}}" class="h5 blue text-decoration-none">{{$fair->school->school_name}}</a>
                            </div>
                            <div class="col-lg-3 light-blue light-blue-text text-place-end">
                                @lang('Remaining Seats') {{intVal($fair->max) - $fair->confirmed_universities_count}}
                                / {{$fair->max}}
                            </div>

                        </div>
                        <div class="top-content align-items-end">
                            <div class="col-lg-8">
                                <div class="paragraph-style1">
                                    <div class="light-blue small5 justify-content-between  d-md-flex">
                                        <div
                                            class="">{{$fair->school?->city?->city_name.', '.$fair->school?->country?->country_name}}</div>
                                        &nbsp;
                                        <div class="">{{$fair->datetime}}</div>
                                    </div>
                                    <div class="d-md-flex mt-2 h6 mb-0 justify-content-between gray">
                                        <div
                                            class="mt-1">@lang('Fees') {{$fair->school?->g_12_fee_range?->currency_range}}</div>
                                        <div class="mt-1">@lang('Grade 12 Students')
                                            :{{$fair->school?->number_grade12}}</div>
                                        <div class="mt-1">@lang('Grade 11 Students')
                                            :{{$fair->school?->number_grade11}}</div>
                                        <div class="mt-1">@lang('Curriculum')
                                            : {{$fair?->school?->curriculum?->title}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-3 text-end">
                                @if($fair->invitation->isEmpty())
                                    @if($events_credit > 0)
                                    <div class="d-flex">
                                        <button class="button-sm button-red m-0 regsiter-button-div"
                                                wire:click="rejectFair('{{$fair->id}}')">@lang('Reject')</button>
                                        <button class="button-sm button-blue m-0 regsiter-button-div ms-2"
                                                wire:click="acceptFair('{{$fair->id}}')">@lang('Join')</button>
                                    </div>
                                    @else
                                    <div class="red h6 mb-0 mt-2 text-place-end">@lang("You don't have any events credit,")
                                    </div>
                                    @endif
                                @else
                                    @php
                                        /**@var \App\Models\Fairs\Invitation $invitation*/
                                        $invitation = $fair->invitation->first();
                                    @endphp
                                    @if($invitation?->status == AppConst::INVITATION_ACCEPTED)
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
                                                <button class="button-sm button-blue m-0 width-45 mobile-btn"
                                                        wire:click="acceptFair('{{$fair->id}}')">@lang('Join')</button>
                                            </div>
                                            <div class="gray h6 mb-0 mt-2 text-place-end">@lang('Rejected do you want to accept')</div>
                                        @else
                                            <div class="red h6 mb-0 mt-2 text-place-end">@lang("You have Rejected the fair. You don't have any events credit, to join the fair")
                                            </div>
                                        @endif

                                    @endif
                                @endif
                            </div>
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
    <x-general.loading message="Loading"/>

    <div class="d-md-flex justify-content-between  align-items-baseline mt-3">
        <div class="text-muted small2">
            @lang('Showing results') {{$fairs->firstItem()}} @lang('-')
            {{$fairs->lastItem()}} @lang('out of') {{$fairs->total()}}
        </div>
        {!! $fairs->links() !!}
    </div>
    @push(AppConst::PUSH_JS)
        <script>
            Livewire.on('goToTop', () => {
                window.scrollTo({
                    top: 350,
                    left: 15,
                    behaviour: 'smooth'
                })
            })
        </script>
    @endpush
</div>
