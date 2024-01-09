<div class="card">
   <div class="card-body">
      <div class="d-md-flex justify-content-between  align-items-center">
         <div class="h4 mb-0 blue">@lang('Location and Branches')</div>
      </div>
      <br>
      <div class="paragraph-style-2 blue">
         @lang('If the university has multiple branches locally and/or in other countries, add first the main branch, then add each branch after that below. Please Note you must give each branch a name, branch name can be (university name + city and/or country name) or the offical name for the university branch.')
      </div>
      <div class="row-h">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-floating w-100">
                           <select wire:model.defer="lc_b.campus_country_id.{{ $i }}" class="form-select input-field" 
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
                     <div class="col-md-3 mobile-marg-2">
                        <p wire:loading.block wire:target="loadCities" class="start form-control input-field mb-0" aria-label="" style="font-size: small ">
                           <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> Loading Cities...
                        </p>
                        <div wire:loading.class="d-none" wire:target="loadCities" class="form-floating w-100">
                           <select wire:model.defer="lc_b.campus_city_id.{{ $i }}" class="form-select input-field" 
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
                     <div class="col-md-6">
                        <div class="form-floating">
                           <input wire:model.defer="lc_b.campus_name.{{ $i }}" class="form-control input-field" placeholder="branch a name or just University Name">
                           <label for="floatingInput">@lang('branch a name or just University Name')</label>
                        </div>
                     </div>
                  </div>
                  <div class="row  mt-3">
                     <div class="col-md-12">
                        <div class="form-floating">
                           <input wire:model.defer="lc_b.campus_address_txt.{{ $i }}" class="form-control input-field" placeholder="University Address as Text">
                           <label for="floatingInput">@lang('University Address as Text')</label>
                        </div>
                     </div>
                  </div>
                  <div class="row  mt-3">
                     <div class="col-md-12">
                        <div class="form-floating">
                           <input wire:model.defer="lc_b.campus_map_link.{{ $i }}" class="form-control input-field" placeholder="University Address as Google Map Link">
                           <label for="floatingInput">@lang('University Address as Google Map Link')</label>
                        </div>
                     </div>
                  </div>
                  <div class="row mt-3 mb-3">
                     <div class="col-md-5 d-flex align-items-center">
                        <input wire:model.defer="lc_b.campus_type.{{ $i }}" type="checkbox" class=" mt-0 form-check-input"> <span class="blue ms-2">This is the Main Branch</span>
                     </div>
                  </div>
                  @for($i = 0; $i<$details_in_langs; $i++)
                  @if($i > 0)
                  <br>
                  <div class="card">
                     <div class="card-body">
                        <div class="language-div-1">
                           <div class="col-md-5">
                              <div class="form-floating w-100">
                                 <select wire:model.defer="translations.{{$i}}" class="form-select input-field">
                                    <option value="">@lang('Select Language')</option>
                                    @foreach($languages as $language)
                                    <option
                                    value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
                                    @endforeach
                                 </select>
                                 <label for="floatingSelectGrid">@lan('Select Language')</label>
                              </div>
                           </div>
                           <div class="mt-3">
                              <div class="form-floating w-100">
                                 <input wire:model.defer="branch_name_other_lang.{{ $i }}" class="form-control input-field" placeholder="branch name or just University Name in Other Language">
                                 <label for="floatingInput">@lang('Branch name or just University Name in 
                                 Other Language')</label>
                              </div>
                           </div>
                           <div class="mt-3">
                              <div class="form-floating w-100">
                                 <input wire:model.defer="branch_address_other_lang.{{ $i }}" class="form-control input-field" placeholder="University Addresses as text in Other Language">
                                 <label for="floatingInput">@lang('University Addresses in Other Language')</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
                  @endfor
                  <div class="row mb-3">
                     <div class="col-12 text-place-end mt-4 mb-4">
                        <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
                        @lang('+ Add University Location in another language')
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<x-jet-modal wire:model="isModalOpen">
   <x-slot name="title">
            @lang('Update Location and Branches')
        </x-slot>
        <!-- <div class="modal-body"> -->
            <!-- Livewire component rendering the slots -->
            @if($edit_item)
            <div class="row">
               <div class="col-md-12">
                  <div class="form-floating w-100">
                     <select wire:model.defer="edit_item.country_id" class="form-select input-field" 
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
               <div class="col-md-12 mt-3">
                  <p wire:loading.block wire:target="loadCities" class="start form-control input-field mb-0" aria-label="" style="font-size: small ">
                     <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> Loading Cities...
                  </p>
                  <div wire:loading.class="d-none" wire:target="loadCities" class="form-floating w-100">
                     <select wire:model.defer="edit_item.city_id" class="form-select input-field" 
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
               <div class="col-md-12 mt-3">
                  <div class="form-floating">
                     <input wire:model.defer="edit_item.campus_name" class="form-control input-field" placeholder="branch a name or just University Name">
                     <label for="floatingInput">@lang('branch a name or just University Name')</label>
                  </div>
               </div>
            </div>
            <div class="row  mt-3">
               <div class="col-md-12">
                  <div class="form-floating">
                     <input wire:model.defer="edit_item.campus_address_txt" class="form-control input-field" placeholder="University Address as Text">
                     <label for="floatingInput">@lang('University Address as Text')</label>
                  </div>
               </div>
            </div>
            <div class="row  mt-3">
               <div class="col-md-12">
                  <div class="form-floating">
                     <input wire:model.defer="edit_item.campus_map_link" class="form-control input-field" placeholder="University Address as Google Map Link">
                     <label for="floatingInput">@lang('University Address as Google Map Link')</label>
                  </div>
               </div>
            </div>
            <div class="row mt-3 mb-3">
               <div class="col-md-12 d-flex align-items-center">
                  <input wire:model.defer="edit_item.campus_type" type="checkbox" class=" mt-0 form-check-input"> <span class="blue ms-2">This is the Main Branch</span>
               </div>
            </div>
            @for($i = 0; $i<$edit_details_in_langs; $i++)
            
            <br>
            <div class="card">
               <div class="card-body">
                  <div class="language-div-1">
                     <div class="col-md-12">
                        <div class="form-floating w-100">
                           <select wire:model.defer="editTranslations.{{$i}}" class="form-select input-field">
                              <option value="">@lang('Select Language')</option>
                              @foreach($languages ?? []  as $language)
                              <option
                              value="{{$language->code}}">{{$language->native_name}}</option>
                              @endforeach
                           </select>
                           <label for="floatingSelectGrid">@lan('Select Language')</label>
                        </div>
                     </div>
                     <div class="mt-3">
                        <div class="form-floating w-100">
                           <input wire:model.defer="edit_branch_name_other_lang.{{ $i }}" class="form-control input-field" placeholder="branch name or just University Name in Other Language">
                           <label for="floatingInput">@lang('Branch name in 
                           Other Language')</label>
                        </div>
                     </div>
                     <div class="mt-3">
                        <div class="form-floating w-100">
                           <input wire:model.defer="edit_branch_address_other_lang.{{ $i }}" class="form-control input-field" placeholder="University Addresses as text in Other Language">
                           <label for="floatingInput">@lang('University Addresses in Other Language')</label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
            @endfor
            <div class="row mb-3">
               <div class="col-12 text-place-end mt-4 mb-4">
                <button id="addLanguageButton" class="m-0 button-no-bg" wire:click="addEditDetailsInOtherLanguage" type="button">
            @lang('+ Add University Location in another language')
        </button>
               </div>
            </div>
            @endif
             <div class="col-md-12 mt-3">
                     <a href="javascript:void(0)" wire:click="updateLocation()" class="btn btn-primary">@lang('Update Location')</a>
            </div>
         <!-- </div> -->
         </x-jet-modal>
<script type="text/javascript">
   document.addEventListener('livewire:load', function () {
   console.log(1);
   Livewire.on('showEditItem', () => {
      $('#editItem').modal('show'); // Show the modal when the event is emitted
   });
   });
   document.addEventListener('livewire:load', function () {
   Livewire.on('closeModal', () => {
      $('#editItem .btn-close').click(); // Hide the modal when the event is emitted
      $('#editItem').modal('show');
      $('#editItem').modal('show');

   });
   });

</script>