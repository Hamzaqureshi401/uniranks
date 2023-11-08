<div class="w-100">
    <div class="row">
        <div class="col-12">
            <div class="h4 text-blue">@lang('Primary Email address')</div>
        </div>
    </div>
{{--    <x-jet-validation-errors class="mb-4 alert alert-danger"/>--}}
    <x-general.status-alert/>
    <div class="card  my-3">
        <div class="card-body pb-1">
            <div class="w-100" x-data="{email:@entangle('email').defer}">
                <form wire:submit.prevent="">
                    <div class="row">
                        <div class="col-12">
                            <input type="email" id="email" name="email" x-model="email"
                                   class="form-control input-field">
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <button type="submit" wire:click="updateCurrentEmail" :disabled="email == '{{$email}}'"
                                        class="button-dark-blue width-25 button-sm mobile-btn">@lang('Update')
                                </button>
                                <button wire:click="resetEmail" :disabled="email == '{{$email}}'" class="button-red width-25 button-sm mobile-btn">
                                    @lang('Cancel')
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-general.loading wire:target="updateCurrentEmail" message="Saving Data" />
    <livewire:user.tabs.user-sub-accounts/>
</div>
