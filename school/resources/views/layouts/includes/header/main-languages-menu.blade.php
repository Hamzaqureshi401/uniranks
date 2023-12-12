<div class="language-dropdown">
    <button class="dropbtn language-btn py-2 px-3 rounded d-flex align-items-center mx-0">
        <img loading="lazy" class="me-2" src="{{ AppConst::ICONS . '/icon-worldmap.png' }}"
             alt="world">
        @lang('Language')({{ucfirst(config('app.locale'))}})
    </button>
    <div class="rounded dropdown-content" style="max-height: 16.5rem; overflow: auto">
        @php
            /** @var \App\Models\General\Language $language */
        @endphp
        @foreach(languages() as  $language)
            <a @class(['language-item py-0',"active-lang"=> $language->code == config('app.locale')])
               href="{{($language->code != config('app.locale') ? route('setLanguage',$language->code):"javascript:void(0)")}}">
                {!! $language->native_name !!}
            </a>
        @endforeach
    </div>
</div>
