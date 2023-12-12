<div>
    <div class="row">
        <div class="col-12">
            <div class="h4 text-blue">@lang('School Basic Information')</div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-100" x-data="{
                    phone:@entangle('phone').defer,
                    dial_code:@entangle('dial_code').defer,
                    attachIntlPhone() {
                    const iti = window.intlTelInput($refs.phone, {
                    onlyCountries:@js($allowed_dial_codes),
                    separateDialCode: true,
                    initialCountry: this.dial_code,
                    utilsScript: 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js'
                    });

                    $refs.phone.addEventListener('countrychange', () => {
                    this.dial_code = iti.getSelectedCountryData().dialCode;
                    });
                    }
                    }" x-init="attachIntlPhone()"
                    >

                        <x-jet-validation-errors class="mb-4 alert alert-danger"/>
                        <x-general.status-alert/>

                        @php
                            /**
                            * @var \App\Models\Institutes\School $school;
                            * @var \App\Models\School\SchoolType $type
                            */
                        @endphp
                        <form class="mt-3" method="post" wire:submit.prevent="save">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="h-100">
                                        <label for="email"
                                               class="visually-hidden">{{ __('school_name') }}</label>
                                        <input type="text" id="school_name" name="school_name" wire:model.lazy="school_name"
                                               class="form-control input-field" placeholder="School Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 mobile-marg-2">
                                    <div class="h-100">
                                        <div class="input-group" wire:ignore wire:key="phone">
                                            <label for="phone" class="visually-hidden">{{ __('Phone') }}</label>
                                            <input type="tel" x-ref="phone" x-model="phone" class="form-control input-field">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6 ">
                                    <div class="h-100">
                                        <input type="text" id="national_id" name="national_id" wire:model.defer="national_id"
                                               class="form-control input-field" placeholder="@lang('School National ID, License, or Registration Number (optional)')">
                                    </div>
                                </div>
                                <div class="col-lg-6 mobile-marg-2">
                                    <div class="h-100">
                                        <div class="input-group">
                                            <select wire:model.defer="school_type_id" class="form-control input-field">
                                                <option>@lang('Select School Type')</option>
                                                @foreach($school_types as $type)
                                                    <option value="{{$type->id}}">{{$type->translated_name ?: $type->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="h-100">
                                        <label for="email"
                                               class="visually-hidden">{{ __('Email') }}</label>
                                        <input type="email" id="email" name="email" wire:model.defer="email"
                                               class="form-control input-field"
                                               placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6 mobile-marg-2">
                                    <div class="h-100">
                                        <label for="facebook"
                                               class="visually-hidden">{{ __('Facebook') }}</label>
                                        <input type="text" name=" facebook_url" id="facebook" wire:model.defer="facebook_url"
                                               class="form-control input-field" placeholder="Facebook">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="h-100">
                                        <label for="website"
                                               class="visually-hidden">{{ __('Website') }}</label>
                                        <input type="text" id="website" name="website" wire:model.defer="website"
                                               class="form-control input-field"
                                               placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-lg-6 mobile-marg-2">
                                    <div class="h-100">
                                        <label for="linkedin" class="visually-hidden">@lang('Linkedin')</label>
                                        <input type="text" id="linkedin_url" name="linkedin_url" wire:model.defer="linkedin_url"
                                               class="form-control input-field" placeholder="Linkedin">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <button type="submit" class="button-dark-blue width-25 button-sm mobile-btn" wire:loading.attr="disabled">@lang('Save')
                                        </button>
                                        <button type="button" class="button-red width-25 button-sm mobile-btn" wire:loading.attr="disabled"
                                                wire:click="setData">@lang('Cancel')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-general.loading wire:target="save" message="Saving Data" />
    </div>
</div>
