<div>

    <div x-data="{ showFilters:false }" class="w-100">
        <div class="row">
            <div class="col-12 d-flex justify-content-between blue">
                <div class="h5 blue">@lang('Schools List')
                @include('about-icon')</div>
                <i class="d-md-none fas fa-filter pointer blue blue" @click="showFilters = !showFilters"
                   aria-hidden="true"></i>
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback light-blue" aria-hidden="true"></span>
                    <input type="text" wire:model.devounce.500ms="query" class="form-control" placeholder="Search">
                </div>
            </div>
        </div>
        @php
            /**
            * @var \App\Models\General\Countries[] $countries
            * @var \App\Models\General\Curriculum[] $curriculums
            * @var \App\Models\General\FeeRange[] $fee_ranges
            * @var \App\Models\Institutes\School[]|\Illuminate\Pagination\LengthAwarePaginator  $schools
            **/
        @endphp
        <div class="align-items-center my-3 d-md-flex small5 d-none" :class="showFilters ? '':'d-none' ">
            <!--to force new line-->
            <div class="col mobile-marg-2 col-marg mx-1">
                <select wire:model="filter_by_country" class="input-field form-control" aria-label="" wire:change="loadFilteredData">
                    <option value="">@lang('Filter by Country')</option>
                    @foreach($countries ?? [] as $country)
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <!--to force new line-->
            <div class="col mobile-marg-2 col-marg mx-1">
                <select wire:model="filter_by_curriculum" class="input-field form-control" aria-label="" wire:change="loadFilteredData">
                    <option value="">@lang('Filter by Curriculum')</option>
                    @foreach($curriculums ?? [] as $curriculum)
                        <option value="{{$curriculum->id}}">{{$curriculum->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <!--to force new line-->
            <div class="col mobile-marg-2 col-marg mx-1">
                <select wire:model="filter_by_no_students" class="input-field form-control" aria-label="" wire:change="loadFilteredData">
                    <option value="">@lang('Number of Students')</option>
                    <option value="2000">2000</option>

                </select>
            </div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <!--to force new line-->
            <div class="col mobile-marg-2 col-marg mx-1">
                <select wire:model="filter_by_school_fee" class="input-field form-control" aria-label="" wire:change="loadFilteredData">
                    <option value="">@lang('Filter by School Fee')</option>
                    @foreach($fee_ranges ?? [] as $fee_range)
                        <option value="{{$fee_range->id}}">{{$fee_range->currency_range}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <x-general.loading wire:target="loadFilteredData, previousPage, gotoPage, nextPage" message="Processing..."/>

    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="table-responsive mx-3">
                <table class="table table-hover sticky-sidebar-table">
                    <thead>
                    <tr>
                        <td scope="col" class="pt-3 border-bottom2">
                            <div class="d-flex align-items-center p-0">
                                <div class="blue"> @lang('School Name')</div>
                            </div>
                        </td>
                        <td scope="col" class="border-bottom2">@lang('ID')</td>
                        <td scope="col" class="border-bottom2">@lang('Country')</td>
                        <td scope="col" class="border-bottom2">@lang('City')</td>
                        <td scope="col" class="border-bottom2">@lang('Curriculum')</td>
                        <td scope="col" class="border-bottom2">@lang('Fees')</td>
                        <td scope="col" class="border-bottom2">@lang('Grade 11')</td>
                        <td scope="col" class="border-bottom2">@lang('Grade 12')</td>
                        <td scope="col" class="border-bottom2">@lang('Engagement')</td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($schools  as $school)
                        <!-- Row Start -->
                        <tr>
                            <td class="p-0">
                                <div class="d-flex align-items-center p-2">
                                    <div class=""><img src="{{$school->logo_url}}" class="rounded-circle"
                                                           style="width: 30px; height: 30px"></div>
                                    <div class="ps-2 blue">{{$school->translated_name ?: $school->school_name}}</div>
                                </div>
                            </td>
                            <td class="">{{$school->id}}</td>
                            {{--                            <td class="">School Event</td>--}}
                            <td class="">{{$school->country?->country_name ?? "N/A"}}</td>
                            <td class="">{{$school->city?->city_name ?? "N/A"}}</td>
                            <td class="">{{$school->curriculum?->title ?? "N/A"}}</td>
                            <td class="">{{$school?->g_12_fee_range?->currency_range ?: 'N/A'}}</td>
                            <td class="">{{$school?->number_grade11}}</td>
                            <td class="">{{$school?->number_grade12 ?: $school->grade_13  }}</td>
                            <td class="">Maximum</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11"><p class="text-center gray">@lang('No Data!')</p></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-md-flex justify-content-between  align-items-baseline mt-3">
        <div class="text-muted small2">
            @lang('Showing results') {{$schools->firstItem()}} @lang('-')
            {{$schools->lastItem()}} @lang('out of') {{$schools->total()}}
        </div>
        {!! $schools->links() !!}
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
