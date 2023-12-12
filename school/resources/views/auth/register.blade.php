<x-base-layout>
    <x-shared.general.breadcrumb-bar>
        <h4 class="ps-4 mb-0">@lang('School Registration')</h4>
    </x-shared.general.breadcrumb-bar>
    <x-general.authentication-card>
        <x-general.auth-button-group/>
        <div class="d-flex flex-column justify-content-end mt-3 h-100">
            <div id="auth_form_login_tab">
                <h4 class="primary-text">@lang('Signup')</h4>
                <p class="mb-4 primary-text">
                    @lang('Select the country first and then school, enter email and password or')
                    <span><a href="{{ route('login') }}" class="secondary-text">@lang('Sign In')</a></span> @lang('to get started.')
                </p>
                <form method="POST"  id="school-registartion-from" action="{{ route('register') }}">
                    @csrf
                    @php
                        $user_country =  session('country_info')['id'] ?? null;
                    @endphp
                    <livewire:auth.school-registartion-form
                        email="{{old('email')}}"
                        country_id="{{old('country_id',$user_country)}}"
                        state_id="{{old('state_id')}}"
                        city_id="{{old('city_id')}}"
                        school_type_id="{{old('school_type_id')}}"
                        national_id="{{old('national_id')}}"
                    />
                    <button onclick="checkFrom()"  class="btn btn-block btn-secondary" id="submit_data" type="submit">{{__("Submit")}}</button>
                </form>
                <p class="mt-2 paragraph primary-text">@lang('By signing up I agree to share my data and according to')
                    <a class="secondary-text" href="">@lang('User agreement,') </a>
                    <a href="" class="secondary-text">@lang('Cookie policy') </a>
                    @lang('and') <a href="" class="secondary-text">@lang('Privacy policy')</a>
                </p>
                <div class="w-100 d-flex justify-content-end mt-4">
                    @lang('Already have an account?')
                    <a class="auth_helper secondary-text ms-1" href="{{ route('login') }}"> {{__("login")}}</a>
                </div>
            </div>
        </div>
    </x-general.authentication-card>
    @push(AppConst::PUSH_JS)
        <script>
            function checkFrom(){
                console.info('Validating...')
                event.preventDefault();
                event.stopPropagation();
                checkValidity();
                if(isValid()){
                    $('#school-registartion-from').submit();
                }else{
                    console.info('Error, please check the form...')
                }

            }
            function isValid() {
                let invalidInputs = $(`#school-registartion-from`).find('.is-invalid');
                return !invalidInputs.length;
            }

            function checkValidity() {
                let inputs = $(`#school-registartion-from`).find('.required');
                inputs.each((index, el) => {
                    if (!el.value) {
                        if(el.id == "school_id" && $('#institute_id').val()){
                            console.info('School Selcted');
                        }else {
                            el.classList.add("is-invalid")
                        }
                    }
                })
            }
        </script>
    @endpush
</x-base-layout>
