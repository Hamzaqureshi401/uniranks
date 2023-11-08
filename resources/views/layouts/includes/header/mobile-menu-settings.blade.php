<nav  class="navbar navbar-expand-lg navbar-dark d-lg-none px-md-0 bg-dark-blue container-fluid">
    <div class="container-fluid container px-md-0">
        <div class="d-flex gap-1">
            <button id="btn-hamburger" class="navbar-toggler p-0 m-0 ps-2" type="button" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="mobile-nav menu-close-state">
            <a class="navbar-brand" href="#">
                <img src="{{ AppConst::SITE_LOGOS . '/uniranks-star-logo.png' }}" style="width: 180px"
                     alt="Uniranks"/>
            </a>
        </div>
        <div class="mobile-nav align-items-center gap-2 toast-news" style="">
            @auth
                <button class="btn p-0 m-0 position-relative">
                    <img src="{{AppConst::ICONS}}/bell-regula-Wr.svg" alt="" width="20">
{{--                    <span class="css-q8emij position-absolute">14</span>--}}
                </button>
            @endauth
        </div>
    </div>
    @auth
        @if(!empty(Auth::user()->selected_school))
            <div class="mobile-nav-container px-md-0 mt-3 mobile-nav menu-close-state">
                <div class="d-flex align-items-end">
                    <div class="m-2">
                        <img src="{{Auth::user()->selected_school->logo_url}}" alt="School Logo" width="65"/>
                    </div>
                    <div class="">
                        <h4 class="fw-light">{{Auth::user()->selected_school->school_name}}</h4>
                    </div>
                </div>
            </div>
        @endif
        <div class="hidden flex-column align-items-center justify-content-center mt-3 w-100 menu-open-state">
            <a class="navbar-brand" href="#">
                <img src="{{Auth::user()->profile_photo_url}}" alt="Avatar" class="rounded-circle" id="nav-logo"
                     width="100">
            </a>
            <p class="m-0">{{Auth::user()->userBio->first_name}}</p>
            <div class="dropdown">
                <a class="d-flex align-items-center text-white mx-2 dropdown-toggle text-decoration-none" href="#"
                   id="user_account_dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="mx-3">{{Auth::user()->email}}</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="user_account_dropdown">
                    <li><a class="dropdown-item" href="{{route('admin.user.profile')}}">Account</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="dropdown-item">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    @endauth
</nav>
