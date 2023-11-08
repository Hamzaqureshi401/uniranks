<div>
    <div x-data="{ selectedStudents:@entangle('selectedStudents'),showFilters:true, selected_count:0 }"
         x-init="
         selected_count = selectedStudents.length;
         $watch('selectedStudents', value => {
         selected_count = selectedStudents.length;
         showFilters = !(selected_count > 0);
         })"  class="w-100">
        @php
            /**
            * @var \App\Models\General\Countries[] $countries
            * @var \App\Models\General\Countries[] $destinations
            * @var \App\Models\General\Major[] $majors
            * @var \App\Models\Institutes\University[] $universities
            * @var \App\Models\Institutes\School[] $schools
            * @var \App\Models\General\Curriculum[] $curriculums
            * @var \App\Models\General\FeeRange[] $fee_ranges
            * @var \App\Models\General\LeadSource[] $sources
            * @var \App\Models\User[]|\Illuminate\Pagination\LengthAwarePaginator  $students
            **/
        @endphp

        <div class="card shadow-none bg-transparent2">
                <div id="select-div" x-show="showFilters" class="shadow-none" style="">
                    <div class="p-3 d-lg-flex align-items-end">
                        <div class="blue h5 mb-0 col-lg-3 col-md-4 col-12">@lang('Repository Leads')</div>
                        <div class="col-lg-9 col-md-12 h-10  col-12 d-md-flex justify-content-end align-items-center">
                            <div
                                class="d-flex justify-content-between pe-5 align-items-end align-self-end mobile-marg2">
                                <div class="dropdown btn-group gray">
                                    <button class="m-0 px-1 gray my-dropdown-toggle d-flex align-items-end"
                                            type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                    <span><i
                                            class="fa-solid fa-filter gray pe-1"></i></span><span>@lang('Filters')</span>
                                    </button>
                                    <div class="dropdown-menu  filter-dropdown gray shadow-none"
                                         aria-labelledby="dropdownMenuButton">
                                        <!-- New Item -->
                                        <div class="dropdown dropend">
                                            <a class="dropdown-item dropdown-toggle  blue a-underline" href="#"
                                               id="dropdown-layouts"
                                               data-bs-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">@lang('Lead Source')</a>
                                            <div class="dropdown-menu dropdown-menu-last"
                                                 aria-labelledby="dropdown-layouts">
                                                <a class="dropdown-item blue a-underline" href="javascript:void(0)"
                                                   wire:click="applyFilters('filter_by_source','')"
                                                   wire:key="source-all">@lang('All')</a>
                                                @foreach($sources ?? [] as $source)
                                                    <a class="dropdown-item blue a-underline" href="javascript:void(0)"
                                                       wire:click="applyFilters('filter_by_source','{{$source->id}}')"
                                                       wire:key="source-{{ $source->id }}">
                                                        {{$source->translated_name ?: $source->title}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- New Item -->
                                        <div class="dropdown dropend">
                                            <a class="dropdown-item dropdown-toggle blue a-underline" href="#"
                                               id="dropdown-layouts"
                                               data-bs-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">@lang('Student From')</a>
                                            <div class="dropdown-menu dropdown-menu-last"
                                                 aria-labelledby="dropdown-layouts">
                                                <a class="dropdown-item blue a-underline" href="javascript:void(0)"
                                                   wire:click="applyFilters('filter_by_country','')"
                                                   wire:key="country-all">@lang('All')</a>
                                                @foreach($countries ?? [] as $country)
                                                    <a class="dropdown-item blue a-underline" href="javascript:void(0)"
                                                       wire:click="applyFilters('filter_by_country','{{$country->id}}')"
                                                       wire:key="country-{{ $country->id }}">
                                                        {{$country->translated_name ?: $country->country_name}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- New Item -->
                                        <div class="dropdown dropend">
                                            <a class="dropdown-item dropdown-toggle blue a-underline" href="#"
                                               id="dropdown-layouts"
                                               data-bs-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">@lang('Selected university')</a>
                                            <div class="dropdown-menu dropdown-menu-last"
                                                 aria-labelledby="dropdown-layouts">
                                                <a class="dropdown-item blue a-underline" href="javascript:void(0)"
                                                   wire:click="applyFilters('filter_by_university','')"
                                                   wire:key="university-all">@lang('All')</a>
                                                @foreach($universities ?? [] as $university)
                                                    <a class="dropdown-item blue a-underline" href="javascript:void(0)"
                                                       wire:click="applyFilters('filter_by_university','{{$university->id}}')"
                                                       wire:key="university-{{ $university->id }}">
                                                        {{$university->translated_name ?: $university->university_name}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- New Item -->
                                        <div class="dropdown dropend">
                                            <a class="dropdown-item dropdown-toggle blue a-underline" href="#"
                                               id="dropdown-layouts"
                                               data-bs-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">@lang('Selected Program')</a>
                                            <div class="dropdown-menu dropdown-menu-last"
                                                 aria-labelledby="dropdown-layouts">
                                                <a class="dropdown-item blue a-underline " href="javascript:void(0)"
                                                   wire:click="applyFilters('filter_by_major','')"
                                                   wire:key="major-all">@lang('All')</a>
                                                @foreach($majors ?? [] as $major)
                                                    <a class="dropdown-item blue a-underline" href="javascript:void(0)"
                                                       wire:click="applyFilters('filter_by_major','{{$major->id}}')"
                                                       wire:key="major-{{ $major->id }}">
                                                        {{$major->translated_name ?: $major->title}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- New Item -->
                                        <div class="dropdown dropend">
                                            <a class="dropdown-item dropdown-toggle blue a-underline" href="#"
                                               id="dropdown-layouts"
                                               data-bs-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">@lang('Selected Destination')</a>
                                            <div class="dropdown-menu dropdown-menu-last"
                                                 aria-labelledby="dropdown-layouts">
                                                <a class="dropdown-item blue a-underline" href="javascript:void(0)"
                                                   wire:click="applyFilters('filter_by_destination','')"
                                                   wire:key="destination-all">@lang('All')</a>
                                                @foreach($destinations ?? [] as $destination)
                                                    <a class="dropdown-item blue a-underline" href="javascript:void(0)"
                                                       wire:click="applyFilters('filter_by_destination','{{$destination->id}}')"
                                                       wire:key="destination-{{ $destination->id }}">
                                                        {{$destination->translated_name ?: $destination->country_name}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- New Item -->
                                        <div class="dropdown dropend">
                                            <a class="dropdown-item dropdown-toggle blue a-underline" href="#"
                                               id="dropdown-layouts"
                                               data-bs-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">@lang('Created Date')</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                                <x-elements.date-range-picker wire:model="filter_by_created_date"
                                                                              wire:change="loadFilteredData"
                                                                              placeholder="Select Period"/>
                                            </div>
                                        </div>
                                        <!-- New Item -->
                                        {{--                                    <div class="dropdown dropend">--}}
                                        {{--                                        <a class="dropdown-item dropdown-toggle blue a-underline" href="#"--}}
                                        {{--                                           id="dropdown-layouts"--}}
                                        {{--                                           data-bs-toggle="dropdown" aria-haspopup="true"--}}
                                        {{--                                           aria-expanded="false">@lang('Close Date')</a>--}}
                                        {{--                                        <div class="dropdown-menu" aria-labelledby="dropdown-layouts">--}}
                                        {{--                                            <x-elements.date-range-picker wire:model="filter_by_close_date"--}}
                                        {{--                                                                          wire:change="loadFilteredData"--}}
                                        {{--                                                                          placeholder="Select Period"/>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                    </div>
                                </div>
                                <div class="dropdown gray ms-2">
                                    <button class="m-0 px-1 gray my-dropdown-toggle d-flex align-items-end"
                                            type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                    <span><i
                                            class="fa-solid fa-layer-group gray pe-1"></i></span><span>@lang('Group By')</span>
                                    </button>
                                    <div class="dropdown-menu  filter-dropdown gray shadow-none"
                                         aria-labelledby="dropdownMenuButton">
                                        <!-- New Item -->
                                        <a class="dropdown-item  blue a-underline" href="javascript:void(0)"
                                           wire:click="applyGroupBy('group_by_source')">@lang('Lead Source')</a>
                                        <!-- New Item -->
                                        <a class="dropdown-item  blue a-underline" href="javascript:void(0)"
                                           wire:click="applyGroupBy('group_by_country')">@lang('From Country')</a>
                                        <!-- New Item -->
                                        <a class="dropdown-item  blue a-underline" href="javascript:void(0)"
                                           wire:click="applyGroupBy('group_by_created_date')">@lang('Created Date')</a>
                                    </div>
                                </div>
                                <div class="dropdown gray ms-2">
                                    <button class="m-0 px-1 gray my-dropdown-toggle d-flex align-items-end"
                                            type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        <span><i
                                                class="fa-solid fa-eye pe-1 gray"></i></span><span>@lang('Matching')</span>
                                    </button>
                                    <div class="dropdown-menu  filter-dropdown gray shadow-none"
                                         aria-labelledby="dropdownMenuButton">
                                        <!-- New Item -->
                                        <a class="dropdown-item  blue a-underline" href="javascript:void(0)"
                                           wire:click="applyFilters('filter_by_matching','')">@lang('All')</a>
                                        <!-- New Item -->
                                        <a class="dropdown-item  blue a-underline" href="javascript:void(0)"
                                           wire:click="applyFilters('filter_by_matching','10')">10</a>
                                        <!-- New Item -->
                                        <a class="dropdown-item  blue a-underline" href="javascript:void(0)"
                                           wire:click="applyFilters('filter_by_matching','7')">7</a>
                                        <!-- New Item -->
                                        <a class="dropdown-item  blue a-underline" href="javascript:void(0)"
                                           wire:click="applyFilters('filter_by_matching','5')">5</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="o_cp_searchview d-flex flex-grow-1" role="search">
                                    <div class="o_searchview pb-1 align-self-center border-bottom flex-grow-1"
                                         role="search"
                                         aria-autocomplete="list"><i
                                            class="o_searchview_icon fa-solid fa-magnifying-glass gray" role="img"
                                            aria-label="Search..." title="Search..."></i>
                                        <div class="o_searchview_input_container">
                                            @foreach($tags as $type=>$tagGrp)
                                                <div class="o_searchview_facet" role="img" aria-label="search"
                                                     tabindex="0">
                                                    <span class="o_searchview_facet_label fa fa-{{$type}}"></span>
                                                    <div class="o_facet_values border-start-0">
                                                        @foreach($tagGrp as $tag)
                                                            <span class="o_facet_value">{{$tag}}</span>
                                                            @if(!$loop->last)
                                                                <span class="o_facet_values_sep">or</span>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <i class="o_facet_remove fa-solid fa-close btn btn-link opacity-50 opacity-100-hover text-900"
                                                       role="img" aria-label="Remove" title="Remove"
                                                       wire:click="remove_{{$type}}"></i>
                                                </div>
                                            @endforeach
                                            <input type="text" class="o_searchview_input" accesskey="Q"
                                                   wire:model.devounce.500ms="query"
                                                   placeholder="Search..." role="searchbox"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="select-div-2" x-show="!showFilters" class="shadow-none bg-light-blue card-radius-left-right mobile-marg">
                    <div class="p-3 d-lg-flex align-items-center">
                        <div class="col-5 d-flex align-items-center">
                            <div class="white me-5"><span x-text="selected_count"></span> @lang('selected')</div>
                            @if(!$selected_all)
                                <div class="width-14 mobile-btn">
                                    <label class="button-xs button-no-bg3 w-95 p-1"
                                           for="select-all-leads">@lang('Select all') {{$students->total()}}</label>
                                </div>
                            @endif
                            @if($can_buy_leads)
                                <div class="width-14 mobile-btn">
                                    <button  wire:click="buyLeads" class="button-xs button-no-bg3 w-95 p-1"><i
                                            class="fa-solid fa-arrow-right-to-bracket"></i> @lang('Add to my students')
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="col-7 px-0 d-flex justify-content-mobile-start justify-content-end">
                            <div class="white">
                                @if(!$can_buy_leads)
                                    <label class="white">@lang('* You have insufficient UR credit to buy selected leads,')</label>
                                @endif
                                <strong><span x-text="selected_count"></span> </strong> @lang('credit is required for the selection')
                            </div>
                        </div>

                    </div>
                </div>

                <div id="content2" class="bg-white ">
                <div class="table-responsive mx-3">
                    <table class="table sticky-sidebar-table">
                        <thead>
                        <tr>
                            <td scope="col" class="p-0 border-bottom2">
                                <div class="d-flex align-items-center p-2">
                                    <div>
                                        <input wire:model="selected_all" id="select-all-leads" value="1"
                                               wire:change="selectAll"
                                               class="form-check-input chkUser" type="checkbox" name="chkUser"></div>
                                    <div class="ps-3 blue"> @lang('Name')</div>
                                </div>
                                {{--                            <hr class="m-0">--}}
                            </td>
                            <td scope="col" class="border-bottom2">@lang('Match Status')</td>
                            <td scope="col" class="border-bottom2">@lang('SID')</td>
                            <td scope="col" class="border-bottom2">@lang('Source')</td>
                            <td scope="col" class="border-bottom2">@lang('Country')</td>
                            <td scope="col" class="border-bottom2">@lang('Curriculum')</td>
                            <td scope="col" class="border-bottom2">@lang('Budget')</td>
                            <td scope="col" class="border-bottom2">@lang('Destinations')</td>
                            <td scope="col" class="border-bottom2">@lang('Universities')</td>
                            <td scope="col" class="border-bottom2">@lang('Programs')</td>
                            <td scope="col" class="border-bottom2">@lang('Status')</td>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($students  as $student)
                            @php
                                $matching = calculateMatching($student,$uni_majors,$uni_city,$uni_country) * 10;
                            @endphp
                            <tr>
                                <td class="p-0">
                                    <div class="d-flex align-items-center p-2">

                                        <div><input class="form-check-input chkUser" value="{{ $student->id }}"
                                                    type="checkbox" @change="$wire.selectLead()"
                                                    x-model="selectedStudents"></div>
                                        <div class="ps-3"><img src="{{$student->profile_photo_url}}"
                                                               class="rounded-circle"
                                                               style="width: 30px; height: 30px"></div>
                                        <div
                                            class="ps-2 blue">{{$student->name ?: ($student->userBio?->first_name ."". $student->userBio?->last_name) }}</div>
                                    </div>
                                    {{--                                <hr class="m-0">--}}
                                </td>
                                <td class="">
                                    <div>
                                        <div class="discreteProgress3" style="background-position: -{{$matching}}%;"
                                             id="mainProgress"></div>
                                    </div>
                                </td>
                                <td class="">{{$student->id}}</td>
                                <td class="">{{$student->leadSource?->title ?? "N/A"}}</td>
                                <td class="">{{$student->userBio?->country?->country_name ?? "N/A"}}</td>
                                <td class="">{{$student->userBio?->curriculum?->title ?? "N/A"}}</td>
                                <td class="">{{$student->userBio?->feeRange?->currency_range ?? "N/A"}}</td>
                                <td class="">
                                    @if($student->studyDestinations->isEmpty())
                                        N/A
                                    @else
                                        {{$student->studyDestinations->first()->short_name}} <a href=""
                                                                                                class="light-blue">{{$student->studyDestinations->count()}}</a>
                                    @endempty
                                </td>
                                <td class="">
                                    @if($student->preferredUniversities->isEmpty())
                                        N/A
                                    @else
                                        {{$student->preferredUniversities->first()->university_name}} <a href=""
                                                                                                         class="light-blue">{{$student->preferredUniversities->count()}}</a>
                                    @endempty
                                </td>
                                <td class="">
                                    @if($student->majors->isEmpty())
                                        N/A
                                    @else
                                        {{$student->majors->first()->title}} <a href=""
                                                                                class="light-blue">{{$student->majors->count()}}</a>
                                    @endempty
                                </td>
                                <td class="">Enrolled</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11"><p class="text-center gray">@lang('No Leads Added Yet')</p></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="footer2">
                <div class="p-3 d-md-flex justify-content-end align-items-center">
                    @if(!empty($selectedStudents))
                        <div id="footer-div-show" class="col-md-7">
                            <div class="d-flex">
                                <div
                                    class="blue"><span x-text="selected_count"></span>  @lang('applications have been selected')</div>


                                <div class="ps-4">
                                    @if(!$can_buy_leads)
                                        <label class="red">@lang('* You have insufficient UR credit to buy selected leads,')</label>
                                    @else
                                    <a href="javascript:void(0)" wire:click="buyLeads"  class="gray a-underline"><i
                                            class="fa-solid fa-arrow-right-to-bracket"></i> @lang('Add to my students')</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    @unless(!$students->hasPages())
                        <div class="justify-content-between col-md-5 d-md-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="gray pe-2">@lang('Show rows'):</div>
                                <div>
                                    <select wire:model="per_page" wire:change="loadFilteredData"
                                            class="form-control input-field">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                            </div>
                            @php(isset($students->numberOfPaginatorsRendered[$students->getPageName()]) ? $students->numberOfPaginatorsRendered[$students->getPageName()]++ : $students->numberOfPaginatorsRendered[$students->getPageName()] = 1)
                            <div class="gray">{{$students->firstItem()}} @lang('-')
                                {{$students->lastItem()}} @lang('of') {{$students->total()}}</div>
                            {{--                    {{$students->onFirstPage()}}--}}
                            <div class="d-flex justify-content-between col-md-4 col-12">
                                {{--                        @if($students->currentPage() <= 1)--}}
                                {{--                            <a href="javascript:void(0)" class="text-decoration-none gray disabled"><i--}}
                                {{--                                    class="fa-solid fa-angles-left"></i></a>--}}
                                {{--                            <a href="javascript:void(0)" class="text-decoration-none gray disabled"><i--}}
                                {{--                                    class="fa-solid fa-chevron-left"></i></a>--}}
                                {{--                        @else--}}
                                {{--                            {{$students->currentPage()}}--}}
                                <a href="javascript:void(0)" wire:click="gotoPage(1, '{{$students->getPageName()}}')"
                                   class="text-decoration-none gray"><i
                                        class="fa-solid fa-angles-left"></i></a>
                                <a href="javascript:void(0)"
                                   dusk="previousPage{{ $students->getPageName() == 'page' ? '' : '.' . $students->getPageName() }}"
                                   wire:click="previousPage('{{ $students->getPageName() }}')"
                                   class="text-decoration-none gray"><i
                                        class="fa-solid fa-chevron-left"></i></a>
                                {{--                        @endif--}}

                                @if ($students->hasMorePages())
                                    <a href="javascript:void(0)"
                                       dusk="nextPage{{ $students->getPageName() == 'page' ? '' : '.' . $students->getPageName() }}"
                                       wire:click="nextPage('{{ $students->getPageName() }}')"
                                       class="text-decoration-none gray"><i
                                            class="fa-solid fa-chevron-right"></i></a>
                                    <a href="javascript:void(0)"
                                       wire:click="gotoPage({{$students->lastPage()}}, '{{$students->getPageName()}}')"
                                       class="text-decoration-none gray"><i class="fa-solid fa-angles-right"></i></a>
                                @else
                                    <a href="javascript:void(0)" class="text-decoration-none gray"><i
                                            class="fa-solid fa-chevron-right"></i></a>
                                    <a href="javascript:void(0)" class="text-decoration-none gray"><i
                                            class="fa-solid fa-angles-right"></i></a>
                                @endif
                            </div>
                        </div>
                    @endunless
                </div>
            </div>
        </div>

    </div>
    <x-general.loading
        wire:target="selectAll,buyLeads, loadFilteredData, applyFilters, applyGroupBy, remove_filter, remove_group, previousPage, gotoPage, nextPage"
        message="Processing..."/>

    @push(AppConst::PUSH_JS)
        <script>
            Livewire.on('goToTop', () => {
                window.scrollTo({
                    top: 350,
                    left: 15,
                    behaviour: 'smooth'
                })
            });

            /*Multilevel Dropdown*/
            (function ($bs) {
                const CLASS_NAME = 'has-child-dropdown-show';
                $bs.Dropdown.prototype.toggle = function (_orginal) {
                    return function () {
                        document.querySelectorAll('.' + CLASS_NAME).forEach(function (e) {
                            e.classList.remove(CLASS_NAME);
                        });
                        let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
                        for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) {
                            dd.classList.add(CLASS_NAME);
                        }
                        return _orginal.call(this);
                    }
                }($bs.Dropdown.prototype.toggle);

                document.querySelectorAll('.dropdown').forEach(function (dd) {
                    dd.addEventListener('hide.bs.dropdown', function (e) {
                        if (this.classList.contains(CLASS_NAME)) {
                            this.classList.remove(CLASS_NAME);
                            e.preventDefault();
                        }
                        e.stopPropagation(); // do not need pop in multi level mode
                    });
                });

                // for hover
                document.querySelectorAll('.dropdown-hover, .dropdown-hover-all .dropdown').forEach(function (dd) {
                    dd.addEventListener('mouseenter', function (e) {
                        let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
                        if (!toggle.classList.contains('show')) {
                            $bs.Dropdown.getOrCreateInstance(toggle).toggle();
                            dd.classList.add(CLASS_NAME);
                            $bs.Dropdown.clearMenus();
                        }
                    });
                    dd.addEventListener('mouseleave', function (e) {
                        let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
                        if (toggle.classList.contains('show')) {
                            $bs.Dropdown.getOrCreateInstance(toggle).toggle();
                        }
                    });
                });
            })(bootstrap);
            /*End Multilevel Dropdown*/
        </script>
    @endpush
</div>
