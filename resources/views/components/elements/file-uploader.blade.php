@props(['multiple'=>false, 'accept'=>"",'description'=>'Drop file(s) here / Click to select the file'])
@php
$modelValue = $attributes->wire('model')->value;
@endphp
<div wire:ignore>
    <div x-data="{
                dropingFile: false,
                handleFileDrop(e) {
                    if (event.dataTransfer.files.length > 0) {
                        const files = e.dataTransfer.files;
                        @if($multiple)
                        @this.uploadMultiple('{{$modelValue}}', files,(uploadedFilename) => {}, () => {}, (event) => {})
                        @else
                        @this.upload('{{$modelValue}}', files[0],(uploadedFilename) => {}, () => {}, (event) => {})
                        @endif
                    }
                }
            }">
        <label class="w-100 file-drag" for="file_input"
               x-bind:class="dropingFile ? 'bg-gray-400 border-gray-500' : 'border-gray-500 bg-gray-200'"
               x-on:drop="dropingFile = false"
               x-on:drop.prevent="handleFileDrop($event)"
               x-on:dragover.prevent="dropingFile = true"
               x-on:dragleave.prevent="dropingFile = false">
                    <span class="upload-container file-upload d-flex justify-content-center">
                        <i class="fa-solid fa-cloud-arrow-up light-blue"></i>
                        <input type="file" wire:model="{{$modelValue}}" hidden id="file_input"
                               @if($multiple)
                                   multiple=""
                               @endif
                               accept="{{$accept}}">
                    </span>
            <p class="text-center blue">@lang($description)</p>
        </label>
    </div>
</div>


