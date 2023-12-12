<div>
    @php
        /**
        * @var \App\Models\General\Countries[] $countries
        * @var \App\Models\General\CountryDirectorate[] $directorates
        * @var \App\Models\General\CountryDirectorateRegion[] $regions
        * @var \App\Models\General\CountryState[] $states
        * @var \App\Models\General\CountryStateZone[] $zones
        * @var \App\Models\General\Cities[] $cities
        * @var \App\Models\School\SchoolType [] $school_types
        * @var \App\Models\Institutes\School $selected_school
        */
    @endphp
    <x-jet-validation-errors class="mb-4 alert alert-danger"/>

    <x-general.loading message="Loading..."
                       wire:target="cityChanged, typeChanged, stateChanged, countryChanged,loadSchool, loadSchoolByNationalId"/>

    <div class="form-row" x-data="{hide_select_2:@js(!empty($selected_school)),show_nid_warning:false}"
         x-on:show-select2.window="()=>{hide_select_2=false;show_nid_warning=true}"
         x-on:reset-select2.window="resetSelect2()"
         x-on:hide-select2.window="()=>{hide_select_2=true;show_nid_warning=false}"
    >
        <div class="col">
            <select id="country_id" wire:model="country_id" name="country_id"
                    @class(['form-control input-field required', 'is-invalid has-error'=>$errors->has('country_id')]) wire:change="countryChanged">
                <option selected value="">@lang('Pick a Country')</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">
                        {{ $country->translated_name ?: $country->country_name  }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback ">
                @error('country_id')
                {{ $message }}
                @enderror
                @if(!$errors->has('country_id'))
                    @lang('Please select a country')
                @endif
            </div>
        </div>
        @if(in_array($country_id,\AppConst::COUNTRY_REQUIRED_EXTRA_DATA))
            <div class="col">
                <select id="school_type_id" wire:model="school_type_id" name="school_type_id"
                        @class(['form-control mt-3 input-field required', 'is-invalid has-error'=>$errors->has('school_type_id')])
                        > {{--wire:change="typeChanged"--}}
                    <option selected value="">@lang('Private or Government')</option>
                    @foreach ($school_types as $school_type)
                        <option
                            value="{{ $school_type->id }}">{{ $school_type->translated_name ?: $school_type->title  }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback ">
                    @error('school_type_id')
                    {{ $message }}
                    @enderror
                    @if(!$errors->has('school_type_id'))
                        @lang('Please select school type')
                    @endif
                </div>
            </div>
        @endif
        @if(in_array($country_id,\AppConst::COUNTRY_REQUIRED_EXTRA_DATA))
            <div class="col">
                <select id="state_id" wire:model="state_id" name="state_id" wire:change="stateChanged"
                    @class(['form-control mt-3 input-field required', 'is-invalid has-error'=>$errors->has('state_id')])>
                    <option selected value="">@lang('State/Province')</option>
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{ $state->translated_name ?: $state->name  }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback ">
                    @error('state_id')
                    {{ $message }}
                    @enderror
                    @if(!$errors->has('state_id'))
                        @lang('Please select province')
                    @endif
                </div>
            </div>
        @endif
        @if(in_array($country_id,\AppConst::COUNTRY_REQUIRED_EXTRA_DATA))
            <div class="col">
                <select id="city_id" wire:model="city_id" name="city_id" wire:change="cityChanged"
                    @class(['form-control mt-3 input-field required', 'is-invalid has-error'=>$errors->has('city_id')]) >
                    <option selected value="">@lang('City')</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->translated_name ?: $city->city_name  }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback ">
                    @error('city_id')
                    {{ $message }}
                    @enderror
                    @if(!$errors->has('city_id'))
                        @lang('Please select city')
                    @endif
                </div>
            </div>
        @endif
        @if(in_array($country_id,\AppConst::COUNTRY_REQUIRED_EXTRA_DATA))
            <div class="col">
                <input type="text" id="national_id" name="national_id" wire:model.blur="national_id"
                       @class(['form-control mt-3 input-field', 'is-invalid has-error'=>$errors->has('national_id')])
                       placeholder="@lang('School National ID, License, or Registration Number (optional)')"
                       wire:change="loadSchoolByNationalId">
                <div class="invalid-feedback ">
                    @error('national_id')
                    {{ $message }}
                    @enderror
                    @if(!$errors->has('national_id'))
                        @lang("Please Enter School's National ID")
                    @endif
                </div>
                @if(!empty($national_id) && empty($school_id))
                    <div class="red mt-3">
                        @lang('We were unable to locate this school using the School ID. You can still search for the school name or generate a new entry associated with this School ID.')
                    </div>
                @endif
            </div>
        @endif
        @if(!empty($selected_school))
            <div class="col mt-3 ">
                <div class="form-group">
                    @php
                        $admin = $selected_school->schoolAdmins->first();
                        /* @var \App\Models\User $admin */
                    @endphp
                    <label class="form-control input-field">
                        {{$selected_school->translated_name ?: $selected_school->school_name  }}
                    </label>
                    @if(!empty($admin))
                        <div>
                            <p class="text-danger mt-1">{{__('This school is already claimed by')}} {{$admin?->name ?: $admin->userBio->first_name}} {{__('and')}} {{$admin->email}}
                                .<span>
                        <a href="https://schoolsmaster.com/" target="_blank" class="btn btn-primary btn-sm custom-btn"
                           style="background: #2c2f57 !important;">{{__('Report this school to reclaim the profile')}} </a></span>
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <div wire:ignore wire:key="ignored_date">
            <div class="col" x-show="!hide_select_2">
                <div class="form-group mt-3">
                    <select id="institute_id" class="" name="school_id_searched">
                    </select>
                    <div id="adminExist">
                    </div>
                </div>
            </div>
            <input type="hidden" name="school_id" id="school_id"
                   @class(['required', 'is-invalid has-error'=>$errors->has('school_id')]) wire:model="school_id">
            <div class="invalid-feedback">
                @error('school_id')
                {{ $message }}
                @enderror
                @if(!$errors->has('school_id'))
                    @lang('Please select a school')
                @endif
            </div>
        </div>
        <div class="col">
            <input wire:model.blur="email" id="email"
                   @class(['form-control mt-3  input-field required', 'is-invalid has-error'=>$errors->has('email')])
                   required name="email" type="email"
                   placeholder="@lang('Email')" value="{{old('email')}}"/>
            <div class="invalid-feedback ">
                @error('email')
                {{ $message }}
                @enderror
                @if(!$errors->has('email'))
                    @lang('Please enter email')
                @endif
            </div>
        </div>
        <livewire:auth.passwords/>
    </div>

    @push(AppConst::PUSH_JS)
        <script>

            addDatePicker();

            function resetSelect2() {
                $('#institute_id').val(null).trigger('change');
            }

            {{--            @if(!empty($national_id))--}}
            {{--            document.addEventListener("DOMContentLoaded", function () {--}}
            {{--                console.log("National Id: "+@js($national_id))--}}
            {{--            @this.loadSchoolByNationalId();--}}

            {{--            });--}}
            {{--            @endif--}}


            window.addEventListener('load-options', event => {
                console.log('load-options');
                let data = event.detail;
                if (!data.id) {
                    $('#institute_id').val(null).trigger('change');
                    $('#institute_id').trigger({
                        type: 'select2:select',
                    });
                    return;
                }
                var option = new Option(data.text, data.id, true, true);
                $('#institute_id').append(option);
                // manually trigger the `select2:select` event
                $('#institute_id').trigger({
                    type: 'select2:select',
                });
                $('#school_id').removeClass('is-invalid');
                $('#school_id').removeClass('has-error');
                if (data.admin_exits) {
                    addAdminExits(data.admin_data)
                } else {
                    enableSubmit();
                }

            })

            function disableSubmit() {
                $("#submit_data").attr("disabled", true)
                $("#submit_data").attr("title", 'Select school already claimed')
                $("#submit_data").addClass('disabled');
                $("#submit_data").removeClass('btn-secondary');
            }

            function enableSubmit() {
                $("#submit_data").removeAttr("disabled")
                $("#submit_data").removeAttr("title")
                $("#submit_data").removeClass('disabled');
                $("#submit_data").addClass('btn-secondary');
            }

            function addDatePicker() {
                console.log('add');
                $("#institute_id").select2({
                    ajax: {
                        url: `get-schools`,
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {

                            return {
                                _token: CSRF_TOKEN, // constant defined in layout/guest
                                search: params.term, // search term
                                country_id: $('#country_id').val(),
                                school_type_id: $('#school_type_id')?.val(),
                                state_id: $('#state_id')?.val(),
                                city_id: $('#city_id')?.val(),
                            };
                        },
                        processResults: function (response) {
                            return {
                                results: response
                            };
                        },
                        cache: true
                    },
                    templateResult: formatInstitute,
                    placeholder: "{{__('Select or Start typing to create the school')}}",
                    // allowClear: true,
                    tags: true,
                    width: '100%',
                    // minimumInputLength: 1,
                });
                // $("#institute_id").focus();
                $('#institute_id').one('select2:open', function (e) {
                    $('input.select2-search__field').prop('placeholder', '@lang('Start typing')...');
                });

                $("#institute_id").on('change', function () {
                    let school_id = $("#institute_id").val();
                    $('#adminExist').empty();
                    enableSubmit();
                    $('#school_id').removeClass('is-invalid');
                    $('#school_id').removeClass('has-error');
                    if (!school_id || isNaN(school_id)) {
                        return;
                    }
                @this.loadSchooData(school_id)
                    ;
                    $.get(`api/check-school` + `?q=${school_id}`, function (data) {
                        if (data.adminExist) {
                            addAdminExits(data)
                        } else {
                            $('#adminExist').empty();
                        }
                    });
                })

            }

            function addAdminExits(data) {
                var html = `<p class="text-danger mt-2">{{__('This school is already claimed by')}} ${data.name} {{__('and')}} ${data.email} .<span>
                        <a href="https://schoolsmaster.com/" target="_blank" class="btn btn-primary btn-sm custom-btn" style="background: #2c2f57 !important;" >{{__('Report this school to reclaim the profile')}} </a></span></p>`;
                $('#adminExist').empty();
                $("#adminExist").append(html);
                disableSubmit();

            }


            function formatInstitute(institute) {
                if (!institute.id) {
                    return institute.text;
                }
                var image = `${institute.image}`;
                if (institute.image == undefined) {
                    image = "{{ asset('assets/img/icons/school.png')}}"
                }

                var $company = $(`
                    <div class="row w-100">
                    <div class="col-sm-2">
                    <img class="img-thumbnail" src="${image}" alt="Card image"/>
                    </div>
                    <div class="col-sm-10">
                      <p class="mt-2">${institute.text}</p>
                     </div>
                    `);
                return $company;
            }


        </script>
    @endpush
</div>
