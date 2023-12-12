<div>
    <div class="row">
        <div class="col-12">
            <div class="h4 text-blue">@lang('School Location Information')</div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body" x-data="{disable_buttons:false}" @disable-btns.window="disable_buttons=true" @enable-btns.window="disable_buttons=false">
                    <div class="w-100">

                        <x-jet-validation-errors class="mb-4 alert alert-danger"/>
                        <x-general.status-alert/>


                        @php
                            /**
                            * @var \App\Models\Institutes\School $school
                            **/
                        @endphp
                        <form class="mt-3" method="post" wire:submit.prevent="save"
                              onkeydown="return event.key != 'Enter';">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="row">
                                        <div class="h7 text-blue mb-3">@lang('School location and branches location')</div>
                                        <div class="h6 text-blue mb-3">{{$school->school_name}}</div>
                                    </div>
                                    @php
                                        /**
                                        * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Countries> $countries
                                        * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Cities> $cities
                                        */
                                    @endphp
                                    <div class="row">
                                        <div @class(['col-md-4 mt-3 mt-md-0', 'col-md-6' => !$showStates ])>
                                            <select wire:model="country_id" name="country_id"
                                                    class="text-start form-control input-field" aria-label=""
                                                    wire:change="loadStatesAndCities">
                                                <option value="">@lang('Select Country')</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if($showStates)
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <p wire:loading.block wire:target="loadStatesAndCities"
                                                   class="start form-control input-field" aria-label=""
                                                   style="font-size: small ">
                                                    <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
                                                    @lang('Loading')...
                                                </p>
                                                <div wire:loading.class="d-none" wire:change="loadCities" wire:target="loadStatesAndCities">
                                                    <select wire:model="state_id" name="state_id"
                                                            class="start form-control input-field"  aria-label="">
                                                        <option value="">@lang('Select State')</option>
                                                        @foreach($states as $state)
                                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        <div  @class(['col-md-4 mt-3 mt-md-0', 'col-md-6' => !$showStates ])>
                                            <p wire:loading.block wire:target="{{!$showStates ? 'loadStatesAndCities':'loadCities'}}"
                                               class="start form-control input-field" aria-label=""
                                               style="font-size: small ">
                                                <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> Loading...
                                            </p>
                                            <div wire:loading.class="d-none " wire:target="{{!$showStates ? 'loadStatesAndCities':'loadCities'}}">
                                                <select wire:model="city_id" id="select_city"
                                                        class="start form-control input-field w-100" aria-label="" style="width: 100%">
                                                    <option value="">@lang('Select City')</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" >
                                        <div class="col-10 col-md-11">
                                            <input name="address1" id="address1" wire:model.lazy="address1" type="text"
                                                   placeholder="@lang('Pick Location or Start Typing')"
                                                   class="input-field form-control input-field">
                                        </div>
                                        <div class="col-2 col-md-1">
                                            <button role="button" type="button" class="button-sm button-light-blue mt-0 w-100"
                                                    onclick="getLocation()">
                                                <i class="fa-solid fa-location-crosshairs" ></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <button type="submit"  id="save-btn" class="button-dark-blue width-25 button-sm mobile-btn"
                                                wire:loading.attr="disabled" :disable="disable_buttons">@lang('Save')
                                        </button>
                                        <button type="button"  id="cancel-btn" class="button-red width-25 button-sm mobile-btn"
                                                wire:loading.attr="disabled" :disable="disable_buttons"
                                                wire:click="edit()">@lang('Cancel')</button>
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
    @if($user_schools->count() > 1)
    <div class="row mt-4">
        <div class="col-12">
            <div class="h4 text-blue">@lang('Branches')</div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-100">
                        <div class="table-responsive mt-4">
                            <table class="table">
                                <thead class="primary-text">
                                <tr>
                                    <td class="align-top primary-text" style="/*font-size:13px*/">#</td>
                                    <td class="align-top primary-text" style="/*font-size:13px*/">@lang('Branch Name')</td>
                                    <td class="align-top primary-text" style="/*font-size:13px*/">@lang('County')</td>
                                    <td class="align-top primary-text" style="/*font-size:13px*/">@lang('City')</td>
                                    <td class="align-top primary-text" style="/*font-size:13px*/">@lang('State')</td>
                                    <td class="align-top primary-text" style="/*font-size:13px*/">@lang('Address')</td>
                                    <td class="align-top primary-text" style="/*font-size:13px*/">@lang('Action')</td>
                                </tr>
                                </thead>
                                <tbody class="text-muted align-middle">
                                @php
                                    /**
                                    * @var \App\Models\Institutes\School $user_school
                                    **/
                                @endphp
                                @foreach($user_schools as $user_school)
                                    <tr>
                                        <td class="align-top" style="/*font-size:13px*/">
                                            {{$loop->iteration}}</td>
                                        <td class="align-top" style="/*font-size:13px*/">
                                            {{$user_school->translated_name ? $user_school->translated_name :  $user_school->school_name }}</td>
                                        <td class="align-top" style="/*font-size:13px*/">
                                            {{$user_school->country?->translated_name ? $user_school->country?->translated_name: $user_school->country?->country_name}}
                                        </td>
                                        <td class="align-top" style="/*font-size:13px*/">
                                            {{$user_school->city?->translated_name ? $user_school->city?->translated_name: $user_school->city?->city_name}}</td>
                                        <td class="align-top" style="/*font-size:13px*/">
                                            {{$user_school->state?->translated_name ?$user_school->state?->translated_name: $user_school->state?->name}}</td>
                                        <td class="align-top" style="/*font-size:13px*/">
                                            {{$user_school->address1}}</td>
                                        <td class="align-center">
                                            <i class="fa-solid fa-pen-to-square ic_style1" style="cursor: pointer"
                                               wire:click="edit('{{$user_school->id}}')"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @push(AppConst::PUSH_JS)
        <script type="text/javascript">
            var autocomplete;
            function initialize() {
                var input = document.getElementById('address1');
                autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.addListener('place_changed', function () {
                    disableBtns()
                    let place = autocomplete.getPlace();
                    setLocationData(place.formatted_address,place.geometry['location'].lat(),place.geometry['location'].lng(),place.url);
                });
            }
        </script>
        <script type="text/javascript"
                src="https://maps.google.com/maps/api/js?key={{ config('services.google.map.key') }}&libraries=places&callback=initialize"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                addSearchWithSelect()
            });

            function addSearchWithSelect(){

                // $('.searchable').select2({width:'resolve'});
                $('#select_city').select2({width:'resolve'},@js($city_id));
                $('#select_city').on('change', function (e) {
                    var city_id = $('#select_city').select2("val");
                    console.log({city_id});
                @this.set('city_id', city_id);
                });
            }
            Livewire.on('loadMap', initialize);
            Livewire.on('addSearchBarWithSelect', addSearchWithSelect);
            function setLocationData(address,lag,lng,url = ""){
                if(url==""){
                    url = `https://www.google.com/maps/place/${lag},${lng}`
                }
                @this.set('address1', address);
                @this.set('latitude', lag);
                @this.set('longitude',lng);
                @this.set('map_link',url);
                setTimeout(enableBtns,200);
            }

            function getLocation() {
                if (!navigator.geolocation) {
                    return alert("Unable to access location");
                }
                disableBtns()
                navigator.geolocation.getCurrentPosition(showPosition);
            }

            function showPosition(position) {
                disableBtns()
                let latitude = position.coords.latitude;
                let longitude = position.coords.longitude;

                let mapLatLng = new google.maps.LatLng(latitude, longitude);
                // This is making the Geocode request
                let geocoder = new google.maps.Geocoder();
                geocoder.geocode({'latLng': mapLatLng}, (results, status) => {
                    if (status == google.maps.GeocoderStatus.OK) {
                        let place = results[0];
                        setLocationData(place.formatted_address,place.geometry['location'].lat(),place.geometry['location'].lng())
                    }
                });
            }

            function disableBtns(){
                window.dispatchEvent(
                    new CustomEvent('disable-btns')
                );
            }
            function enableBtns(){
                window.dispatchEvent(
                    new CustomEvent('enable-btns')
                );
            }
        </script>
    @endPush
</div>

