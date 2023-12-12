<x-base-layout>
    <x-shared.general.breadcrumb-bar>
        <h4 class="ps-4 mb-0">@lang('Select School')</h4>
    </x-shared.general.breadcrumb-bar>
    <x-general.authentication-card>
        @php
        /**
        * @var \App\Models\User $user
        * @var \Illuminate\Database\Eloquent\Collection<\App\Models\Institutes\School> $user_schools
        **/
        @endphp
        @push(AppConst::PUSH_CSS)
            <style>
                .select-school-card:hover{
                    background: #E6E2E263;
                    color: var(--secondary) !important;
                }
            </style>
        @endpush
        <div class="d-flex flex-column justify-content-end mt-3 h-100">
            <x-general.status-alert/>
            <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
            <div id="auth_form_login_tab">
                <div class="d-flex flex-column justify-content-end h-100">
                    <div class="">
                        <h6 class="gray">@lang('Welcome') {{$user->userBio?->first_name}}</h6>
                        <h4 class="mb-0 primary-text">@lang('Select which school you want to login')</h4>
                    </div>
                    <x-general.status-alert/>
                    <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @forelse($user_schools as $school)
                            <div class="row mt-2">
                                <div class="col-12">
                                    <a href="{{route('admin.setSchool',$school->id)}}"
                                       class="card text-decoration-none primary-text select-school-card" style="box-shadow: none">
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label>{{$school->school_name}}</label>
                                                <i class="light-blue fas fa-angle-right"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card text-decoration-none primary-text" style="box-shadow: none">
                                        <div class="card-body">
                                            <div class="d-flex justify-contnet-center align-items-center">
                                                <label class="red">@lang('Your account attachment with the schools is not approved yet!')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </form>
                    <div class="d-flex justify-content-end mt-4">
                        <label>
                            @lang('Wrong Account?')
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit"
                                        style="background: none; border: none; text-decoration: underline;"
                                        class="secondary-text">
                                    {{ __('Logout') }}
                                </button>
                            </form>
                        </label>
                    </div>
                </div>
            </div>
    </x-general.authentication-card>
</x-base-layout>
