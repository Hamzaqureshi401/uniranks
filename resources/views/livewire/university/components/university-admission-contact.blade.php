<div>
    <div class="d-md-flex align-items-center">
        <div class="h4 blue">@lang('University Main Information')</div>
        <div class="light-gray mobile-nav-hidden col-marg h4">|</div>
        <div class="h4 blue col-marg">
            @lang('Direct Admission Contact')
        </div>
    </div>
    <div class="card mt-1">
        <div class="card-body">
            <x-general.status-alert name="status"/>
            <form>
                <div class="blue paragraph-style2">
                    @lang('this is where you need to update the direct admission and enrolment department phone number, or the main university number with the extension number')
                </div>
                @php
                    /**
                    * @var \App\Models\General\Countries[] $countries
                    **/
                @endphp
                <div class="d-md-flex mt-3 justify-content-between">
                    <div class="col-md-3">
                        <div class="form-floating w-100">
                            <select wire:model.defer="dial_code" class="form-select input-field" id="floatingSelectGrid"
                                    aria-label="">
                                <option value="">@lang('Country Code')</option>
                                @foreach($countries ?? [] as $country)
                                    <option value="{{$country->country_code}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">@lang('Country Code')</label>
                        </div>
                        <x-jet-input-error for="dial_code" class="mt-2" />
                    </div>
                    <div class="col-md-7 mobile-marg-2 mx-2">
                        <div class="form-floating w-100">
                            <input wire:model.defer="phone_number" class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Phone Number')">
                            <label for="floatingInput">@lang('Phone Number')</label>
                        </div>
                        <x-jet-input-error for="phone_number" class="mt-2" />
                    </div>
                    <div class="col-md-2 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input wire:model.defer="ext" class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('extension')">
                            <label for="floatingInput">@lang('extension')</label>
                        </div>
                    </div>
                </div>
                <div class="d-md-flex text-place-end mt-3 mb-3 justify-content-end">
                    <button class="m-0 button-no-bg" type="button" wire:click="save">+ @lang('Add phone number')</button>
                </div>
            </form>
            <x-general.loading message="Processing Your Request.." />
            <div class="w-100 mt-4 px-4">
                <hr>
            </div>
            @php
                /**
                * @var \App\Models\University\UniversityContactNumber[] $contacts
                **/
            @endphp
            @forelse($contacts as $contact)
                <div class="d-md-flex h6 blue justify-content-between">
                    <div class="fw-bold">{{$contact->full_phone_number}} {{!empty($contact->ext) ? '/'.__('ext')." $contact->ext":""}}</div>
                    <div class="font-light">@lang('Created on') {{$contact->created_at?->toDayDateTimeString()}}</div>
                    <div class="font-light">@lang('By') {{$contact->createdBy?->name ?:"---"}}</div>
                    <div class=""><a href="javascript:void(0)" wire:click="deleteContact('{{$contact->id}}')" class="red ">@lang('Delete')</a></div>
                </div>
            @empty
                <div class="d-flex h6 blue justify-content-center">
                    <div class="fw-bold">@lang('No Contact Added Yet!')</div>
                </div>
            @endforelse
        </div>
    </div>
</div>
