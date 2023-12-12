<nav class="navbar navbar-expand-lg  navbar-light bg-white px-md-0 mobile-nav-hidden nav-bar-border-top">
    @php
        $translated_sm_logo = ['ar'=>'logo-ar.svg'];
        $main_logo = $translated_sm_logo[app()->getLocale()] ?? "logo.png"
    @endphp
    <div class="container-fluid container px-md-0">
        <a href="{{url('/')}}"  class="navbar-brand" style="align-self: center">
            <img class="header-logo d-none d-lg-inline-block pointer"  style="width: 250px; height: auto; "
                 src="{{ AppConst::SM_LOGOS_CDN. '/'."$main_logo" }}" alt="Unirank"/>
        </a>
        <div class="ms-auto">
            @include('layouts.includes.header.main-auth-menu')
        </div>
    </div>
</nav>
