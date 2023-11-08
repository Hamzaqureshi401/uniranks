<div>
    <x-general.university-media-page-title sub-title="Front Page Banners"/>
    <div class="card mt-1">
        <div class="card-body">
            <div class="blue paragraph-style2 mb-3">
                @lang('The banner size must br 2600px * 500, Image format must be .JPG, .PNG, .SVG or .WEBP')
            </div>
            <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>

            <div class="mt-2">
                <div class="col-md-6 mb-3">
                    <div class="form-floating w-100">
                        <input wire:model.defer="title" class="form-control input-field" id="floatingInput" placeholder="@lang('Banner Title')">
                        <label for="floatingInput">@lang('Banner Title')</label>
                    </div>
                </div>
                <x-elements.file-uploader wire:model="image" accept="image/*"/>
            </div>
            @if(!empty($image))
                <div class="mt-4">
                    <img src="{{$image->temporaryUrl()}}" class="banner-img">
                    <p class="text-center blue">{{$image->getClientOriginalName()}}</p>
                </div>
            @endif
            <div class="row mt-4">
                <div class="col-md-6 offset-6 d-flex justify-content-md-end">
                    <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Upload Banner')</button>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="d-md-flex justify-content-end align-items-center mt-1">
        <div class="col-md-6 text-place-end mt-4 mb-4">
            <button wire:click="save" class="m-0 button-no-bg" type="button" id="show">@lang('+ Add Banner')</button>
        </div>
    </div>--}}
    <x-general.loading message="Please Wait..."/>
    @php
        /**
        * @var \App\Models\University\Information\UniversityFrontBanners[] $banners
        */
    @endphp
    @foreach($banners ?? [] as $banner)
        <div class="card bg-transparent mt-4">
            <div class="card-body">
                <div class="w-100">
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div class="h5 blue">{{$banner->title}}</div>
                            <div class="h5"><label
                                    class="light-blue">@lang(($banner->is_enabled ? "Enabled" : "Disabled"))</label>
                            </div>
                        </div>
                        <div>
                            <img src="{{$banner->image_url}}" class="banner-img">
                        </div>
                        <div class="w-100 mt-4 px-4">
                            <hr>
                        </div>
                        <div class="d-md-flex h6 blue justify-content-between">
                            <div class="">@lang('Created on') {{$banner->created_at?->toDayDateTimeString()}}</div>
                            <div class="">@lang('By') {{$banner->createdBy?->name}}</div>
                            <div class="text-place-end">
                                @if($banner->is_disabled)
                                    <a href="javascript:void(0)" wire:click="enable({{$banner->id}})"
                                       class="green">@lang('Enable')</a>
                                @else
                                    <a href="javascript:void(0)" wire:click="disable({{$banner->id}})"
                                       class="red">@lang('Disabled')</a>
                                @endif
                            </div>
                            <div class="text-place-end"><a href="javascript:void(0)"
                                                           wire:click="delete({{$banner->id}})"
                                                           class="red ">@lang('Delete')</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
