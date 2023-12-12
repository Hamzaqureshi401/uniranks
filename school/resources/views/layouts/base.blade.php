<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }} dir="{{getPageDirection()}}" > {{--dir="{{getPageDirection()}}"--}}
<head>@include('layouts.includes.head')</head>
<body>
<div id="loader-wrapper" style="">
    <img id="loader" src="{{ AppConst::SM_LOGOS_CDN . '/SM-Logo-vertical.png' }}" alt="Loading"/>
</div>
<div id="mainBody" class="d-none">
    @include('layouts.includes.header')
    <main>
        {{ $slot }}
    </main>
    <livewire:suggest.modal/>
    <livewire:school.share-event-modal/>
    <livewire:students.student-details-modal/>
{{--    <x-general.toast/>--}}
    <x-general.footer/>
    <x-general.coming-soon/>
    <div class="modal fade" id="read-more-modal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="read-more-modal-title">@lang('Event Details')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="w-100">
                    <div class="card-body pt-0">
                        <div class="paragraph-style2 blue" id="notes_content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.includes.scripts')
</body>
</html>
