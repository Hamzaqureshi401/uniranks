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
                                <span class="blue h5">@lang('Student for a Day list')</span>
                                <span class="gray mx-2 h5">|</span>
                                <div class="w-100 d-block d-md-none my-1"></div><!--to force new line-->
                                <a href="{{ route('admin.events.studentForADays.create') }}" class="light-blue h5">@lang('Create Student for a day')</a>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="w-100 d-block d-md-none my-1"></div><!--to force new line-->
                                <div class="row align-items-center d-md-flex small5 justify-content-end d-none" :class="showFilters ? '':'d-none' ">

                                    <div class="col-12 col-md-5 mobile-marg">
                                        <x-elements.date-range-picker wire:model="dateRange" wire:change='loadEvents'
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
                        <table class="table" wire:target="loadEvents">
                            <thead>
                            <td>@lang('FId')</td>
                            <td>@lang('Event Name')</td>
                            <td>@lang('Date')<i class="fa-solid fa-sort ms-2"></i></td>
                            <td>@lang('Tution Fee')</td>
                            <td>@lang('Event Type')</td>
                            <td>@lang('Curriculum')</td>
                            <td>@lang('Max Students')</td>
                            <td>@lang('Description')</td>
                            <td>@lang('Status')</td>
                            <td>@lang('Action')</td>
                            </thead>
                            <tbody class="align-center">
                            @forelse($openDays as $openDay)
                                <tr>
                                    <td style="width: 5%">{{ $openDay->id }}</td>
                                    <td style="width: 10%">{{ $openDay?->title ?? 'N/A' }}</td>
                                    <td style="width: 10%">{{ $openDay?->start_datetime ?? 'N/A' }}</td>
                                    <td style="width: 10%">{{ $openDay->feeRange?->range ?? 'N/A' }}</td>
                                    <td style="width: 5%">{{ $openDay->type?->title ?? 'N/A'}}</td>
                                    <td style="width: 10%">{{ $openDay->curriculums?->first()->title ?? 'N/A'}}</td>
                                    <td style="width: 5%">{{ $openDay?->max_students ?? 'N/A' }}</td>
                                    <td style="width: 30%">{{ Str::limit($openDay?->description, 100) ?? 'N/A' }}</td>
                                    @if($openDay->status == \AppConst::APPROVED)
                                        <td style="width: 5%">@lang('Approved')</td>
                                    @elseif($openDay->status == \AppConst::REJECTED)
                                        <td style="width: 5%">@lang('Rejected')</td>
                                    @else
                                        <td style="width: 5%">@lang('Pending')</td>
                                    @endif
                                    <td style="width: 10%">
                                        @if($openDay->status == \AppConst::EVENT_DELETED || $openDay->status == \AppConst::EVENT_REQUSTED_RESTORE)
                                            <a wire:click="toRestore({{$openDay->id}})" href="#" class="green h6"><i class="fa-solid fa-trash-arrow-up"></i></a>
                                        @elseif($openDay->status == \AppConst::EVENT_REQUESTED_DELETE)
                                            <a wire:click="toDelete({{$openDay->id}})" href="#" class="red h6"><i class="fa-solid fa-trash"></i></a>
                                        @endif
                                        <a href="{{ route('admin.events.studentForADays.edit', $openDay->id) }}" class="blue h6"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                        <a href="{{ route('admin.events.studentForADays.view', $openDay->id) }}" class="blue h6"><i class="fas fa-eye" aria-hidden="true"></i></a>
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
                    @unless(empty($openDays))
                        <div class="row justify-content-between">
                            <div class="col-3 h6 mt-2 align-items-center">
                                <p class="paragraph-style2 blue">{{$openDays->total()}} @lang('results found')</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-center mobile-pagination">
                                    <p class="paragraph-style2 blue">{{ $openDays->links() }}</p>
                                </div>
                            </div>
                        </div>
                    @endunless
                </div>
            </div>
        </div>
    </div>
</div>
