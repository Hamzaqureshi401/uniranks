<div x-data="{ showFilters:false }">
    @php
    /**
    * @var \App\Models\General\Countries $destination
    * @var  \App\Models\General\Major $major
    * @var \App\Models\Institutes\University $university
    * @var \App\Models\General\FeeRange $range
    **/
    @endphp
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div class="h4 blue">@lang('School Students List')</div>
            <a href="javascript:void(0)"  onclick="printQrAll()" class="d-none d-md-block blue a-underline d-block text-decoration-none">
                 @lang('Print all QR Code') <i class="fas fa-print"></i>
            </a>
            <i class="d-md-none fas fa-filter pointer blue blue" @click="showFilters = !showFilters"></i>
        </div>
    </div>
    <div class="row my-3 align-items-center d-md-flex" x-cloak :class="showFilters ? '':'d-none'">
        <div class="col-md">
            <select wire:model="search_destination" name="search_destination"
                    class="text-start form-control input-field" aria-label="" wire:change="loadStudents">
                <option value="">@lang('Select Destination choice')</option>
                @foreach($select_destination as $destination)
                    <option value="{{ $destination->id }}">{{ $destination->country_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md mobile-marg">
            <select wire:model="search_major" name="search_major" class="text-start form-control input-field"
                    aria-label="" wire:change="loadStudents">
                <option value="">@lang('Select Major choice')</option>
                @foreach($select_major as $major)
                    <option value="{{ $major->id }}">{{ $major->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md mobile-marg">
            <select wire:model="search_university" name="search_university" class="text-start form-control input-field"
                    aria-label="" wire:change="loadStudents">
                <option value="">@lang('Select University choice')</option>
                @foreach($select_university as $university)
                    <option value="{{ $university->id }}">{{ $university->university_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md mobile-marg">
            <select wire:model="search_budget" name="budget_id" class="text-start form-control input-field" aria-label=""
                    wire:change="loadStudents">
                <option value="">@lang('Student Budget')</option>
                @foreach($fee_ranges as $range)
                    <option value="{{ $range->id }}">{{ $range->currency_range }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md mobile-marg">
            <a href="{{route('admin.school.students.add')}}"
               class="button-sm button-blue d-block text-decoration-none">@lang('Register Student')</a>
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
                                <div>{{ $loop->iteration + ($students->currentPage() - 1) * 10 }}</div>
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
                                <div class="mt-2">@lang('Student Budget'): {{$userBio?->feeRange?->currency_range ?? "N/A"}}</div>
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
                            <div class="col-md-1 text-end">
                                <i class="fa-solid fa-qrcode fa-2xl" role="button" onclick="printQr('{{$student->id}}')"></i>{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" value="{{ $student->id }}" type="checkbox" wire:model="selectedStudents">--}}
{{--                                </div>--}}
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
    <div class="row justify-content-md-between" style="margin-top: 20px">
        <div class="col-md-3 h6 mt-2 align-items-center" style="padding-left: 30px">
            <p class="paragraph-style2 blue">{{$students->total()}} @lang('results found')</p>
        </div>
{{--        <div class="col-md-6 d-flex  align-items-center justify-content-between justify-content-md-end">--}}
{{--            <label--}}
{{--                class="primary-text">{{ __('you have selected') }} {{ $selectedStudent_count }} {{ __('students') }}--}}
{{--            </label>--}}
{{--            @if($selectedStudent_count > 0)--}}
{{--            <button wire:click="sendRegistrationLink"--}}
{{--                    class="button-sm button-dark-blue">{{ __('Send Registration Link!') }}</button>--}}
{{--            @endif--}}
{{--        </div>--}}
    </div>
    <div class="row" style="margin-top: 10px">
        <div class="col-12">
            <div class="mobile-pagination">
                <p class="paragraph-style2 blue">{{ $students->links() }}</p>
            </div>
        </div>
    </div>
    <x-general.loading message="Loading" wire:target="gotoPage, loadStudents, previousPage, nextPage, sendRegistrationLink" />
    @push(AppConst::PUSH_JS)
        <script>
            function printQr(student) {
                let url = `{{route('admin.school.students.printQr')}}?student_id=${student}`;
                window.open(url,'_blank','height=650, width=650')
            }
            function printQrAll() {
                let params = (new URL(document.location)).searchParams;
                let url = `{{route('admin.school.students.printQrAll')}}?${params}`;
                window.open(url,'_blank','height=650, width=650')
            }
        </script>
    @endpush
</div>
