<div>
    @php
        /**
        * @var \App\Models\Institutes\University $university;
        **/
    @endphp
    <div class="card mt-1" x-data="{photoName: null, photoPreview: null,isUploading: false, progress: 0}"
         x-on:livewire-upload-start="isUploading = true"

         x-on:livewire-upload-finish="isUploading = false"

         x-on:livewire-upload-error="isUploading = false"

         x-on:livewire-upload-progress="progress = $event.detail.progress">
        <div class="card-body">
            <x-general.status-alert name="status"/>
            <div>


                <input type="file" class="d-none" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);"/>
                <div class="d-md-flex mt-3 justify-content-between align-items-center">
                    <div class="col-md-6">
                        <div x-show="!photoPreview">
                            <img src="{{$university->logo_url}}" x-on:click.prevent="$refs.photo.click()" style="cursor:pointer;" class="card p-2 rounded-0" width="130px">
                        </div>

                        <div x-show="photoPreview" style="display: none;">
                            <img :src="photoPreview" class="card p-2 rounded-0" width="130px">
                        </div>

                        <div x-show="isUploading" class="mt-2" style="width: 130px" >
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                     :style="`width: ${progress}%;`"  :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <x-jet-input-error for="photo" class="mt-2"/>
                    </div>

                    <div class="col-md-6  mobile-marg text-place-end">
                        <button class="m-0 button-no-bg" :disabled="isUploading"   x-on:click.prevent="$refs.photo.click()">@lang('+ Upload Square Logo')</button>
                    </div>
                </div>

            </div>
            <div class="w-100 mt-3 px-4">
                <hr>
            </div>
            <div class="d-md-flex h6 blue justify-content-end">
                <div><a href="javascript:void(0)" wire:click.prevent="removeLogo" class="red ">@lang('Delete')</a></div>
            </div>
            <x-general.loading message="Deleting File..." wire:traget="removeLogo" />
        </div>
    </div>
</div>
