<div class="card mt-3">
   <div class="card-body">
         <div class="blue h5">@lang('Conference Information')</div>
         <div class="mt-3 row">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="conference.title" class="form-control input-field"  placeholder="Conference Name">
                  <label for="floatingInput">@lang('Conference Name')</label>
               </div>
            </div>
         </div>
         <div class="mt-3 row">
            <div class="col-12">
               <div class="blue">@lang('Intorduction about the Conference')</div>
               <textarea wire:model.defer="conference.intro_about_conference" name="content" rows="5" style="display: none;"></textarea>
            </div>
         </div>
         <div class="mt-3 row">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="conference.starts_date" type="text" class="input-field basicDate form-control flatpickr-input"  placeholder="Conference Start Date" data-input="" readonly="readonly">
                  <label for="floatingInput">@lang('Conference Start Date')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="conference.end_date" type="text" class="input-field basicDate form-control flatpickr-input"  placeholder="Conference End Date" data-input="" readonly="readonly">
                  <label for="floatingInput">@lang('Conference End Date')</label>
               </div>
            </div>
         </div>
         <div class="mt-3 row">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="conference.url" class="form-control input-field"  placeholder="Conference URL">
                  <label for="floatingInput">@lang('Conference URL')</label>
               </div>
            </div>
         </div>
         <div class="w-100 px-4 mt-4">
            <hr>
         </div>
         <div class="blue h5">@lang('Conference Subjects')</div>
         <div class="mt-3 row">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="conference.subjects" class="form-control input-field"  placeholder="Name of the Subjects">
                  <label for="floatingInput">@lang('Name of the Subjects')</label>
               </div>
            </div>
         </div>
         <div class="d-md-flex justify-content-end align-items-end mt-1">
            <div class="col-md-4 col-12 text-place-end mt-3 mb-4">
               <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
               @lang('+ Add New Subjects')
               </button>
            </div>
         </div>
         <div class="language-div-4">
            @for($i = 0; $i<$details_in_langs; $i++)
            @if($i > 0)
            <br>
            <div class="card">
               <div class="card-body">
                  <div class="row mb-4">
                     <div class="col-md-8 col-12">
                        <div class="form-floating w-100">
                           <input wire:model.defer="conference.subjects_new_lang{{$i}}" class="form-control input-field"  placeholder="Name of the Subjects">
                           <label for="floatingInput">@lang('Name of the Subjects')</label>
                        </div>
                     </div>
                     <div class="col-md-4 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                           <select wire:model.defer="conference.lang_{{$i}}" class="form-select input-field" aria-label="">
                              <option>English(Italiano)</option>
                           </select>
                           <label for="floatingSelectGrid">@lang('Select Language')</label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endif
            @endfor
         </div>
         <div class="w-100 px-4">
            <hr>
         </div>
         <div class="h5 blue">@lang('Conference Logos')</div>
         <div>
            <input type="file" class="d-none" wire:model="rectangle_logo_path" x-ref="photo" x-on:change="
               photoName = $refs.photo.files[0].name;
               const reader = new FileReader();
               reader.onload = (e) => {
               photoPreview = e.target.result;
               };
               reader.readAsDataURL($refs.photo.files[0]);"/>
            <div class="d-md-flex mt-3 justify-content-between align-items-center">
               <div class="col-md-6">
                  <div x-show="!photoPreview">
                     <img src="{{$university->monogram_url}}" x-on:click.prevent="$refs.photo.click()" style="cursor:pointer;" class="card p-2 rounded-0" width="250px">
                  </div>
                  <div x-show="photoPreview" style="display: none;">
                     <img :src="photoPreview" class="card p-2 rounded-0" width="250px">
                  </div>
                  <div x-show="isUploading" class="mt-2" style="width: 130px" >
                     <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                           :style="`width: ${progress}%;`"  :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
                  <x-jet-input-error for="photo" class="mt-2"/>
               </div>
               <div class="col-md-6  mobile-marg text-place-end">
                  <button class="m-0 button-no-bg" :disabled="isUploading"   x-on:click.prevent="$refs.photo.click()">@lang('+ Upload Rectangle Logo')</button>
               </div>
            </div>
         </div>

         <div>
            <input type="file" class="d-none" wire:model="square_logo_path" x-ref="photo" x-on:change="
               photoName = $refs.photo.files[0].name;
               const reader = new FileReader();
               reader.onload = (e) => {
               photoPreview = e.target.result;
               };
               reader.readAsDataURL($refs.photo.files[0]);"/>
            <div class="d-md-flex mt-3 justify-content-between align-items-center">
               <div class="col-md-6">
                  <div x-show="!photoPreview">
                     <img src="{{$university->monogram_url}}" x-on:click.prevent="$refs.photo.click()" style="cursor:pointer;" class="card p-2 rounded-0" width="130px">
                  </div>
                  <div x-show="photoPreview" style="display: none;">
                     <img :src="photoPreview" class="card p-2 rounded-0" width="130px">
                  </div>
                  <div x-show="isUploading" class="mt-2" style="width: 130px" >
                     <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                           :style="`width: ${progress}%;`"  :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
                  <x-jet-input-error for="photo" class="mt-2"/>
               </div>
               <div class="col-md-6  mobile-marg text-place-end">
                  <button class="m-0 button-no-bg" :disabled="isUploading"   x-on:click.prevent="$refs.photo.click()">@lang('+ Upload Square Logo')</button>
               </div>
            </div>
         </div>

        <!--  <div class="d-md-flex mt-3 justify-content-between align-items-center">
            <div class="col-md-6">
               <img src="https://d73ojsnoesnuw.cloudfront.net/images/site-logos/Logo-stars-v1.png" class="card p-2 rounded-0" width="250px">
            </div>
            <div class="col-md-6  mobile-marg text-place-end"><button class="m-0 button-no-bg">@lang('+ Upload Rectangle Logo')</button></div>
         </div>
         <div class="d-md-flex mt-4 justify-content-between align-items-center">
            <div class="col-md-6 "><img src="https://d73ojsnoesnuw.cloudfront.net/images/site-logos/Logo-stars-v1.png" class="card p-2 rounded-0" width="130px"></div>
            <div class="col-md-6 text-place-end mobile-marg"><button class="m-0 button-no-bg">@lang('+ Upload Square Logo')</button></div>
         </div> -->
         <div class="w-100 px-4 mt-4">
            <hr>
         </div>
         <div class="d-md-flex justify-content-end align-items-center mt-1">
            <button class="m-0 button-no-bg" wire:click="addCenferenceDetailsInOtherLanguage" type="button">
            @lang('+ Add Conference detail in another Language')
            </button>
         </div>
         <div class="language-div-3">
            
            @for($i = 0; $i<$addCenferenceDetailsInOtherLanguage; $i++)
            @if($i > 0)
            <div class="row mt-3">
               <div class="blue h5 col-md-12 col-12">@lang('Conference Information in Different Language')</div>
            </div>
            <br>
            
            <div class="card">
               <div class="card-body">
                  <div class="mt-3 row">
                     <div class="col-md-5 col-12">
                        <div class="form-floating w-100">
                           <select wire:model.defer="conference.lang_detail_{{$i}}" class="form-select input-field"  aria-label="">
                              <option>Language(English)</option>
                           </select>
                           <label for="floatingSelectGrid">@lang('Select Language')</label>
                        </div>
                     </div>
                     <div class="col-md-7 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                           <input wire:model.defer="conference.detail_conference_name{{$i}}" class="form-control input-field" placeholder="Conference Name">
                           <label for="floatingInput">@lang('Conference Name')</label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endif
            @endfor
            <div class="row mt-3">
               <div class="col-12">
                  <div class="blue">@lang('Introduction about the Conference')</div>
                  <textarea wire:model.defer="conference.introduction" name="content" style="display: none;"></textarea>
               </div>
            </div>
            <div class="w-100 px-4 mt-4">
               <hr>
            </div>
         </div>
         <div class="h5 blue mt-3">@lang('Conference Subjects')</div>
         <div class="row mt-4">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="conference.subject1" class="form-control input-field"  placeholder="Name of the Subjects 1">
                  <label for="floatingInput">@lang('Name of the Subjects 1')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="conference.subject1" class="form-control input-field"  placeholder="Name of the Subjects 2">
                  <label for="floatingInput">@lang('Name of the Subjects 2')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="conference.subject1" class="form-control input-field"  placeholder="Name of the Subjects 3">
                  <label for="floatingInput">@lang('Name of the Subjects 3')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="conference.subject1" class="form-control input-field"  placeholder="Name of the Subjects 4">
                  <label for="floatingInput">@lang('Name of the Subjects 4')</label>
               </div>
            </div>
         </div>
         <div class="w-100 px-4 mt-4">
            <hr>
         </div>
         <div class="card mt-4">
            <div class="card-body">
               <div class="w-100">
                  <div class="row">
                     <div class="h6 blue">@lang('upload or drag and drop 1 or more images , Image Format must be .JPG, .PNG, .SVG, or .WEBP')</div>
                  </div>
                  <div class="upload-container file-upload d-flex justify-content-center">
                     <i class="fa-solid fa-cloud-arrow-up light-blue"></i>
                     <input wire:model.defer="conference.logo" type="file" id="file_upload" multiple="">
                  </div>
               </div>
            </div>
         </div>
     
   </div>
</div>
