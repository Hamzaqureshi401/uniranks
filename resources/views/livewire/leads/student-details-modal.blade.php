<div>
    @php
        /**
        * @var \App\Models\User $student;
        * @var \App\Models\User\UserBio $userBio;
        **/
        $userBio = $student?->userBio;
    @endphp
    <x-jet-modal wire:model="isStudentDetailsModelOpen" size="lg">
        <x-slot name="title">
            <div class="row align-items-center blue h6 mb-0">
                <div class="col-md-1 blue">
                    <div>@lang('SID')</div>
                    <div class="mt-2">{{$student?->id}}</div>
                </div>
                <div class="col-md-2 blue">
                    <div>{{$userBio?->city?->city_name}}</div>
                    <div class="mt-2">{{$userBio?->country?->country_name}}</div>
                </div>
                <div class="col-md-1 me-2">
                    <img src="{{ $student?->profile_photo_url }}" class="navbar-user-avatar"
                         alt="{{ $student?->name }}" style="width: 45px;height: 45px;">
                </div>
                <div class="col me-2 mt-2 mt-md-0">
                    <div class="">{{$student?->name}} | {{$userBio?->studyLevel?->title}}</div>
                    <div class="mt-2">@lang('has selected')
                        {{$student?->preferred_universities_count}} @lang('Universities'),
                        {{$student?->majors_count}} @lang('Majors'),
                        {{$student?->study_destinations_count}} @lang('Destinations') @lang('and')
                        {{$student?->hobbies_count}} @lang('Hobby')
                    </div>
                </div>
            </div>
        </x-slot>
        @if($student?->preferred_universities_count)
            <div class="row">
                <div class="col-12">
                    <div class="h5 mb-0 blue">@lang('Selected Universities')</div>
                </div>
            </div>
            <div class="row mt-2">
                @foreach($student?->preferredUniversities ?? [] as $university )
                    <div class="col-6 d-flex align-items-center mt-3">
                        <img src="{{$university?->logo_url}}" style="width: 60px; height: 60px;">
                        <div class="ms-2">
                            <div
                                class="blue ms-1">{{$university?->translated_name}}</div>
                            <div class="mt-2">
                                <div class="d-flex align-items-center">
                                    <img src="{{AppConst::ICONS.'/ur-icon-stars.png'}}" alt="UR logo"
                                         style="width:18px">
                                    <div class="primary-text">
                                        <p class="small5 mb-0">
                                            @lang('World Rank')# {{$university->rankingPositions?->world_rank ?? "N/A"}}
                                            @lang('Local Rank')
                                            # {{$university->rankingPositions?->country_rank ?? "N/A"}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-3">
                <hr>
            </div>
        @endif
        @if($student?->majors_count)
            <div class="row">
                <div class="col-12">
                    <div class="h5 mb-0 blue">@lang('Selected Majors')</div>
                </div>
            </div>
            <div class="row mt-2">
                @foreach($student?->majors ?? [] as $major )
                    <div class="col-4">
                        <div class="ms-2">
                            <div class="blue">{{$major?->title}}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="my-3">
                <hr>
            </div>
        @endif
        @if($student?->study_destinations_count)
            <div class="row">
                <div class="col-12">
                    <div class="h5 mb-0 blue">@lang('Selected Destinations')</div>
                </div>
            </div>
            <div class="row mt-md-2">
                @foreach($student?->studyDestinations ?? [] as $country )
                    <div class="col-4">
                        <div class="ms-2">
                            <div class="blue"><img src="{{$country->flag_url}}"> {{$country?->country_name}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-2">
                <hr>
            </div>
        @endif
        @if($student?->hobbies_count > 0)
            <div class="row">
                <div class="col-12">
                    <div class="h5 mb-0 blue">@lang('Selected Hobbies')</div>
                </div>
            </div>
            <div class="row mt-md-2">
                @foreach($student?->hobbies ?? [] as $hobby )
                    <div class="col-4">
                        <div class="ms-2">
                            <div class="blue">{{$hobby?->name}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </x-jet-modal>
</div>
