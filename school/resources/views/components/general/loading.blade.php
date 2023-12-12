@php
    $loadingMessage = isset($message) ? $message : "Loading";
@endphp
<div class="modal show" wire:loading.block {!! $attributes !!} wire:ignore.self="" id="loading-modal"
     data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" style="padding-left: 0px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="height: 250px">
                <div class="d-flex justify-content-center align-items-center h-100 primary-text">
                    <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> &nbsp;
                    @lang($loadingMessage)...
                </div>
            </div>
        </div>
    </div>
</div>
