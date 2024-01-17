<div>
   <div class="col-md-6 rounder-0-5-top bg-blue px-4 p-2 mt-4 h4 mb-0">{{ $title }}
   </div>
   <div class="bg-transparent card border-none">
      <div class="bg-light-blue p-2 px-4 d-md-flex justify-content-between align-items-center">
         <div class=""><a href="#upload-images" class="white">@lang('Upload More Images') </a></div>
         <div class="col-md-4 mobile-marg-2">
            <select wire:model="item_id" wire:change="loadAlbumData" class="input-field form-control">
               <option value="">@lang('Select '){{ $sub_title }}</option>
               @foreach($dataCollection ??[] as $media_album)
               <option value="{{$media_album->id}}">{{$media_album->name ?? $media_album->title}}</option>
               @endforeach
            </select>
         </div>
      </div>
      <div class="card-body">
         <div class="w-100">
            <div class="row">
               @if(!empty($selected_item))
               <div class="d-md-flex justify-content-between mb-3 align-items-center">
                  <div class="h5 blue mb-0">{{ $selected_item->name ?? $selected_item->title }} </div>
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
                        <!-- <option value="">@lang('Select Language')</option> -->
                        @if(!empty($selected_item))
                        @foreach($this->selected_item->getTranslations()['translated_name'] ?? [] as $key => $translation)
                        <option value="{{$key}}">{{ $languages->where('code' , $key)->first()->native_name ?? ''}}</option>
                        @endforeach
                        @endif
                     </select>
                     </div>
                  </div>
               </div>
               <div class="paragraph-style2 blue">
                  @if(!empty($translated_description))
                  {{ $translated_description }}
                  @else
                  {!! $selected_item?->description  !!}
                  @endif
               </div>
               <div class="blue mt-3">
                {{ $Info }}
    
                 
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
               <!-- <div class="w-100 mt-4 px-4">
                  <hr>
               </div> -->
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
               @endif
            </div>
         </div>
      </div>
   </div>
</div>