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
                  <input wire:model.defer="conference.start_date" type="text" class="input-field basicDate form-control flatpickr-input"  placeholder="Conference Start Date" data-input="" readonly="readonly">
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
                  <input wire:model.defer="conference.subjects-0" class="form-control input-field"  placeholder="Name of the Subjects">
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
                           <input wire:model.defer="subject_names_lang.{{$i}}" class="form-control input-field"  placeholder="Name of the Subjects">
                           <label for="floatingInput">@lang('Name of the Subjects')</label>
                        </div>
                     </div>
                     <div class="col-md-4 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <select wire:model.defer="subject_translations.{{$i}}" class="form-select input-field">
                                        <option value="">@lang('Select Language')</option>
                                        @foreach($languages as $language)
                                            <option
                                                value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
                                        @endforeach
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
         <div class="card mt-1" x-data="{photoName: null, photoPreview: null,isUploading: false, progress: 0}"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
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
      </div>
         <div>
             <div class="card mt-1" x-data="{photoName: null, photoPreview: null,isUploading: false, progress: 0}"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
    <!-- Existing code for square logo upload -->
    <input 
        type="file" 
        class="d-none" 
        wire:model="square_logo_path" 
        x-ref="photoSquare" 
        x-on:change="
            photoName = $refs.photoSquare.files[0].name;
            const reader = new FileReader();
            reader.onload = (e) => {
                photoPreview = e.target.result;
            };
            reader.readAsDataURL($refs.photoSquare.files[0]);
        "
    />
    <div class="d-md-flex mt-3 justify-content-between align-items-center">
        <div class="col-md-6">
            <!-- Adjusted to reference correct photo input -->
            <div x-show="!photoPreview">
                <img src="{{$university->monogram_url}}" x-on:click.prevent="$refs.photoSquare.click()" style="cursor:pointer;" class="card p-2 rounded-0" width="130px">
            </div>
            <div x-show="photoPreview" style="display: none;">
                <img :src="photoPreview" class="card p-2 rounded-0" width="130px">
            </div>
            <div x-show="isUploading" class="mt-2" style="width: 130px">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" :style="`width: ${progress}%;`"  :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <x-jet-input-error for="photo" class="mt-2"/>
        </div>
        <div class="col-md-6  mobile-marg text-place-end">
            <!-- Adjusted to reference correct photo input -->
            <button class="m-0 button-no-bg" :disabled="isUploading" x-on:click.prevent="$refs.photoSquare.click()">
                @lang('+ Upload Square Logo')
            </button>
        </div>
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
                            <select wire:model.defer="translations.{{$i}}" class="form-select input-field">
                                        <option value="">@lang('Select Language')</option>
                                        @foreach($languages as $language)
                                            <option
                                                value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
                                        @endforeach
                                    </select>
                           <label for="floatingSelectGrid">@lang('Select Language')</label>
                        </div>
                     </div>
                     <div class="col-md-7 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                           
                           <input wire:model.defer="names.{{$i}}" class="form-control input-field" placeholder="Conference Name">
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
          <div class="d-md-flex justify-content-end align-items-center mt-1">
            <button class="m-0 button-no-bg" wire:click="addCenferenceDetailsInOtherLanguage" type="button">
            @lang('+ Add Conference detail in another Language')
            </button>
         </div>
         <div class="h5 blue mt-3">@lang('Conference Subjects')</div>
                  @php
             $subjects = [
                 'Name of the Subjects 1',
                 'Name of the Subjects 2',
                 'Name of the Subjects 3',
                 'Name of the Subjects 4'
             ];
         @endphp

         @foreach($subjects as $index => $subject)
             <div class="row mt-3">
                 <div class="col-12">
                     <div class="form-floating w-100">
                         <input wire:model.defer="other_subjects.{{ $index }}" class="form-control input-field" placeholder="{{ $subject }}">
                         <label for="floatingInput">@lang($subject)</label>
                     </div>
                 </div>
             </div>
         @endforeach

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

 @push(AppConst::PUSH_CSS)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush
    @push(AppConst::PUSH_JS)
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        @if(app()->getLocale() != 'en')
            <script src="https://npmcdn.com/flatpickr/dist/l10n/{{app()->getLocale()}}.js"></script>
        @endif
        <script>
           


$(document).ready(function() {
        

            
    // var start_date = $('#st').val();
    // var end_date = $('#ed').val();
    
    $('.flatpickr-input').flatpickr({
        locale: "{{ app()->getLocale() }}",
        enableTime: false,
        allowInput: false,
         minDate: "today",
        // maxDate: end_date,
    });
    });
        </script>
    @endpush

