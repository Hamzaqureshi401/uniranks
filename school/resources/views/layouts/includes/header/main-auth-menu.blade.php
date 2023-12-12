@guest
    <a href="{{route('login')}}" class="button-sm  button-light-blue text-light ms-2 text-decoration-none" style="width: 90px">@lang('Login')</a>
    <a href="{{route('register')}}" class="button-sm button-red text-decoration-none ms-2"   style="width: 90px">@lang('Sign Up')</a>
@elseauth
    <div class="dropdown">
        <a class="d-flex align-items-center text-white dropdown-toggle text-decoration-none" href="#"
           id="user_account_dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="navbar-user-avatar" src="{{ auth()->user()->profile_photo_url }}"
                 alt="Profile Picture"/>
            <span class="ms-2 blue">
                {{ auth()->user()->userBio->first_name}}
            </span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="user_account_dropdown">
            <li><a class="dropdown-item" href="{{route('admin.user.profile')}}">@lang('Profile')</a></li>
            <li>
                <form method="POST" class="dropdown-item" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="p-0 bg-transparent border-0 m-0" style="font-size: inherit;">
                        @lang('Logout')
                    </button>
                </form>
            </li>
        </ul>
    </div>
@endguest
