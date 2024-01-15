<div>
   <x-general.university-facility-page-title sub-title="University Housing"/>
   <div class="card mt-3">
      <div class="card-body">
         <div class="blue">@lang('Add new University Housing')</div>
         <x-general.status-alert/>
         <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
         <div>
            @php
            /**
            * @var \App\Models\University\UniversityHousingCategory[] $categories
            * @var \App\Models\University\UniversityHousingLocationType[] $location_types
            * @var \App\Models\University\Facility\UniversityFacilityHousing $housing_information
            **/
            @endphp
            <div class="row mt-2">
               <div class="col-md-4">
                  <div class="form-floating w-100">
                     <select wire:model.defer="housing_information.category_id"
                        class="form-select input-field" aria-label="">
                        <option value="">@lang('Housing Category')</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                     </select>
                     <label>@lang('Housing Category')</label>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-floating w-100">
                     <select wire:model.defer="housing_information.location_type_id"
                        class="form-select input-field">
                        <option value="">@lang('Where it Located')</option>
                        @foreach($location_types as $location_type)
                        <option value="{{$location_type->id}}">{{$location_type->name}}</option>
                        @endforeach
                     </select>
                     <label for="floatingSelectGrid">@lang('Where it Located')</label>
                  </div>
               </div>
               <div class="col-md-4 mobile-marg-2">
                  <div class="form-floating w-100">
                     <input type="number" wire:model.defer="housing_information.number_of_rooms"
                        class="form-control input-field"
                        placeholder="@lang('Number of Rooms')">
                     <label for="floatingInput">@lang('Number of Rooms')</label>
                  </div>
               </div>
            </div>
            @for($i = 0; $i<$details_in_langs; $i++)
            <div class="row mt-3">
               <div @class(["mobile-marg-2 col-md-8","col-md-12"=>($i == 0)])>
               <div class="form-floating w-100">
                  <input wire:model.defer="names.{{$i}}" class="form-control input-field"
                     placeholder="@lang('Housing Name')">
                  <label for="floatingInput">@lang('Housing Name')</label>
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
                     placeholder="@lang('Describe the housing, including some technical specifications and detail about usage and benefits')."
                     rows="3"></textarea>
                  <label for="floatingInput">@lang('Description')</label>
               </div>
            </div>
         </div>
         <div class="w-100 px-5 mt-4">
            <hr>
         </div>
         @endfor
         <div class=" text-place-end mt-3">
            <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
            @lang('+ Add Housing Information into different language')
            </button>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <div class="h6 blue">
                  @lang('More detail about the Housing ')
               </div>
            </div>
         </div>
         @php
         /**
         * @var \App\Models\University\UniversityHousingServices[] $services
         **/
         @endphp
         <div class="row">
            <div class="col-md-12">
               <div class="d-md-flex  mt-3 justify-content-between align-items-center">
                  @foreach($services as $service)
                  <div class="col d-flex align-items-center">
                     <input wire:model.defer="selected_services" type="checkbox" value="{{$service->id}}" class="mt-0 mb-0">
                     <span class="h6 blue mb-0 ms-1">{{$service->name}}</span>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12 mt-3">
               <div class="form-floating w-100">
                  <input wire:model.defer="housing_information.location_link"
                     class="form-control input-field"
                     placeholder="@lang('Location Link')">
                  <label for="floatingInput">@lang('Location Link')</label>
               </div>
            </div>
         </div>
         <div class="row  mt-3">
            <div class="col-md-4">
               <label>@lang('Housing Fees and Conditions')</label>
            </div>
            <div class="col-md-3">
               <div class="form-floating w-100">
                  <input type="number" wire:model.defer="housing_information.charges"
                     class="form-control input-field"
                     placeholder="@lang('Fee')">
                  <label for="floatingInput">@lang('Fee')</label>
               </div>
            </div>
            <div class="col-md-5">
               <div class="d-flex justify-content-between">
                  <div>
                     <input wire:model.defer="housing_information.charges_type"  value="0" type="checkbox" class="mt-0 mb-0">
                     <span class="h6 blue mb-0 ms-1">@lang('in advance')</span>
                  </div>
                  <div>
                     <input wire:model.defer="housing_information.charges_type"  value="1" type="checkbox"  class="mt-0 mb-0">
                     <span class="h6 blue mb-0 ms-1">@lang('instalments')</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-4">
               <label>@lang('Housing can accommodate upto')</label>
            </div>
            <div class="col-md-8">
               <div class="form-floating w-100">
                  <input type="number" wire:model.defer="housing_information.student_capacity"
                     class="form-control input-field"
                     placeholder="@lang('Students')">
                  <label for="floatingInput">@lang('Students')</label>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6 mt-3">
               <div class="form-floating w-100">
                  <div class="form-floating w-100">
                     <input type="text" wire:model.defer="housing_information.video_url"
                        class="form-control input-field"
                        placeholder="@lang('Video Url')">
                     <label for="floatingInput">@lang('Video Url')</label>
                  </div>
               </div>
            </div>
            <div class="col-md-6 mt-3">
               <div class="form-floating w-100">
                  <input type="text" wire:model.lazy="housing_information.panorama_url"
                     class="form-control input-field"
                     placeholder="@lang('360 Panorama Url')">
                  <label for="floatingInput">@lang('360 Panorama Url')</label>
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
* @var \App\Models\University\Facility\UniversityFacilityHousing[] $dataCollection
* @var \App\Models\University\Facility\UniversityFacilityHousing $selected_item
**/
@endphp
<!--    <div class="h4 blue mt-3" id="upload-images">@lang('Housings Detail and Gallery')
   @include('about-icon')</div>
   <div class="row align-items-baseline">
       <div class="col-md-8">
           <select wire:model="item_id" wire:change="loadAlbumData" class="input-field form-control">
               <option value="">@lang('Select Housing')</option>
               @foreach($dataCollection ??[] as $album)
                   <option value="{{$album->id}}">{{$album->name}}</option>
               @endforeach
           </select>
       </div>
   </div>
   @if(!empty($selected_item))
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
       <div class="col-md-6 rounder-0-5-top bg-blue px-4 p-2 mt-4 h4 mb-0">@lang('Galleries')</div>
       <div class="bg-transparent card border-none">
           <div class="bg-light-blue p-2 px-4 d-md-flex justify-content-between align-items-center">
               <div class=""><a href="#upload-images" class="white">@lang('Upload More Images') </a></div>
               <div class="col-md-4 mobile-marg-2">
                   <select wire:model="item_id" wire:change="loadAlbumData" class="input-field form-control">
                       <option value="">@lang('Select Housing')</option>
                       @foreach($dataCollection ??[] as $media_album)
                           <option value="{{$media_album->id}}">{{$media_album->name}}</option>
                       @endforeach
                   </select>
               </div>
           </div>
           <div class="card-body">
               <div class="w-100">
                   <div class="row">
                       <div class="d-md-flex justify-content-between mb-3">
                           <div class="h5 blue">{{$selected_item->translated_name}}</div>
                           <div class="d-flex">
                               <div class="me-2"><a href="{{$selected_item->video_url ?: "javascript:void(0)"}}"
                                                    target="_blank">
                                       <img src="{{AppConst::ICONS}}/sm-icons/video.svg" width="30px"></a></div>
                               <div class=""><a href="{{$selected_item->panorama_url ?: "javascript:void(0)"}}"
                                                target="_blank"><img src="{{AppConst::ICONS}}/sm-icons/360.svg"
                                                                     width="30px"></a></div>
                           </div>
                       </div>
                       <div class="paragraph-style2 blue">
                           {!! $selected_item->description  !!}
                       </div>
                       <div class="blue mt-3">
                           @lang('Housing can accommodate upto')&nbsp;{{$selected_item->student_capacity}}&nbsp;@lang('students')
                       </div>
                       <div class="w-100 mt-4 px-4">
                           <hr>
                       </div>
                       <div class="d-md-flex h6 blue justify-content-between">
                           <div
                               class="">@lang('Created on') {{$selected_item->created_at->toDayDateTimeString()}}</div>
                           <div class="">@lang('By') {{$selected_item?->createdBy?->name ?: "---"}}</div>
                           <div class="">
                               @if($selected_item->is_enabled)
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
                       {{--                        @if(count($selected_images))--}}
                       <div class="d-md-flex justify-content-end">
                           <div><a href="" wire:click.prevent="deleteSelected"
                                   class="h6 red ">@lang('Delete Selected Images')</a></div>
                       </div>
                       {{--                        @endif--}}
                   </div>
               </div>
           </div>
       </div>
   @else
       <div class="card mt-4">
           <div class="card-body">
               <div class="w-100">
                   <div class="row">
                       <div class="col-12">
                           <div class="h5 text-center blue d-flex justify-content-center">
                               <i class="fa-solid fa-circle-exclamation"></i>
                               &nbsp;
                               @lang('Select facility to view or update galleries')
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   @endif
   -->
@include('livewire.university-facilities.common-media')
<div class="card bg-transparent mt-4">
   <div class="card-body">
      <div class="h4 blue">@lang('Houses')</div>
      <div class="w-100 px-4 mt-3">
         <hr>
      </div>
      <div>
         <table class="table table-responsive">
            <thead>
               <tr class="blue">
                  <th>Category</th>
                  <th>Name</th>
                  <th>Charges</th>
                  <th>Currency</th>
                  <th>Term</th>
                  <th>Location Type</th>
                  <th>Location Link</th>
                  <th>No of Rooms</th>
                  <th>Student Capacity</th>
                  <!-- <th>Charges Type</th> -->
                  <th>Video URL</th>
                  <th>Panorama URL</th>
                  <th>Status</th>
                  <th>Action</th>
                  <!-- Add other table headers as needed -->
               </tr>
            </thead>
            <tbody>
               @foreach($houses as $data)
               <tr class="blue">
                  <td>{{ $data->housingCategory?->name }}</td>
                  <td>{{ $data['name'] }}</td>
                  <td>{{ $data['charges'] }}</td>
                  <td>{{ $data->currency?->name }}</td>
                  <td>{{ $data->housingTerm?->name }}</td>
                  <td>{{ $data->housingLocation?->name }}</td>
                  <td>{{ $data['location_link'] }}</td>
                  <td>{{ $data['number_of_rooms'] }}</td>
                  <td>{{ $data['student_capacity'] }}</td>
                  <!-- <td>{{ $data['charges_type'] }}</td> -->
                  <td>{{ $data['video_url'] }}</td>
                  <td>{{ $data['panorama_url'] }}</td>
                  <td>{{ $data['status'] }}</td>
                  <td><a wire:click="editHouse({{ $data->id }})" href="javascript:void(0)" class="light-blue ms-2">Edit</a>
                     <a wire:click="delete({{ $data->id }})" href="javascript:void(0)" class="red ms-2">Delete</a>
                  </td>
                  <!-- Add other specific attributes as needed -->
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
<x-jet-modal wire:model="isModalOpen">
   <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
   <x-slot name="title">
      @lang('Update Housing Record')
   </x-slot>
   <!-- <div class="modal-body"> -->
   <!-- Livewire component rendering the slots -->
   <div class="row mt-2">
      <div class="col-md-12 mt-3">
         <div class="form-floating w-100">
            <select wire:model.defer="edit_item.category_id"
               class="form-select input-field" aria-label="">
               <option value="">@lang('Housing Category')</option>
               @foreach($categories as $category)
               <option value="{{$category->id}}">{{$category->name}}</option>
               @endforeach
            </select>
            <label>@lang('Housing Category')</label>
         </div>
      </div>
      <div class="col-md-12 mt-3">
         <div class="form-floating w-100">
            <select wire:model.defer="edit_item.location_type_id"
               class="form-select input-field">
               <option value="">@lang('Where it Located')</option>
               @foreach($location_types as $location_type)
               <option value="{{$location_type->id}}">{{$location_type->name}}</option>
               @endforeach
            </select>
            <label for="floatingSelectGrid">@lang('Where it Located')</label>
         </div>
      </div>
      <div class="col-md-12 mt-3 mobile-marg-2">
         <div class="form-floating w-100">
            <input type="number" wire:model.defer="edit_item.number_of_rooms"
               class="form-control input-field"
               placeholder="@lang('Number of Rooms')">
            <label for="floatingInput">@lang('Number of Rooms')</label>
         </div>
      </div>
   </div>
   @for($i = 0; $i<$edit_details_in_langs; $i++)
   <div class="row mt-3">
      <div @class(["mobile-marg-2 col-md-8","col-md-12"=>($i == 0)])>
      <div class="form-floating w-100">
         <input wire:model.defer="names.{{$i}}" class="form-control input-field"
            placeholder="@lang('Housing Name')">
         <label for="floatingInput">@lang('Housing Name')</label>
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
               placeholder="@lang('Describe the housing, including some technical specifications and detail about usage and benefits')."
               rows="3"></textarea>
            <label for="floatingInput">@lang('Description')</label>
         </div>
      </div>
   </div>
   <div class="w-100 px-5 mt-4">
      <hr>
   </div>
   @endfor
   <div class=" text-place-end mt-3">
      <button class="m-0 button-no-bg" wire:click="addEditDetailsInOtherLanguage" type="button">
      @lang('+ Add Housing Information into different language')
      </button>
   </div>
   <div class="row mt-3">
      <div class="col-12">
         <div class="h6 blue">
            @lang('More detail about the Housing ')
         </div>
      </div>
   </div>
   @php
   /**
   * @var \App\Models\University\UniversityHousingServices[] $services
   **/
   @endphp
   <div class="row">
      <div class="col-md-12">
         <div class="d-md-flex  mt-3 justify-content-between align-items-center">
            @foreach($services as $service)
            <div class="col d-flex align-items-center">
               <input wire:model.defer="selected_services" type="checkbox" value="{{$service->id}}" class="mt-0 mb-0">
               <span class="h6 blue mb-0 ms-1">{{$service->name}}</span>
            </div>
            @endforeach
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 mt-3">
         <div class="form-floating w-100">
            <input wire:model.defer="edit_item.location_link"
               class="form-control input-field"
               placeholder="@lang('Location Link')">
            <label for="floatingInput">@lang('Location Link')</label>
         </div>
      </div>
   </div>
   <div class="row  mt-3">
      <div class="col-md-12">
         <label>@lang('Housing Fees and Conditions')</label>
      </div>
      <div class="col-md-12">
         <div class="form-floating w-100">
            <input type="number" wire:model.defer="edit_item.charges"
               class="form-control input-field"
               placeholder="@lang('Fee')">
            <label for="floatingInput">@lang('Fee')</label>
         </div>
      </div>
      <div class="col-md-12">
         <div class="d-flex justify-content-between">
            <div>
               <input wire:model.defer="edit_item.charges_type"  value="0" type="checkbox" class="mt-0 mb-0">
               <span class="h6 blue mb-0 ms-1">@lang('in advance')</span>
            </div>
            <div>
               <input wire:model.defer="edit_item.charges_type"  value="1" type="checkbox"  class="mt-0 mb-0">
               <span class="h6 blue mb-0 ms-1">@lang('instalments')</span>
            </div>
         </div>
      </div>
   </div>
   <div class="row mt-3">
      <div class="col-md-12">
         <label>@lang('Housing can accommodate upto')</label>
      </div>
      <div class="col-md-12">
         <div class="form-floating w-100">
            <input type="number" wire:model.defer="edit_item.student_capacity"
               class="form-control input-field"
               placeholder="@lang('Students')">
            <label for="floatingInput">@lang('Students')</label>
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
      <a href="javascript:void(0)" wire:click="update()" class="btn btn-primary">@lang('Update '){{ $sub_title}}</a>
   </div>
   <!-- </div> -->
</x-jet-modal>
<x-general.loading message="Processing..."/>
</div>