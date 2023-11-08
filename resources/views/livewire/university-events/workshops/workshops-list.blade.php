<div class="col-lg-12 col-sm-12">
    <div class="card">
        <div id="event_lead">
            <div class="card-body">
                <div x-data="{ showFilters:false }" class="w-100">
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row mb-3">
                        <i class="d-md-none fas fa-filter pointer blue blue text-end" @click="showFilters = !showFilters" aria-hidden="true"></i>
                        <div class="col-12 d-md-flex justify-content-between blue align-items-center">
                            <div class="col-12 col-md-6 ">
                                <span class="blue h5">@lang('List of Workshop')</span>
                                <span class="gray mx-2 h5">|</span>
                                <div class="w-100 d-block d-md-none my-1"></div><!--to force new line-->
                                <a href="{{ route('admin.events.workshops.create') }}" class="light-blue h5">@lang('Create a New Workshop')</a>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="w-100 d-block d-md-none my-1"></div><!--to force new line-->
                                <div class="row align-items-center d-md-flex small5 justify-content-end d-none" :class="showFilters ? '':'d-none' ">

                                    <div class="col-12 col-md-5 mobile-marg">
                                        <x-elements.date-range-picker wire:model="dateRange" wire:change='loadWorkshops'
                                                                      placeholder="@lang("Select Period")" />
                                    </div>
                                    <div class="w-100 d-block d-md-none my-1"></div><!--to force new line-->
                                    <div class="col-12 col-md-5">
                                        <select wire:model="status" class="input-field  form-control" aria-label="">
                                            <option value="">@lang('All Status')</option>
                                            <option value="0">@lang('Pending')</option>
                                            <option value="1">@lang('Approved')</option>
                                            <option value="2">@lang('Rejected')</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table" wire:target="loadWorkshops">
                            <thead>
                            <td style="width: 10px">@lang('FId')</td>
                            <td style="width: 10px">@lang('Event Name')</td>
                            <td style="width: 10px">@lang('Date')<i class="fa-solid fa-sort ms-2"></i></td>
                            <td style="width: 10px">@lang('Tution Fee')</td>
                            <td style="width: 10px">@lang('Event Type')</td>
                            <td style="width: 10px">@lang('Curriculum')</td>
                            <td style="width: 10px">@lang('Max Students')</td>
                            <td style="width: 10px">@lang('Major')</td>
                            <td style="width: 10px">@lang('Program')</td>
                            <td style="width: 10px">@lang('Action')</td>
                            </thead>
                            <tbody class="align-center">
                            @forelse($workshops as $workshop)
                                <tr>
                                    <td>{{ $workshop->id }}</td>
                                    <td>{{ $workshop?->title ?? 'N/A' }}</td>
                                    <td>{{ $workshop?->start_datetime ?? 'N/A' }}</td>
                                    <td>{{ $workshop->feeRange?->range ?? 'N/A' }}</td>
                                    <td>{{ $workshop->type?->title ?? 'N/A'}}</td>
                                    <td>{{ $workshop->curriculums?->first()->title ?? 'N/A'}}</td>
                                    <td>{{ $workshop?->max_students ?? 'N/A' }}</td>
                                    <td>{{ $workshop->majors?->first()->title ?? 'N/A' }}</td>
                                    <td>{{ $workshop->majors?->first()->title ?? 'N/A' }}</td>
                                    <td>
                                        @if($workshop->status == \AppConst::EVENT_DELETED || $workshop->status == \AppConst::EVENT_REQUSTED_RESTORE)
                                            <a wire:click="toRestore({{$workshop->id}})" href="#" class="green h6"><i class="fa-solid fa-trash-arrow-up"></i></a>
                                        @elseif($workshop->status == \AppConst::EVENT_REQUESTED_DELETE)
                                            <a wire:click="toDelete({{$workshop->id}})" href="#" class="red h6"><i class="fa-solid fa-trash"></i></a>
                                        @endif
                                        <a href="{{ route('admin.events.workshops.edit', $workshop->id) }}" class="blue h6"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                        <a href="{{ route('admin.events.workshops.view', $workshop->id) }}" class="blue h6"><i class="fas fa-eye" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">
                                        <h6 class="text-center mt-4 no-records">
                                            @lang('No Record Found!')
                                        </h6>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    @unless(empty($workshops))
                        <div class="row justify-content-between">
                            <div class="col-3 h6 mt-2 align-items-center">
                                <p class="paragraph-style2 blue">{{$workshops->total()}} @lang('results found')</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-center mobile-pagination">
                                    <p class="paragraph-style2 blue">{{ $workshops->links() }}</p>
                                </div>
                            </div>
                        </div>
                    @endunless
                </div>
            </div>
        </div>
    </div>
</div>
