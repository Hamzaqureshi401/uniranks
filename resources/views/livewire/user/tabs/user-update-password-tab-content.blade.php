<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="row">
            <div class="col-12">
                <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
                <x-jet-input id="current_password" type="password" class="mt-1" placeholder="{{ __('Current Password') }}"  wire:model.defer="state.current_password" autocomplete="current-password" />
                <x-jet-input-error for="current_password" class="mt-2" />
            </div>

            <div class="col-12 my-2">
                <x-jet-label for="password" value="{{ __('New Password') }}" />
                <x-jet-input id="password" type="password" class="mt-1" placeholder="{{ __('New Password') }}" wire:model.defer="state.password" autocomplete="new-password" />
                <x-jet-input-error for="password" class="mt-2" />
            </div>

            <div class="col-12">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" type="password" class="mt-1" placeholder="{{ __('Confirm Password') }}" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation" class="mt-2" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="col-12 mb-1" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>
        <button type="submit" class="button-dark-blue width-25 button-sm mobile-btn" wire:loading.attr="disabled">@lang('Save')
        </button>
        <button type="reset" class="button-red width-25 button-sm mobile-btn" wire:loading.attr="disabled">@lang('Cancel')</button>
    </x-slot>


</x-jet-form-section>

   <div class="card bg-transparent mt-4">
        <div class="card-body">
            <div class="h4 blue" id="upload-images">@lang('Password')   
             <div class="w-100 px-4 mt-3">
        <hr>
    </div> 
    <!-- @include('about-icon') -->

 </div>
       <table class="table">
   <!--  <thead>
        <tr>
            <th scope="col">URL</th>
            <th scope="col">Type</th>
            <th scope="col">Created On</th>
            <th scope="col">By</th>
            <th scope="col" class="text-place-end">Actions</th>
        </tr>
    </thead> -->
    <tbody>
       
        </tbody>
</table>
 <div class="d-md-flex col-md-6 h6 blue justify-content-between">
    <div class="box-bottom-note">
            @lang('Updated on') {{ \Carbon\Carbon::parse(\Auth::user()['updated_at'])->format('D, M j, Y g:i A') }}
        
    </div>
    <div class="mobile-marg-2">@lang('By') {{ \Auth::user()['updated_by'] ?? 'By Dev Team Rep' }}</div>
</div>

    </div>
    </div>

