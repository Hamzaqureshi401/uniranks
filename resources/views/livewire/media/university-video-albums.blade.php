<div>
    <x-general.university-media-page-title sub-title="University Video Galleries" gallery-menu="true" />
    <livewire:media.create-media-album-form content-type="{{\App\Models\Multimedia\Media::TYPE_VIDEO}}" />
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
            <div class="card-body">
                <div class="w-100">
                    <div class="">
                        <div class="paragraph-style2 blue">@lang('Add video URL and specify Video spoken or content Language, in case a video with translation please upload first the natively spoken language without the translation then upload another copy of the video with the translated language').</div>
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <div class="form-floating w-100">
                                    <input wire:model.defer="title" class="form-control input-field" id="floatingInput" placeholder="@lang('Title')">
                                    <label for="floatingInput">@lang('Title')</label>
                                </div>
                                <x-general.input-error for-input="title" />
                            </div>
                            <div class="col-md-4 mobile-marg-2">
                                <div class="form-floating w-100">
                                    <select wire:model.defer="language_id" class="form-select input-field"
                                            id="floatingSelectGrid" aria-label="">
                                        <option value="">@lang('Select Language')</option>
                                        @foreach($languages as $language)
                                            <option value="{{$language->id}}" >{{$language->native_name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">@lang('Select Language')</label>
                                </div>
                                <x-general.input-error for-input="language_id" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-floating w-100">
                                    <input wire:model.defer="url" class="form-control input-field" id="floatingInput" placeholder="@lang('Video Link')">
                                    <label for="floatingInput">@lang('Video Link')</label>
                                </div>
                                <x-general.input-error for-input="url" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class=" text-place-end mt-3 mb-3">
                                    <button class="button-no-bg" type="button" wire:click="save">@lang('+ Add Link')</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <x-general.loading message="Saving" wire:target="save"/>

        <div class="col-md-6 rounder-0-5-top bg-blue px-4 p-2 mt-4 h4 mb-0">@lang('Galleries')</div>
        <div class="bg-transparent card border-none">
            <div class="bg-light-blue p-2 px-4 d-md-flex justify-content-between align-items-center">
                <div class=""><a href="#upload-images" class="white">@lang('Add More Videos') </a></div>
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
                            <div class="">@lang('Created on') {{$selected_album->created_at->toDayDateTimeString()}}</div>
                            <div class="">@lang('By') {{$selected_album?->createdByUser?->name ?: "---"}}</div>
                            <div class=""> @if($selected_album->is_enabled)
                                            <a href="javascript:void(0)" wire:click="disable" class="red ">@lang('Disable')</a>
                                            @else
                                                <a href="javascript:void(0)" wire:click="enable" class="green ">@lang('Enable')</a>
                                            @endif
                            </div>
                            <div class=""><a href="" class="red"  wire:click.prevent="deleteAlbum">@lang('Delete Album')</a></div>
                        </div>
                        <div class="w-100 mt-4 px-4">
                            <hr>
                        </div>
                        @php
                            /**
                            * @var \App\Models\Multimedia\Media $image
                            */
                        @endphp
                        <div id="gallery" class="mt-3">
                            @forelse($selected_album?->media->chunk(6) as $images_chunk)
                                <div class="row">
                                    @foreach($images_chunk as $image)
                                        <div class="col-md-9">
                                            <a href="{{$image->url}}" class="light-blue" target="_blank">
                                                <i class="fa-solid fa-play light-blue me-1"></i>
                                                {{$image->title}}
                                            </a>
                                        </div>
                                        <div class="col-md-1 text-center">{{$image->language->code}}</div>
                                        
                                        <div class="col-md-2 text-center">
                                            <a href="javascript:void(0)" wire:click="deleteMedia({{$image->id}})" class="red">@lang('Delete')</a></div>
                                    @endforeach
                                </div>

                            @empty
                                <div class="h5 text-center py-4">
                                    @lang('No material uploaded yet!')
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-general.loading message="Deleting..." wire:target="deleteMedia"/>
    @else
        <div class="card mt-4">
            <div class="card-body">
                <div class="w-100">
                    <div class="row">
                        <div class="col-12">
                            <div class="h5 text-center blue d-flex justify-content-center">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                &nbsp;
                                @lang('Select Album to Upload or View Materials to Album')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
