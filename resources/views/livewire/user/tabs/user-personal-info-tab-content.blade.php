<div class="w-100">
    <div class="row">
        <div class="col-12">
            <div class="h4 text-blue">@lang('Personal Information')</div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-100">
                        <x-jet-validation-errors class="mb-4 alert alert-danger"/>
                        <x-general.status-alert/>

                        @php
                            /**
                            * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Countries> $countries
                            * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Cities> $cities
                            */
                        @endphp
                        <form class="mt-3" method="post" wire:submit.prevent="" x-data="{photoName: null, photoPreview: null,isUploading: false, progress: 0}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 d-flex flex-column justify-content-center align-items-center"

                                     x-on:livewire-upload-start="isUploading = true"

                                     x-on:livewire-upload-finish="isUploading = false"

                                     x-on:livewire-upload-error="isUploading = false"

                                     x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <input type="file" class="d-none" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);"/>


                                    <!-- Current Profile Photo -->
                                    <div class="mt-2" x-show="!photoPreview">
                                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                                             class="rounded-circle" style="width:200px; height:200px;">

                                    </div>

                                    <!-- New Profile Photo Preview -->
                                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="d-block rounded-circle"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\'); width:200px; height:200px; background-repeat: no-repeat;background-size: cover;' ">
                    </span>
                                    </div>

                                    <div x-show="isUploading" class="mt-2">
                                        <progress max="100" x-bind:value="progress"
                                                  style="accent-color:var(--primary);"></progress>
                                    </div>
                                    <div >
                                        <button class="mt-2 me-2 button-dark-blue button-sm mobile-btn" type="button"
                                                x-on:click.prevent="$refs.photo.click()"  :disabled="isUploading">
                                            {{ __('Select A New Photo') }}
                                        </button>

                                        @if ($this->user->profile_photo_path)
                                            <button type="button" class="mt-2 button-red button-sm mobile-btn"
                                                    wire:click="deleteProfilePhoto" :disabled="isUploading">
                                                {{ __('Remove Photo') }}
                                            </button>
                                        @endif
                                    </div>
                                    <x-jet-input-error for="photo" class="mt-2"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="h-100">
                                        <input type="text" id="first_name" name="first_name"
                                               wire:model.defer="first_name"
                                               class="form-control input-field"
                                               placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 mobile-marg-2">
                                    <div class="h-100">
                                        <input type="text" id="last_name" name="last_name" wire:model.defer="last_name"
                                               class="form-control input-field"
                                               placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="h-100">
                                        <input type="text" id="position" name="position" wire:model.defer="position"
                                               class="form-control input-field"
                                               placeholder="Position">
                                    </div>
                                </div>
                                <div class="col-lg-6  mobile-marg-2">
                                    <div class="h-100">
                                        <input type="text" id="linkedin_id" name="linkedin_id"
                                               wire:model.defer="linkedin_id"
                                               class="form-control input-field" placeholder="Linkedin">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="h-100">
                                        <select wire:model="country_id" name="country_id"
                                                class="text-start form-control input-field"
                                                aria-label="" wire:change="loadCities">
                                            <option value="">@lang('Select Country')</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mobile-marg-2">
                                    <p wire:loading.block wire:target="loadCities"
                                       class="start form-control input-field mb-0" aria-label=""
                                       style="font-size: small ">
                                        <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> Loading Cities...
                                    </p>
                                    <div wire:loading.class="d-none" wire:target="loadCities">
                                        <select wire:model="city_id" name="city_id"
                                                class="start form-control input-field" aria-label="">
                                            <option value="">@lang('Select City')</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="h-100">
                    <textarea rows="4" id="position" name="position" wire:model.defer="about"
                              class="form-control input-secondary" placeholder="Description">
                    </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="text-center mt-5">
                                        <button type="submit" wire:loading.attr="disabled" :disabled="isUploading" wire:click="save"
                                                class="button-dark-blue width-25 button-sm mobile-btn">@lang('Save')</button>
                                        <button wire:loading.attr="disabled" :disabled="isUploading" wire:click="setData"
                                                class="button-red width-25 button-sm mobile-btn">@lang('Cancel')</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



        <div class="card bg-transparent mt-4">
        <div class="card-body">
            <div class="h4 blue" id="upload-images">@lang('Persional info')   
             <div class="w-100 px-4 mt-3">
        <hr>
    </div> 
    <!-- @include('about-icon') -->

 </div>
       <table class="table">
   <!--  <thead>
        <tr>
            <th scope="col">URL</th>
            <th scope="col">Type</th>
            <th scope="col">Created On</th>
            <th scope="col">By</th>
            <th scope="col" class="text-place-end">Actions</th>
        </tr>
    </thead> -->
    <tbody>
       
        </tbody>
</table>
 <div class="d-md-flex col-md-6 h6 blue justify-content-between">
    <div class="box-bottom-note">
            @lang('Updated on') {{ \Carbon\Carbon::parse($this->user['updated_at'])->format('D, M j, Y g:i A') }}
        
    </div>
    <div class="mobile-marg-2">@lang('By') {{ $this->user['updated_by'] ?? 'By Dev Team Rep' }}</div>
</div>

    </div>
    </div>
    <x-general.loading wire:target="save" message="Saving Data" />
</div>
