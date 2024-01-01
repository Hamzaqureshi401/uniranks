<div>
    <x-general.university-media-page-title sub-title="University Photo Galleries" gallery-menu="true"/>
    <livewire:media.create-media-album-form content-type="{{\App\Models\Multimedia\Media::TYPE_IMAGE}}"/>
    @php
        /**
        * @var \App\Models\Multimedia\MediaAlbum[] $albums
        * @var \App\Models\Multimedia\MediaAlbum $selected_album
        **/
    @endphp
    <div class="h4 blue mt-3" id="upload-images">@lang('Upload Materials to Albums')
    @include('about-icon')</div>
    <div class="row align-items-baseline">
        <div class="col-md-8">
            <select wire:model="album_id" wire:change="loadAlbumData" class="input-field form-control">
                <option value="">@lang('Select Album')</option>
                @foreach($albums ??[] as $album)
                    <option value="{{$album->id}}">{{$album->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if(!empty($selected_album))
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
                    <select wire:model="album_id" wire:change="loadAlbumData" class="input-field form-control">
                        <option value="">@lang('Select Album')</option>
                        @foreach($albums ??[] as $media_album)
                            <option value="{{$media_album->id}}">{{$media_album->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="w-100">
                    <div class="row">
                        <div class="d-md-flex justify-content-between mb-3">
                            <div class="h5 blue">{{$selected_album->translated_name}}</div>
                        </div>
                        <div class="paragraph-style2 blue">
                            {{$selected_album->description}}
                        </div>
                        <div class="w-100 mt-4 px-4">
                            <hr>
                        </div>
                        <div class="d-md-flex h6 blue justify-content-between">
                            <div
                                class="">@lang('Created on') {{$selected_album->created_at->toDayDateTimeString()}}</div>
                            <div class="">@lang('By') {{$selected_album?->createdByUser?->name ?: "---"}}</div>
                            <div class="">
                                @if($selected_album->is_enabled)
                                <a href="" wire:click.prevent="disable" class="red ">@lang('Disable')</a>
                                @else
                                    <a href="" wire:click.prevent="enable" class="green ">@lang('Enable')</a>
                                @endif
                            </div>
                            <div class=""><a href="" class="red"
                                             wire:click.prevent="deleteAlbum">@lang('Delete Album')</a></div>
                        </div>
                        <div id="gallery" class="mt-3">
                            @forelse($selected_album?->media->chunk(6) as $images_chunk)
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
                                @lang('Select Album to Upload or View Images')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <x-general.loading message="Please Wait..."/>
</div>
