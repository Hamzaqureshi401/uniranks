<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }} > {{--dir="{{getPageDirection()}}"--}}
<head>@include('layouts.includes.head')</head>
<body>
<div id="loader-wrapper" style="">
    <img id="loader" src="{{ AppConst::SITE_LOGOS . '/logo-vertical.png' }}" alt="Loading"/>
</div>
<div id="mainBody" class="d-none">
    @include('layouts.includes.header')
    <main>
        {{ $slot }}
    </main>
    <livewire:suggest.modal/>
    <livewire:leads.student-details-modal/>
    <x-general.coming-soon/>
    <x-general.footer/>
</div>
@include('layouts.includes.scripts')
</body>
</html>
