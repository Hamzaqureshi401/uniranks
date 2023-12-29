<div>
    <div class="d-md-flex align-items-center">
        <div class="h4 blue">@lang('University Main Information')</div>
        <div class="light-gray mobile-nav-hidden col-marg h4">|</div>
        <div class="h4 blue col-marg">
            @lang('Direct Admission Contact')
            @include('about-icon')
        </div>
    </div>
    <div class="paragraph-style-2 blue">
   @lang('Update the direct admission enrolment and add the legal university name')
</div>
    <div class="card mt-3">
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
                <div class="row mt-3">
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
                    <div class="col-md-7">
                        <div class="form-floating w-100">
                            <input wire:model.defer="phone_number" class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Phone Number')">
                            <label for="floatingInput">@lang('Phone Number')</label>
                        </div>
                        <x-jet-input-error for="phone_number" class="mt-2" />
                    </div>
                    <div class="col-md-2">
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
           <table class="table">
    <!-- <thead>
        <tr>
            <th>@lang('Phone Number')</th>
            <th>@lang('Created on')</th>
            <th>@lang('By')</th>
            <th></th>
        </tr>
    </thead> -->
    <tbody>
        @forelse($contacts as $contact)
            <tr>
                <td>{{$contact->full_phone_number}} {{!empty($contact->ext) ? '/'.__('ext')." $contact->ext":""}}</td>
                <td class="font-light">{{$contact->created_at?->toDayDateTimeString()}}</td>
                <td class="font-light">{{$contact->createdBy?->name ?:"---"}}</td>
                <td class="text-end"><a href="javascript:void(0)" wire:click="edit('{{$contact->id}}')" class="light-blue">@lang('Edit')</a></td>
                <td class="text-end">
                     
                    <a href="javascript:void(0)" wire:click="deleteContact('{{$contact->id}}')" class="red">@lang('Delete')</a>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">@lang('No Contact Added Yet!')</td>
            </tr>
        @endforelse
    </tbody>
</table>

        </div>
    </div>
</div>
