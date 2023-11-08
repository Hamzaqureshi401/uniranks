<div>
    <div class="h4 blue mt-5">
        @lang('University Location')
    </div>
    <div class="paragraph-style2 blue">
        @lang('Add university location including country city, and full address with direct Google map link')
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <x-general.status-alert name="status"/>
            <form>
                @php
                    /**
                    * @var \App\Models\General\Countries[] $countries
                    * @var \App\Models\General\Cities[] $cities
                    **/
                @endphp
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating w-100">
                            <select wire:model.defer="country_id" class="form-select input-field" id="floatingSelectGrid"
                                    aria-label="" wire:change="loadCities">
                                <option value="">@lang('Country')</option>
                                @foreach($countries ?? [] as $country)
                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">@lang('Country')</label>
                        </div>
                        <x-jet-input-error for="country_id" class="mt-2" />
                    </div>

                    <div class="col-md-6 mobile-marg-2">
                        <p wire:loading.block wire:target="loadCities" class="start form-control input-field mb-0" aria-label="" style="font-size: small ">
                            <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> Loading Cities...
                        </p>
                        <div wire:loading.class="d-none" wire:target="loadCities" class="form-floating w-100">
                            <select wire:model.defer="city_id" class="form-select input-field" id="floatingSelectGrid"
                                    aria-label="">
                                <option value="">@lang('City')</option>
                                @foreach($cities ?? [] as $city)
                                    <option value="{{$city->id}}">{{$city->city_name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">@lang('City')</label>
                        </div>
                        <x-jet-input-error for="city_id" class="mt-2" />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-floating w-100">
                            <input wire:model.defer="map_link" class="form-control input-field" id="floatingInput" placeholder="@lang('Google map Link')">
                            <label for="floatingInput">@lang('Google map Link')</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="text-end">
                            <button type="button" wire:click="save" class="button-dark-blue width-25 button-sm mobile-btn"
                                    wire:loading.attr="disabled">@lang('Save')
                            </button>
                            <button type="button" class="button-red width-25 button-sm mobile-btn"
                                    wire:loading.attr="disabled"
                                    wire:click="initForm">@lang('Cancel')</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <x-general.loading wire:target="save" message="Updating..." />
</div>
