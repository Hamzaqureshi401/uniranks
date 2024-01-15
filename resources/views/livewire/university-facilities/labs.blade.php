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
            <div class="col-md-6  card bg-body-color mt-3" style="background-color: #eff1f3;">
               <div class="card-body">
                  <div class="h6 blue">Lab Images</div>
                  <div class="upload-container file-upload d-flex justify-content-center ">
                     <x-elements.file-uploader multiple="true" wire:model="lab_information.image_s" accept="image/*"/>
                  <div class="row mt-2">
                     <!-- <div class="h6 red">
                        @lang('* Image Format must be .JPG, .PNG, .SVG or .WEBP')
                     </div> -->
                     <x-jet-input-error for="photos" class="mt-2"/>
                  </div>
                     <!-- <i class="fa-solid fa-cloud-arrow-up light-blue" aria-hidden="true"></i> -->
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
<div>
<div class="col-md-6 rounder-0-5-top bg-blue px-4 p-2 mt-4 h4 mb-0">@lang('Labs Detail and Gallery
   ')
</div>
<div class="bg-transparent card border-none">
   <div class="bg-light-blue p-2 px-4 d-md-flex justify-content-between align-items-center">
      <div class=""><a href="#upload-images" class="white">@lang('Upload More Images') </a></div>
      <div class="col-md-4 mobile-marg-2">
         <select wire:model="item_id" wire:change="loadAlbumData" class="input-field form-control">
            <option value="">@lang('Select Lab')</option>
            @foreach($dataCollection ??[] as $media_album)
            <option value="{{$media_album->id}}">{{$media_album->name}}</option>
            @endforeach
         </select>
      </div>
   </div>
   <div class="card-body">
      <div class="w-100">
         <div class="row">
            @if(!empty($selected_item))
            <div class="d-md-flex justify-content-between mb-3 align-items-center">
               <div class="h5 blue mb-0">Lab Information</div>
               <div class="col-md-6 mobile-marg d-flex justify-content-between">
                  <div class="col-4 align-items-center d-flex justify-content-between">
                     <div class="col-4"></div>
                     <div class="col-4"><a class="mr-25" href="{{$selected_item?->video_url ?: "javascript:void(0)"}}" target="_blank">
                        <img src="{{AppConst::ICONS}}/sm-icons/video.svg" width="30px"></a>
                     </div>
                     <div class="col-4"><a 
                        href="{{$selected_item?->panorama_url ?: "javascript:void(0)"}}" target="_blank"><img src="{{AppConst::ICONS}}/sm-icons/360.svg" width="30px"></a>
                     </div>
                  </div>
                  <div class="col-8">
                     <select wire:model="lang_key" wire:change="loaddescription" class="input-field form-control">
                        <option value="">@lang('Select Language')</option>
                        @if(!empty($selected_item))
                        @foreach($this->selected_item->getTranslations()['translated_name'] ?? [] as $key => $translation)
                        <option value="{{$key}}">@lang('language('){{$translation}})</option>
                        @endforeach
                        @endif
                     </select>
                  </div>
               </div>
            </div>
            
           <!--  <div class="d-md-flex justify-content-between mb-3">
               <div class="h5 blue">{{$selected_item?->translated_name ?? ''}}</div>
               <div class="d-flex">
                  <div class="me-2"><a href="{{$selected_item?->video_url ?: "javascript:void(0)"}}" target="_blank">
                     <img src="{{AppConst::ICONS}}/sm-icons/video.svg" width="30px"></a>
                  </div>
                  <div class=""><a  href="{{$selected_item?->panorama_url ?: "javascript:void(0)"}}" target="_blank"><img src="{{AppConst::ICONS}}/sm-icons/360.svg" width="30px"></a></div>
               </div>
            </div> -->
            
            <div class="paragraph-style2 blue">
                @if(!empty($translated_description))
                {{ $translated_description }}
                @else
               {!! $selected_item?->description  !!}

               @endif
            </div>
           <div class="blue mt-3">
    @lang('The') {{ $selected_item?->name }} 
    ({{ __('Category') }}: {{ $selected_item?->universityLabCategory->name }}) 
    {{ __('consists of') }} {{ $selected_item?->no_labs }} {{ __('labs, each with a size of') }} {{ $selected_item?->size }} {{ __('square meters, capable of accommodating up to') }} {{ $selected_item?->student_capacity }} {{ __('students simultaneously. The lab was renewed on') }} 
    {{ $selected_item?->created_date?->isoFormat('MMMM D, YYYY') }}.
    <a href="{{ $selected_item?->penorama_url }}" target="_blank" class="light-blue">{{ __('View Panorama') }}</a>
    <a href="{{ $selected_item?->video_url }}" target="_blank" class="light-blue">{{ __('View Video') }}</a>
</div>

            
            <div class="card mt-4" id="upload-images-div">
               <div class="card-body" id="upload-images-card">
                  <x-elements.file-uploader multiple="true" wire:model="photos" accept="image/*"/>
                  <div class="row mt-2">
                     <div class="h6 red">
                        @lang('* Image Format must be .JPG, .PNG, .SVG or .WEBP')
                     </div>
                     <x-jet-input-error for="photos" class="mt-2"/>
                  </div>
                  @php
                  /**
                  * @var \Livewire\TemporaryUploadedFile $photo
                  */
                  @endphp
                  @if(!empty($photos))
                  <div class="m-4">
                     <hr>
                  </div>
                  @foreach(collect($photos)->chunk(3) as $chunk)
                  <div class="row mt-3">
                     @foreach($chunk ?? [] as $key => $photo)
                     <div class="col-md-4 mt-2 mt-md-0">
                        <div class="w-100 d-flex align-items-center">
                           <img src="{{$photo->temporaryUrl()}}" style="max-height: 200px; max-width: 80%">
                           <div class="w-70">
                              {{--                                            <label class="mx-2 blue">{{$photo->getClientOriginalName()}}</label>--}}
                              <a href="javascript:void(0)" class="red ms-1 text-decoration-none"
                                 wire:click="deleteTemp('{{$key}}')">
                              <i class=" fa-regular fa-trash-can"
                                 style="font-size: 1.3rem; cursor: pointer"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  @endforeach
                  <div class="row mt-4">
                     <div class="col-md-6 offset-6 d-flex justify-content-md-end">
                        <button wire:click="savePhotos"
                           class="button-light-blue button-lg mobile-button w-35">@lang('Upload')</button>
                     </div>
                  </div>
                  @endif
               </div>
            </div>
            @endif
            <div class="w-100 mt-4 px-4">
               <hr>
            </div>
            @if(!empty($selected_item))
            <div class="d-md-flex h6 blue justify-content-between">
               <div
                  class="">@lang('Created on') {{$selected_item?->created_at->toDayDateTimeString()}}</div>
               <div class="">@lang('By') {{$selected_item?->createdBy?->name ?: "---"}}</div>
               <div class="">
                  @if($selected_item?->is_enabled)
                  <a href="" wire:click.prevent="disable" class="red ">@lang('Disable')</a>
                  @else
                  <a href="" wire:click.prevent="enable" class="green ">@lang('Enable')</a>
                  @endif
               </div>
               <div class=""><a href="" wire:click.prevent="edit" class="blue">@lang('Edit detail')</a>
               </div>
               <div class=""><a href="" class="red"
                  wire:click.prevent="deleteAlbum">@lang('Delete')</a></div>
            </div>
            <div id="gallery" class="mt-3">
               
               @forelse($selected_item?->media?->chunk(6) as $images_chunk)
               <div class="row">
                  @foreach($images_chunk as $image)
                  <div class="col-md-2">
                     <img src="{{$image->image_url}}" style="width: 100%"/>
                     <input wire:model.defer="selected_images" value="{{ $image->id }}"
                        class="image-checkbox"
                        type="checkbox">
                  </div>
                  @endforeach
               </div>
               @empty
               <div class="h5 text-center py-4">
                  @lang('No image uploaded yet!')
               </div>
               
               @endforelse
            </div>
            <!--                        @if(count($selected_images))
             
            <div class="d-md-flex justify-content-end">
               <div><a href="" wire:click.prevent="deleteSelected"
                  class="h6 red ">@lang('Delete Selected Images')</a></div>
            </div>
            
                                   @endif -->
                                   @endif
         </div>
      </div>
   </div>
</div>
</div>
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
                     <a wire:click="editLab({{ $lab->id }})" href="javascript:void(0)" class="light-blue ms-2">Edit</a>
                     <a wire:click="delete({{ $lab->id }})" href="javascript:void(0)" class="red ms-2">Delete</a>
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
<!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        @if(app()->getLocale() != 'en')
            <script src="https://npmcdn.com/flatpickr/dist/l10n/{{app()->getLocale()}}.js"></script>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/confirmDate/confirmDate.js"></script>


<script type="text/javascript">
    function addDatePicker(el) {
        return flatpickr(el, {
            locale: "{{app()->getLocale()}}",
            enableTime: false,
            allowInput: true,
            maxDate: 'today',
            plugins: [new confirmDatePlugin({})],
            
            confirmIcon: '<i class="fa-solid fa-circle-check"></i>',
            confirmText: "OK", // Use Flatpickr's confirmText option
            showAlways: false,
        });
    }

    document.addEventListener('livewire:load', function () {
        $('.file-drag').removeClass('file-drag');
    });

    $('.file-drag').removeClass('file-drag');
</script> -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        @if(app()->getLocale() != 'en')
            <script src="https://npmcdn.com/flatpickr/dist/l10n/{{app()->getLocale()}}.js"></script>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/confirmDate/confirmDate.js"></script>
        <script>
    document.addEventListener('livewire:load', function () {
      Livewire.on('setDate', () => {
           console.log(123);
           addPickerToElement($('.dat'));
       });
      addPickerToElement($('.dat'));
        
    });

    function addPickerToElement(el, min_date = "today") {
        return flatpickr(el, {
            locale: "{{app()->getLocale()}}",
            enableTime: true,
            allowInput: true,
            maxDate: 'today',
            plugins: [new confirmDatePlugin({})],
            confirmIcon: ' <i class="fa-solid fa-circle-check"></i>',
            confirmText: "OK",
            showAlways: false,
        });
    }
</script>

@endpush

</div>