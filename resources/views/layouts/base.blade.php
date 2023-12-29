<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }} > {{--dir="{{getPageDirection()}}"--}}
<head>@include('layouts.includes.head')</head>
<body>
    @if(!Route::is('login'))
    <livewire:pages.page-navigation/>
    @endif
<div id="loader-wrapper" style="">
    <img id="loader" src="{{ AppConst::SITE_LOGOS . '/logo-vertical.png' }}" alt="Loading"/>
</div>
<div id="mainBody" class="d-none">
    @if(!Route::is('login'))
    <div class="container">
    @endif
    @include('layouts.includes.header')
    <main>
        {{ $slot }}     
    </main>
    <livewire:response.return-response-modal-component/>
    <livewire:suggest.modal/>
    <livewire:leads.student-details-modal/>
    <x-general.coming-soon/>
   
     @if(Route::is('login'))
        <!-- If the current route is 'login', use specific footer -->
        <x-general.footer/>
    @else
    <br>
        <!-- If the current route is not 'login', use another footer -->
        <footer class="page-footer" style="display: block !important;">
            <x-general.footer/>
        </footer>
        @include('layouts.theme-customizer')
    @endif
    
</div>
@if(!Route::is('login'))
</div>
@endif
@include('layouts.includes.scripts')
</body>
</html>
