@php
    /** @var \App\Models\University\UniversityEvent $event*/
@endphp
<div class="col-lg-12 ">
    <div class="w-100 d-flex justify-content-between">
        <div class="col-lg-8 d-flex">
            <p class="h5 blue mb-3">{{ $event->title }}</p>
            <p class="h5 gray mb-3 px-2">|</p>
            <p class="h5  mb-3"><a class="light-blue text-decoration-none" href="#"></a>{{ $event->start_datetime }}</p>
        </div>
        <div class="col-lg-3"></div>
        <div class="col-lg-1 d-flex justify-content-end">
            @if($event->status == \AppConst::EVENT_DELETED || $event->status == \AppConst::EVENT_REQUSTED_RESTORE)
                <a style="margin-top: 5px" class="me-2 green h6"  wire:click="toRestore({{$event}})" href="#"><i class="fa-solid fa-trash-arrow-up"></i></a>
            @elseif($event->status == \AppConst::EVENT_REQUESTED_DELETE)
                <a style="margin-top: 5px" class="me-2 red h6"  wire:click="toDelete({{$event}})" href="#"><i class="fa-solid fa-trash"></i></a>
            @endif
            <a href="{{ route('admin.events.openDays.edit', $event) }}"><i class="fa-solid fa-pen-to-square ic_style1"></i></a>
        </div>
    </div>
    <div class="card">
        <div id="event_lead" class="tabcontent">
            <div class="card-body">
                @if (session('status'))
                    <div class="mb-4 font-medium alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="d-md-flex justify-content-between">
                    <div class="col-md-9 col-12 pe-4">
                        <div class="h5 light-blue">@lang('Description')</div>
                        <p class="paragraph-style2 blue">{{ $event->description }}</p>
                    </div>
                    <div class="col-12 col-md-3 border-left3">
                        <div class="padding-left-4" style="margin-left: 20px">
                            <div>
                                <div class="small6 light-blue">@lang('Tution Fee: ')<span class="blue">{{ $event->feeRange?->currency_range ?? 'N/A' }}</span></div>
                            </div>
                            <div>
                                <div class="small6 light-blue">@lang('Event Type: ')<span class="blue">{{ $event->type?->title ?? 'N/A' }}</span></div>
                            </div>
                            <div>
                                <div class="small6 light-blue">@lang('Curriculum: ')<span class="blue">{{ implode(", ", $event->curriculums->pluck('title')->all()) }}</span></div>
                            </div>
                            <div>
                                <div class="small6 light-blue">@lang('Max Students: ')<span class="blue">{{ $event->max_students }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100  mt-4">
        <div class="col-12 h5 blue">@lang('Registration')</div>

    </div>
    <div class="d-md-flex mb-4">
        <div class="col" style="padding-right: 10px">
            <select class="h-100 form-select input-field" aria-label="" wire:model="selected_school" wire:change="loadStudents">
                <option value="">@lang('Select School')</option>
                @foreach($all_schools as $school)
                    <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col col-marg" style="padding-right: 10px">
            <select class="h-100 form-select input-field" aria-label="" wire:model="selected_major" wire:change="loadStudents">
                <option value="">@lang('Select Programs Choice')</option>
                @foreach($all_majors as $major)
                    <option value="{{ $major->id }}">{{ $major->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col col-marg" style="padding-right: 10px">
            <select class="h-100 form-select input-field" aria-label="" wire:model="selected_country" wire:change="loadStudents">
                <option value="">@lang('Select Location')</option>
                @foreach($all_countries as $country)
                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col col-marg" style="padding-right: 10px">
            <select class="h-100 form-select input-field" aria-label="" wire:model="selected_feeRange" wire:change="loadStudents">
                <option value="">@lang('Select Budget')</option>
                @foreach($all_feeRanges as $feeRange)
                    <option value="{{ $feeRange->id }}">{{ $feeRange->currency_range }}</option>
                @endforeach
            </select>
        </div>
        <div class="col mt-1 d-flex justify-content-end">
            <a style="text-decoration:none" href="javascript:void(0);"><span class="api-blue">@lang('API')</span><span class="small-text2">@lang('Push')</span></a>
            <a style="text-decoration:none" href="javascript:void(0);"><i class="fa-solid fa-file-excel ic_style1"></i><span class="small-text">@lang('Export')</span></a>
        </div>
    </div>
    <div class="card mt-3">
        <div id="event_lead" class="tabcontent">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <td>#</td>
                        <td>@lang('SID')</td>
                        <td>@lang('Photo')</td>
                        <td>@lang('Name')</td>
                        <td>@lang('Source')</td>
                        <td>@lang('Country')</td>
                        <td>@lang('Curriculum')</td>
                        <td>@lang('Student Budget')</td>
                        <td>@lang('Study destination')</td>
                        <td>@lang('Programs')</td>
                        <td>@lang('Attending')</td>
                        </thead>
                        <tbody class="text-blue align-center">
                        @php
                        /**
                        * @var \App\Models\User $student
                        **/
                        @endphp
                        @forelse($students as $student)
                            <tr>
                                <td style="width: 30px">{{ $loop->iteration + ($students->currentPage() - 1) * 10 }}</td>
                                <td style="width: 30px">{{ $student->id }}</td>
                                <td style="width: 30px"><img src="{{ $student->profile_photo_url }}" class="navbar-user-avatar" alt="{{ $student->name }}"></td>
                                <td style="width: 50px">{{ $student->name }}</td>
                                <td style="width: 50px"><img src="{{ $student->school?->logo_url ?? '' }}" alt="{{$student->school?->school_name}}" width="30px"></td>
                                <td style="width: 30px">{{ $student->userBio?->country->country_name ?? 'N/A' }}</td>
                                <td style="width: 10px">{{ $student->userBio?->curriculum_id ?? 'N/A' }}</td>
                                <td style="width: 30px">{{ $student->userBio?->fee_range ?? 'N/A' }}</td>
                                <td style="width: 130px">{{ $student->studyDestinations?->first()->country_name ?? 'N/A'}}</td>
                                <td style="width: 130px">{{ $student->majors?->first()->title ?? 'N/A'}}</td>
                                <td style="width: 130px">@lang('In Person')</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">
                                    <h6 class="text-center mt-4 no-records">
                                        @lang('No Record Found!')
                                    </h6>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                @unless(empty($students))
                    <div class="row justify-content-between" style="margin-top: 20px">
                        <div class="col-3 h6 mt-2 align-items-center" style="padding-left: 30px">
                            <p class="paragraph-style2 blue">{{$students->total()}} @lang('results found')</p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-12">
                            <div class="d-flex justify-content-center mobile-pagination">
                                <p class="paragraph-style2 blue">{{ $students->links() }}</p>
                            </div>
                        </div>
                    </div>
                @endunless
                <div class="d-md-flex justify-content-end">
                    <div><button class="bottom-button1"><span class="api-white">@lang('API')</span>@lang(' Push')</button></div>
                    <div><button class="bottom-button2"><span><i class="fa-solid fa-file-excel"></i></span>@lang(' Export')</button></div>
                    <div><button class="bottom-button3"><i class="fa-solid fa-arrow-right-to-bracket"></i>@lang(' My Students')</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
