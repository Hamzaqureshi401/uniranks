@auth
    @if(Auth::user()->hasVerifiedEmail())
    <x-general.sticky-footer/>
    @endif
@endauth
<footer class="bg-blue">
    <div class="container">
        <div class="row py-4">
            <div class="col-12  col-md-6 col-lg-3  d-flex flex-column justify-content-between">
                <ul class="list-group">
                    <li class="list-group-item h3 fw-bold borderless mb-4">
                        @lang('SCHOOLSMASTER')
                        <div class="decorative-spacer mt-2"></div>
                    </li>
                    <li class="list-group-item borderless">
                        <a href=" https://www.schoolsmaster.com/" target="_blank" class="text-decoration-none text-white">
                            @lang('SchoolsMaster Home')
                        </a>
                    </li>
                    <li class="list-group-item borderless">
                        <a href="https://www.schoolsmaster.com/events" target="_blank" class="text-decoration-none text-white">
                            @lang('Schools Master Events')
                        </a>
                    </li>
                </ul>
                <img src="{{ AppConst::SM_LOGOS_CDN . '/SM-footer.png' }}" alt="SchoolsMaster"
                     class="mt-4 footer-apps-logo">
            </div>
            <div class="col-12  col-md-6 col-lg-3 my-4 my-md-0 d-flex flex-column justify-content-between">
                <ul class="list-group">
                    <li class="list-group-item h3 fw-bold borderless mb-4">
                        @lang('UNIRANKS')
                        <div class="decorative-spacer mt-2"></div>
                    </li>
                    <li class="list-group-item borderless">
                        <a href="https://www.uniranks.com/" target="_blank" class="text-decoration-none text-white">
                            @lang('UNIRANKS Home')
                        </a>
                    </li>
                    <li class="list-group-item borderless">
                        <a href="https://www.uniranks.com/ranking/" target="_blank" class="text-decoration-none text-white">
                            @lang('Top Universities by Region')
                        </a>
                    </li>
                    <li class="list-group-item borderless">
                        <a href="https://committee.uniranks.com/register" target="_blank" class="text-decoration-none text-white">
                            @lang('UNIRANKS Open Rank Concept')
                        </a>
                    </li>
                    <li class="list-group-item borderless">
                        <a href="https://www.uniranks.com/elite-university" target="_blank" class="text-decoration-none text-white">
                            @lang('ELITE University')
                        </a>
                    </li>
                </ul>
                <img src="{{ AppConst::SM_LOGOS_CDN . '/UR-footer.png' }}" alt="UNIRANKS" class="mt-4 footer-apps-logo">
            </div>
            <div class="col-12  col-md-6 col-lg-3 d-flex flex-column justify-content-between  mt-md-4 mt-lg-0">
                <ul class="list-group">
                    <li class="list-group-item h3 fw-bold borderless mb-4">
                        @lang('WHERS')
                        <div class="decorative-spacer mt-2"></div>
                    </li>
                    <li class="list-group-item borderless">
                        <a href="https://www.whersconference.com/" target="_blank" class="text-decoration-none text-white">
                            @lang('WHERS Home')
                        </a>
                    </li>
                    <li class="list-group-item borderless">
                        <a href="https://www.whersconference.com/#wherstracks" target="_blank" class="text-decoration-none text-white">
                            @lang('WHERS Conference Tracks')
                        </a>
                    </li>
                    <li class="list-group-item borderless">
                        <a href="https://www.whersconference.com/#unirankstracks" target="_blank" class="text-decoration-none text-white">
                            @lang('UNIRANKS Tracks')
                        </a>
                    </li>
                    <li class="list-group-item borderless">
                        <a href="https://www.whersconference.com/sign-up" target="_blank" class="text-decoration-none text-white">
                            @lang('Conference Attendance Packages')
                        </a>
                    </li>
                    <li class="list-group-item borderless">
                        <a href="https://www.whersconference.com/sponsorships" target="_blank" class="text-decoration-none text-white">
                            @lang('Become a Sponsor')
                        </a>
                    </li>
                    <li class="list-group-item borderless">
                        <a href="https://www.whersconference.com/speakers" target="_blank" class="text-decoration-none text-white">
                            @lang('SPEAKERS')
                        </a>
                    </li>
                </ul>
                <img src="{{ AppConst::SM_LOGOS_CDN . '/WHERS-footer.png' }}" alt="WHERS" class="mt-4 footer-apps-logo">
            </div>
            <div class="col-12  col-md-6 col-lg-3 mt-4 my-lg-0">
                <ul class="list-group">
                    <li class="list-group-item h3 fw-bold borderless mb-4">
                        @lang('Follow Us')
                        <div class="decorative-spacer mt-2"></div>
                    </li>
                    <li class="list-group-item borderless">
                        <a href="#"> <i class="fa-brands fa-square-facebook ic_style3"></i></a>
                        <a class="px-2" href="#"> <i class="fa fa-twitter ic_style3"></i></a>
                        <a href="#"> <i class="fa fa-instagram ic_style3"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="normal-spacer"></div>
            </div>
        </div>
        <div class="row my-3 align-items-center">
            <div class="col-12  col-lg-3  py-2 py-md-0 text-center text-lg-start">
                <label>{{ session('country_info')['name'] }} </label>
            </div>
            <div class="col-12 col-lg-6 py-2 py-md-0">
                <ul class="list-group list-group-horizontal justify-content-center">
                    <li class="list-group-item border-right">@lang('FAQ')</li>
                    <li class="list-group-item border-right">@lang('Partners')</li>
                    <li class="list-group-item border-right">@lang('Contact')</li>
                    <li class="list-group-item border-right">@lang('Privacy')</li>
                    <li class="list-group-item border-right">@lang('Cookies')</li>
                    <li class="list-group-item">@lang('Terms')</li>
                </ul>
            </div>
            <div class="col-12 col-lg-3 py-2 px-0">
                <ul class="w-100 list-group list-group-horizontal justify-content-center justify-content-lg-end">
                    <li class="list-group-item ">
                        <a class="text-white"
                           href="{{(config('app.locale','en') != 'en' ? route('setLanguage','en'):"javascript:void(0)")}}">
                            English
                        </a>
                    </li>
                    @if(!empty(session('country_info')['suggested_language']))
                        @php
                            /** @var \App\Models\General\Language $suggested_language */
                            $suggested_language = session('country_info')['suggested_language']
                        @endphp
                        <li class="list-group-item border-left">
                            <a class="text-white" href="{{($suggested_language->code != config('app.locale') ? route('setLanguage',$suggested_language->code):"javascript:void(0)")}}">
                                {!! $suggested_language->native_name !!}
                            </a>
                        </li>
                    @endif
                    @php
                        /** @var \App\Models\General\Language $language */
                    @endphp
                    @if(!empty(languages()))
                        <li class="list-group-item">
                            <select class="footer-language-select"  onchange="window.location = '{{route('setLanguage')}}/'+this.value ">
                                @foreach(languages() as $language)
                                    <option value="{{$language->code}}" {{$language->code == config('app.locale') ? 'selected':''}}>
                                        {!! $language->native_name !!}
                                    </option>
                                @endforeach
                            </select>
                        </li>
                    @endif

                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mx-auto text-center">
                    <p class="text-light">{{ date('Y') }} &copy; @lang('UNIRANKS All Right Reserved')</p>
                </div>
            </div>
        </div>

        <button id="back_to_top" class="btn btn-secondary" onclick="goTop()" title="Go to top"><i
                class="fas fa-angle-up"></i></button>
    </div>
</footer>
