<nav class="navbar navbar-expand-lg  navbar-light bg-white px-md-0 mobile-nav-hidden nav-bar-border-top">
    <div class="container-fluid container px-md-0">
        <a href="{{url('/')}}"  class="navbar-brand" style="align-self: center">
            <img class="header-logo d-none d-lg-inline-block pointer" style="width: 175px; height: auto; "
                 src="{{AppConst::SITE_LOGOS}}/Logo-stars-v1.png" alt="Unirank"/>
        </a>
        <div class="ms-auto">
            @include('layouts.includes.header.main-auth-menu')
        </div>
    </div>
</nav>
