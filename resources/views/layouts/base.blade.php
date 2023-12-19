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
   
     @if(Route::is('login'))
        <!-- If the current route is 'login', use specific footer -->
        <x-general.footer/>
    @else
        <!-- If the current route is not 'login', use another footer -->
        <footer class="page-footer" style="display: block !important;">
            <x-general.footer/>
        </footer>
        @include('layouts.theme-customizer')
    @endif
    
</div>
@include('layouts.includes.scripts')
</body>
</html>
