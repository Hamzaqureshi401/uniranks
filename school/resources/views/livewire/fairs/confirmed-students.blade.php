<div>
    @php
        /**
        * @var  \App\Models\Fairs\Fair $fair
        **/
    @endphp
    <div x-data="{ showFilters: false }" class="w-100">
        <div class="row">
            <div class="col-12 d-flex justify-content-between blue">
                <div class="h5 blue">{{ __('Students that attended') }} :  {{ $fair->fair_name ?? $fair->school?->school_name }} {{$fair->eventType?->name}}</div>
                <i class="d-md-none fas fa-filter pointer blue" @click="showFilters = !showFilters"></i>
            </div>
        </div>
        <div class="row align-items-center my-3 small5 d-md-flex" :class="showFilters ? '' : 'd-none'">
            <div class="col-12 col-md-3">
                <select wire:model="major_id" name="major_id" wire:change="loadStudents" class="input-field form-control me-2" aria-label="">
                    <option value=""> {{ __('All Majors') }}</option>
                    @foreach ($majors as $major)
                        <option value="{{ $major->id }}">{{ $major?->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <div class="col-12 col-md-3">
                <select wire:model="university_id" name="university_id" wire:change="loadStudents" class="input-field form-control me-2" aria-label="">
                    <option value=""> {{ __('All Universities') }}</option>
                    @foreach ($universities as $university)
                        <option value="{{ $university->id }}">{{$university->university_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <div class="col-12 col-md-3">
                <select wire:model="destination_id" name="destination_id" wire:change="loadStudents" class="input-field form-control me-2" aria-label="">
                    <option value=""> {{ __('All Destinations') }}</option>
                    @foreach ($destinations as $destination)
                        <option value="{{ $destination->id }}">{{ !empty($destination?->translated_name) ? $destination?->translated_name : $destination->country_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 mobile-hidden"></div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <!--to force new line-->
            <div class="col-12 d-flex col-md-5">
            </div>
        </div>
        <div class="row">
            <div class="col-12" >
                @php
                    /**
                    * @var \App\Models\User $student;
                    **/
                @endphp
                @forelse($students as $student)
                    @php
                        $userBio = $student?->userBio;
                    @endphp
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="d-md-flex blue h6 mb-0">
                                <div class="col-md-1 blue">
                                    <div class="h5 mb-0">{{$student->id}}</div>
                                    <div>@lang('SID')</div>
                                    <div>{{ $loop->iteration + ($students->currentPage() - 1) * $students->perPage() }}</div>
                                </div>
                                <div class="col-md-1 me-2 mt-2 mt-md-0">
                                    <img src="{{ $student->profile_photo_url }}" alt="{{ $student->name }}" style="width: 60px; height: 60px" class="rounded-circle">
                                </div>
                                <div class="col me-2 mt-2 mt-md-0">
                                    <a href="javascript:void(0)" class="blue" @click="$wire.emit('showStudentDetails','{{$student->id}}')">{{$student->name}}</a>
                                    <div class="mt-2">@lang('From'): {{$userBio?->country?->country_name ?? 'N/A'}}</div>
                                    <div class="mt-2">@lang('Nationality'): {{$userBio?->nationality?->code ?? 'N/A'}}</div>
                                </div>
                                <div class="col me-2 mt-2 mt-md-0">
                                    <div>@lang('Curriculum'): {{$userBio?->curriculum?->title ?? 'N/A'}}</div>
                                    <div class="mt-2">@lang('Grade'): {{$userBio?->studyLevel?->title ?? "N/A"}}</div>
                                    <div class="mt-2">@lang('School Fees'): {{$userBio?->feeRange?->currency_range ?? "N/A"}}</div>
                                </div>
                                <div class="col me-2 mt-2 mt-md-0" >
                                    <div>@lang('Study Destination'): <a @click="$wire.emit('showStudentDetails','{{$student->id}}')" href="javascript:void(0)" class="light-blue">{{$student->study_destinations_count ?? "N/A"}}</a> </div>
                                    <div class="mt-2">@lang('Majors'): <a @click="$wire.emit('showStudentDetails','{{$student->id}}')"  href="javascript:void(0)" class="light-blue"> {{$student->majors_count ?? 'N/A'}} </a></div>
                                    <div class="mt-2">@lang('Universities'):
                                        <a @click="$wire.emit('showStudentDetails','{{$student->id}}')" href="javascript:void(0)" class="light-blue"> {{$student->preferred_universities_count ?? 'N/A'}} </a>
                                    </div>
                                    <div class="mt-2">@lang('Hobby'): <a @click="$wire.emit('showStudentDetails','{{$student->id}}')" href="javascript:void(0)" class="light-blue"> {{$student->hobbies_count ?? 'N/A'}} </a></div>
                                </div>
                                <div class="col-md-2 me-2 mt-2 mt-md-0">
                                    <div>@lang('Profile')</div>
                                    <div class="mt-2">@lang(studentProfileCompleted($student) ? 'Completed' : 'Not Completed')</div>
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
            </div>
        </div>

    </div>
    <div>
        <p></p>
    </div>
    <div class="mt-4 mobile-pagination">
        {!! $students->links() !!}
    </div>
    <x-general.loading message="Loading" />
</div>
