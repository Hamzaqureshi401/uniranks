<div>
    <x-jet-modal wire:model="returnResponseModal">
        <x-slot name="title">
            {{ $title  ?? ''}}
        </x-slot>
        <x-slot name="description">
            <div class="row">
                <div class="col-12">
                    <div class="gray paragraph-style2">
                        {{ $message ?? '' }}

                    </div>
                </div>
            </div>
        </x-slot>
        <div class="row mt-3">
            <div class="col-12 text-end">
                @if(!empty($viewTitle))
                <a href="{{ $link }}" class="light-blue a-underline me-2">
                    {{ $viewTitle ?? '' }}
                </a>
                @endif
                <button wire:click="closeModal" class="button-sm button-blue w-30">
                    {{ $btn ?? '' }}
                </button>
            </div>
        </div>
        </x-jet-modal>
</div>
