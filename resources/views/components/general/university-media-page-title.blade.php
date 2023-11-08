@props(['subTitle'=>'','galleryMenu'=>false])
<div>
    <x-general.page-title title="University Information" :sub-title="$subTitle" />
    @if($galleryMenu)
    <div wire:ignore class="d-flex justify-content-md-end blue w-100 mb-2">
        <div class="align-self-center"><a href="{{route('admin.media.photos')}}"
                @class(['blue','light-blue'=>Route::is('admin.media.photos')])>@lang('Images')</a></div>
        <div class="light-gray">|</div>
        <div class="align-self-center"><a href="{{route('admin.media.videos')}}"
                @class(['blue','light-blue'=>Route::is('admin.media.videos')])>@lang('Videos')</a></div>
        <div class="light-gray">|</div>
        <div class="align-self-center"><a href="{{route('admin.media.panoramas')}}"
                @class(['blue','light-blue'=>Route::is('admin.media.panoramas')])>@lang('Panorama 360')</a></div>
    </div>
    @endif
</div>
