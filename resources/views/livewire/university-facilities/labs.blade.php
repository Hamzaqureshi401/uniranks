<div>

   <x-general.university-facility-page-title sub-title="University Labs"/>
   <div class="card mt-3">
      <div class="card-body">
         <div class="blue">@lang('University Lab Information')</div>
         <x-general.status-alert/>
         <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
        
            @php
            /**
            * @var \App\Models\University\UniversityLabCategory[] $categories
            * @var \App\Models\University\Facility\UniversityFacilityLab $lab_information
            **/
            @endphp
            <div class="row mt-2">
               <div class="col-md-6">
                  <div class="form-floating w-100">
                     <select wire:model.defer="lab_information.university_lab_category_id"
                        class="form-select input-field">
                        <option value="">@lang('Lab Category')</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                     </select>
                     <label for="floatingSelectGrid">@lang('Lab Category')</label>
                  </div>
               </div>
               <div class="col-md-6 mobile-marg-2">
                  <div class="form-floating w-100">
                     <input type="number" wire:model.defer="lab_information.no_labs"
                        class="form-control input-field"
                        placeholder="@lang('Number of Labs')">
                     <label for="floatingInput">@lang('Number of Labs')</label>
                  </div>
               </div>
            </div>
            @for($i = 0; $i<$details_in_langs; $i++)
            <div class="row mt-3">
               <div @class(["mobile-marg-2 col-md-8","col-md-12"=>($i == 0)])>
               <div class="form-floating w-100">
                  <input wire:model.defer="names.{{$i}}" class="form-control input-field"
                     placeholder="@lang('Lab Name')">
                  <label for="floatingInput">@lang('Lab Name')</label>
               </div>
            </div>
            @if($i > 0)
            <div class="col-md-4">
               <div class="form-floating w-100">
                  <select wire:model.defer="translations.{{$i}}" class="form-select input-field">
                     <option value="">@lang('Select Language')</option>
                     @foreach($languages as $language)
                     <option
                     value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
                     @endforeach
                  </select>
                  <label for="floatingSelectGrid">@lang('Select Language') </label>
               </div>
            </div>
            @endif
         </div>
         <div class="row mt-3">
            <div class="mobile-marg-2 col-md-12">
               <div class="form-floating w-100">
                  <textarea wire:model.defer="descriptions.{{$i}}" class="form-control input-textarea"
                     placeholder="@lang('Describe the lab, including some technical specifications and detail about usage and benefits')."
                     rows="3"></textarea>
                  <label for="floatingInput">@lang('Describe the lab')</label>
               </div>
            </div>
         </div>
         <div class="w-100 px-5 mt-4">
            <hr>
         </div>
         @endfor
         <div class=" text-place-end mt-4 mb-4">
            <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
            @lang('+ Add Lab Information into different language')
            </button>
         </div>
         <div class="row mt-4">
            <div class="col-12">
               <div class="h6 blue">
                  @lang('The average number of students can all labs handle at one time?')
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4 mt-3">
               <div class="form-floating w-100">
                  <div class="form-floating w-100">
                     <input type="number" wire:model.defer="lab_information.student_capacity"
                        class="form-control input-field"
                        placeholder="@lang('Number of Students')">
                     <label for="floatingInput">@lang('Number of Students')</label>
                  </div>
               </div>
            </div>
            <div class="col-md-3 mt-3">
               <div class="form-floating w-100">
                  <input type="number" wire:model.defer="lab_information.size"
                     class="form-control input-field"
                     placeholder="@lang('Lab size in m²')">
                  <label for="floatingInput">@lang('Lab size in m²')</label>
               </div>
            </div>
            <div class="col-md-5 mt-3">
               <div class="form-floating w-100">
                  <input type="date" wire:model.defer="lab_information.created_date" x-ref="created_date" class="form-control input-field dat"
                     placeholder="@lang('Created or Renewed Date')">
                  <label for="floatingInput">@lang('Created or Renewed Date')</label>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6 card bg-body-color mt-3" style="background-color: #eff1f3;">
    <div class="card-body">
        <div class="h6 blue">Lab Images</div>
        <div class="upload-container file-upload d-flex justify-content-center">
            <x-elements.file-uploader multiple="true" wire:model="lab_information.image_s" accept="image/*"/>
        </div>
        <div class="row mt-2">
            @if(!empty($lab_information['image_s']))
                <div class="mt-2">
                    <h6 class="blue">@lang('Uploaded Images:')</h6>
                    <div class="d-flex justify-content-center">
                        @foreach($lab_information['image_s'] as $image)
                            <img src="{{ $image->temporaryUrl() }}" alt="Uploaded Image" class="mr-2 mb-2" style="max-width: 100px; max-height: 100px;">
                        @endforeach
                    </div>
                </div>
            @endif
            <x-jet-input-error for="lab_information.image_s" class="mt-2"/>
        </div>
    </div>
</div>

            <div class="col-md-6 mt-3">
               <div class="col-md-12">
                  <div class="form-floating w-100">
                     <input type="text" wire:model.lazy="lab_information.panorama_url"
                        class="form-control input-field"
                        placeholder="@lang('360 Panorama Url')">
                     <label for="floatingInput">@lang('360 Panorama Url')</label>
                  </div>
               </div>
               <div class="col-md-12 mt-3">
                  <div class="form-floating w-100">
                     <div class="form-floating w-100">
                        <input type="text" wire:model.defer="lab_information.video_url"
                           class="form-control input-field"
                           placeholder="@lang('Video Url')">
                        <label for="floatingInput">@lang('Video Url')</label>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      
   </div>
</div>
<div class="row mt-4">
   <div class="col-md-6 offset-6 d-flex justify-content-md-end">
      <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
      <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Cancel')</button>
   </div>
</div>
@php
/**
* @var \App\Models\University\Facility\UniversityFacilityLab[] $dataCollection
* @var \App\Models\University\Facility\UniversityFacilityLab $selected_item?
**/
@endphp
@include('livewire.university-facilities.common-media')

<!-- @if(empty($selected_item))
<div class="card mt-4">
   <div class="card-body">
      <div class="w-100">
         <div class="row">
            <div class="col-12">
               <div class="h5 text-center blue d-flex justify-content-center">
                  <i class="fa-solid fa-circle-exclamation"></i>
                  &nbsp;
                  @lang('Select lab to view or update Images')
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endif -->



<div class="card bg-transparent mt-4">
   <div class="card-body">
      <div class="h4 blue">@lang('Labs')</div>
      <div class="w-100 px-4 mt-3">
         <hr>
      </div>
      <div>
         <table class="table">
            <thead>
               <tr class="blue">
                  <th>Lab Category</th>
                  <th>Name</th>
                  <th>No of Labs</th>
                  <th>Translated Name</th>
                  <th>Student Capacity</th>
                  <th>Size</th>
                  <th>Description</th>
                  <th>Video URL</th>
                  <th>Panorama URL</th>
                  <!-- <th>Status</th> -->
                  <th>Action</th>
                  <!-- Add other table headers as needed -->
               </tr>
            </thead>
            <tbody>
               @foreach($labs as $lab)
               <tr>
                  <td class="blue">{{ $lab->universityLabCategory->name ?? '--' }}</td>
                  <td class="blue">{{ $lab->name }}</td>
                  <td class="blue">{{ $lab->no_labs }}</td>
                  <td class="blue">{{ $lab->translated_name }}</td>
                  <td class="blue">{{ $lab->student_capacity }}</td>
                  <td class="blue">{{ $lab->size }}</td>
                  <td class="blue">{{ $lab->description }}</td>
                  <td class="blue">{{ $lab->video_url }}</td>
                  <td class="blue">{{ $lab->panorama_url }}</td>
                  <!-- <td class="blue"> {{ $lab->status }}</td> -->
                  <td>
                     <div class="row">
    <div class="col-4">
        <a wire:click="editLab({{ $lab->id }})" href="javascript:void(0)" class="light-blue ms-2">
            <i class="material-icons-outlined">
                <img class="header-logo d-none d-lg-inline-block pointer" style="max-width: 15px; max-height: 15px;"
                     src="{{ asset('assets/icons/' . 'edit-blue.svg') }}" alt="Edit"/>
            </i>
        </a>
    </div>
    <div class="col-4">
        <a wire:click="delete({{ $lab->id }})" href="javascript:void(0)" class="red ms-2">
            <i class="material-icons-outlined">
                <img class="header-logo d-none d-lg-inline-block pointer" style="max-width: 15px; max-height: 15px;"
                     src="{{ asset('assets/icons/' . 'delete-red.svg') }}" alt="Delete"/>
            </i>
        </a>
    </div>
</div>
</td>
                  <!-- Add other specific attributes as needed -->
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>

 
<x-general.loading message="Processing..."/>
<x-jet-modal wire:model="isModalOpen">
    
     <div  class="w-full md:w-3/4 lg:w-1/2 xl:w-2/3 mx-auto"> <!-- Adjust width as needed -->
    
   <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
  
      <x-slot name="title">
         @lang('Update Lab Record')
      </x-slot>
      <!-- <div class="modal-body"> -->
      <!-- Livewire component rendering the slots -->
      
      <div class="row mt-2">
         <div class="col-md-6">
            <div class="form-floating w-100">
               <select wire:model.defer="edit_item.university_lab_category_id"
                  class="form-select input-field">
                  <option value="">@lang('Lab Category')</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
               </select>
               <label for="floatingSelectGrid">@lang('Lab Category')</label>
            </div>
         </div>
         <div class="col-md-6 mobile-marg-2">
            <div class="form-floating w-100">
               <input type="number" wire:model.defer="edit_item.no_labs"
                  class="form-control input-field"
                  placeholder="@lang('Number of Labs')">
               <label for="floatingInput">@lang('Number of Labs')</label>
            </div>
         </div>
      </div>
      @for($i = 0; $i<$edit_details_in_langs; $i++)
      <div class="row mt-3">
         <div @class(["mobile-marg-2 col-md-8","col-md-12"=>($i == 0)])>
         <div class="form-floating w-100">
            <input wire:model.defer="names.{{$i}}" class="form-control input-field"
               placeholder="@lang('Lab Name')">
            <label for="floatingInput">@lang('Lab Name')</label>
         </div>
      </div>
      @if($i > 0)
      <div class="col-md-4">
         <div class="form-floating w-100">
            <select wire:model.defer="translations.{{$i}}" class="form-select input-field">
               <option value="">@lang('Select Language')</option>
               @foreach($languages as $language)
               <option
               value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
               @endforeach
            </select>
            <label for="floatingSelectGrid">@lang('Select Language') </label>
         </div>
      </div>
      @endif
   </div>
   <div class="row mt-3">
      <div class="mobile-marg-2 col-md-12">
         <div class="form-floating w-100">
            <textarea wire:model.defer="descriptions.{{$i}}" class="form-control input-textarea"
               placeholder="@lang('Describe the lab, including some technical specifications and detail about usage and benefits')."
               rows="3"></textarea>
            <label for="floatingInput">@lang('Describe the lab')</label>
         </div>
      </div>
   </div>
   <div class="w-100 px-5 mt-4">
      <hr>
   </div>
   @endfor
   <div class=" text-place-end mt-4 mb-4">
      <button class="m-0 button-no-bg" wire:click="addEditDetailsInOtherLanguage" type="button">
      @lang('+ Add Lab Information into different language')
      </button>
   </div>
   <div class="row mt-4">
      <div class="col-12">
         <div class="h6 blue">
            @lang('The average number of students can all labs handle at one time?')
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-4 mt-3">
         <div class="form-floating w-100">
            <div class="form-floating w-100">
               <input type="number" wire:model.defer="edit_item.student_capacity"
                  class="form-control input-field"
                  placeholder="@lang('No of Std')">
               <label for="floatingInput">@lang('No of Std')</label>
            </div>
         </div>
      </div>
      <div class="col-md-3 mt-3">
         <div class="form-floating w-100">
            <input type="number" wire:model.defer="edit_item.size"
               class="form-control input-field"
               placeholder="@lang('Lab size in m²')">
            <label for="floatingInput">@lang('Lab size in m²')</label>
         </div>
      </div>
      <div class="col-md-5 mt-3">
         <div class="form-floating w-100">
            <input type="date" wire:model.defer="edit_item.created_date" class="form-control input-field dat"
               placeholder="@lang('Created or Renewed Date')">
            <label for="floatingInput">@lang('Created or Renewed Date')</label>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6 mt-3">
         <div class="form-floating w-100">
            <div class="form-floating w-100">
               <input type="text" wire:model.defer="edit_item.video_url"
                  class="form-control input-field"
                  placeholder="@lang('Video Url')">
               <label for="floatingInput">@lang('Video Url')</label>
            </div>
         </div>
      </div>
      <div class="col-md-6 mt-3">
         <div class="form-floating w-100">
            <input type="text" wire:model.lazy="edit_item.panorama_url"
               class="form-control input-field"
               placeholder="@lang('360 Panorama Url')">
            <label for="floatingInput">@lang('360 Panorama Url')</label>
         </div>
      </div>
   </div>
   <div class="col-md-12 mt-3">
      <a href="javascript:void(0)" wire:click="update()" class="btn btn-primary">@lang('Update Lab')</a>
   </div>
  
   <!-- </div> -->

<x-general.loading message="Processing..."/>

</x-jet-modal>
@push(AppConst::PUSH_CSS)
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/confirmDate/confirmDate.css">

    <style type="text/css">
        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 1000px !important;
                margin: 1.75rem auto;
            }
        }
    </style>
@endpush

@push(AppConst::PUSH_JS)

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        @if(app()->getLocale() != 'en')
            <script src="https://npmcdn.com/flatpickr/dist/l10n/{{app()->getLocale()}}.js"></script>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/confirmDate/confirmDate.js"></script>
        <script>
    document.addEventListener('livewire:load', function () {
      Livewire.on('setDate', () => {
           addPickerToElement($('.dat'));
       });
      addPickerToElement($('.dat'));
      $('.file-drag').removeClass('file-drag');
        
    });

    function addPickerToElement(el, min_date = "today") {
        return flatpickr(el, {
            locale: "{{app()->getLocale()}}",
            //enableTime: true,
            allowInput: true,
            maxDate: 'today',
            // plugins: [new confirmDatePlugin({})],
            // confirmIcon: ' <i class="fa-solid fa-circle-check"></i>',
            // confirmText: "OK",
            // showAlways: false,
        });
    }
</script>

@endpush

</div>