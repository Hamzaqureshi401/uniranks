<div>
    <x-general.university-media-page-title sub-title="Front Page Video"/>
    <div class="card mt-1">
        <div class="card-body">
            <div class="blue paragraph-style2">
                @lang('Only the video source URL is accepted')
            </div>
            <div>
                <x-general.status-alert/>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-floating w-100">
                            <input wire:model.defer="title" class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Title')">
                            <label for="floatingInput">@lang('Title')</label>
                        </div>
                        <x-general.input-error for-input="title"/>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating w-100">
                            <input wire:model.defer="url" class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Video Link')">
                            <label for="floatingInput">@lang('Video Link')</label>
                        </div>
                        <x-general.input-error for-input="url"/>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 offset-6 d-flex justify-content-md-end">
                        <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
                        <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Cancel')</button>
                    </div>
                </div>

                <div class="w-100 mt-4 px-4">
                    <hr>
                </div>
                @php
                    /**
                    * @var \App\Models\University\Information\UniversityFrontVideos[] $videos
                    */
                @endphp
               
            </div>
            <x-general.loading message="Processing..."/>

        </div>
    </div>
    <div class="card bg-transparent mt-4">
    <div class="card-body">
    <div class="h4 blue" id="upload-images">@lang('Videos')</div>
     <div class="w-100 px-4 mt-3">
        <hr>
    </div>
    <table class="table">
        <tbody>
            @foreach($videos ?? [] as $video)
            <tr>
                <td><a href="{{$video->url}}" target="_blank" class="light-blue">{{$video->title}}</a></td>
                <td class="blue">@lang('Created on') {{$video->created_at?->toDayDateTimeString()}}</td>
                <td class="blue">{{$video->createdBy?->name}}</td>
                <td class="text-place-end">
                    @if($video->is_disabled)
                        <a href="javascript:void(0)" wire:click="enable({{$video->id}})" class="green">@lang('Enable')</a>
                    @else
                        <a href="javascript:void(0)" wire:click="disable({{$video->id}})" class="red">@lang('Disabled')</a>
                    @endif
                </td>
                <td class="text-place-end">
                    <a href="javascript:void(0)" wire:click="deleteVideo({{$video->id}})" class="red">@lang('Delete')</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

</div>
