<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }} > {{--dir="{{getPageDirection()}}"--}}
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="@yield('meta.description')"/>
    <meta name="author" content="Mazajnet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- temp   -->
    <meta name=”robots” content=”noindex”>
    {{--    {{ $pageTitle }}--}}
    <title>{{$title ?? config('app.name')}}_{{\Carbon\Carbon::now()->timestamp}}</title>
    <link rel="icon" href="{{ AppConst::FAVICONS . '/light.ico' }}" id="light-scheme-icon">
    <link rel="icon" href="{{ AppConst::FAVICONS . '/dark.ico' }}" id="dark-scheme-icon">

    <!-- Preloading and fetching    -->
    <link href="{{ AppConst::CDN_PATH }}" rel="preconnect" crossorigin>

    <link rel="preload" href="{{ AppConst::SM_LOGOS_CDN . '/UR-Logo.png' }}" as="image">
    <link rel="preload" href="{{ AppConst::SM_LOGOS_CDN . '/SM-Logo-vertical.png' }}" as="image">
    <link rel="preload" href="{{ AppConst::SM_LOGOS_CDN . '/UR-footer.png' }}" as="image">
    <link rel="preload" href="{{ AppConst::SITE_LOGOS . '/ranking-listing-logo.png' }}" as="image">
    <link rel="preload" href="{{ AppConst::SITE_LOGOS . '/new-logo.jpg' }}" as="image">
    <link rel="preload" href="{{ AppConst::SITE_LOGOS . '/uniranks-vertical-logo.png' }}" as="image">
    <link rel="preload" href="{{ AppConst::ICONS . '/icon-worldmap.png' }}" as="image">
    @if(getPageDirection() == 'rtl')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
              integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N"
              crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/css/template/core-rtl.css')}}?id={{Str::uuid()}}">
        <link rel="stylesheet" href="{{ asset('assets/css/template/sm-rtl.css') }}?id={{Str::uuid()}}" type="text/css">
    @else
    @endif
    <style>
        /*:root {*/
        /*    --blue: #039be5;*/
        /*    --red: #c20018;*/
        /*    --orange: #fd7e14;*/
        /*    --yellow: #ffc107;*/
        /*    --green: #28a745;*/
        /*    --teal: #20c997;*/
        /*    --cyan: #17a2b8;*/
        /*    --white: #fff;*/
        /*    --off-white: rgba(255, 255, 255, .5);*/
        /*    --gray: #ccced0;*/
        /*    --gray-dark: #343a40;*/
        /*    --gray-darker: rgba(0, 0, 0, .125);*/
        /*    --gray-darkest: rgba(0, 0, 0, 0.5);*/
        /*    --primary: #1c345a;*/
        /*    --dark-primary: #001736;*/
        /*    --light-primary: #1c345a;*/
        /*    --secondary: #039be5;*/
        /*    --success: #28a745;*/
        /*    --info: #039be5;*/
        /*    --warning: #ffc107;*/
        /*    --danger: var(--red);*/
        /*    --light: #f8f9fa;*/
        /*    --dark: #343a40;*/
        /*    --primary-contrast: var(--gray);*/

        /*    --link-border-color: var(--gray);*/
        /*    --box-border-color: var(--primary);*/
        /*    --secondary-blue: #039be5;*/
        /*    --breakpoint-xs: 0;*/
        /*    --breakpoint-sm: 576px;*/
        /*    --breakpoint-md: 768px;*/
        /*    --breakpoint-lg: 992px;*/
        /*    --breakpoint-xl: 1200px;*/
        /*    --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";*/
        /*    --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;*/
        /*    --font-size: 1rem*/
        /*}*/
        /*body {*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*    font-family: Calibri, sans-serif;*/
        /*    min-width: 400px;*/
        /*    background-color: #F2F2F2;*/
        /*    font-size: var(--font-size);*/
        /*    color: var(--primary);*/
        /*}*/
        /*.page-break {*/
        /*    page-break-after: always;*/
        /*}*/
        /*!*table, th, td {*!*/
        /*!*    border: 1px solid black;*!*/
        /*!*}*!*/

        /*.primary-text {*/
        /*    color: var(--primary) !important;*/
        /*}*/

        /*.secondary-text {*/
        /*    color: var(--secondary-blue) !important;*/
        /*}*/

        /*.primary-bg {*/
        /*    background: var(--primary) !important;*/
        /*}*/

        /*.secondary-bg {*/
        /*    background: var(--secondary-blue) !important;*/
        /*}*/
        /*.h1 {*/
        /*    font-size: 3.125rem;*/
        /*    line-height: 2.5rem !important*/
        /*}*/

        /*.h2 {*/
        /*    font-size: 2rem;*/
        /*    line-height: 2rem;*/
        /*}*/

        /*.h3 {*/
        /*    font-size: 1.7rem;*/
        /*    line-height: 1.5rem !important;*/
        /*}*/

        /*.h4 {*/
        /*    font-size: 1.25rem;*/
        /*    line-height: 1.5rem !important*/
        /*}*/

        /*.h5 {*/
        /*    font-size: 1rem;*/
        /*    line-height: 1.25rem !important*/
        /*}*/

        /*.h6 {*/
        /*    font-size: 0.75rem;*/
        /*    line-height: 0.9rem !important*/
        /*}*/

        /*.text-end {*/
        /*    text-align: end !important;*/
        /*}*/

        /*.w-5 {*/
        /*    width: 5% !important;*/
        /*}*/

        /*.w-6 {*/
        /*    width: 6% !important;*/
        /*}*/

        /*.w-7 {*/
        /*    width: 7% !important;*/
        /*}*/

        /*.w-8 {*/
        /*    width: 8% !important;*/
        /*}*/

        /*.w-9 {*/
        /*    width: 9% !important;*/
        /*}*/

        /*.w-10 {*/
        /*    width: 10% !important;*/
        /*}*/

        /*.w-11 {*/
        /*    width: 11% !important;*/
        /*}*/

        /*.w-12 {*/
        /*    width: 12% !important;*/
        /*}*/

        /*.w-13 {*/
        /*    width: 13% !important;*/
        /*}*/

        /*.w-14 {*/
        /*    width: 14% !important;*/
        /*}*/

        /*.w-15 {*/
        /*    width: 15% !important;*/
        /*}*/

        /*.w-16 {*/
        /*    width: 16% !important;*/
        /*}*/

        /*.w-17 {*/
        /*    width: 17% !important;*/
        /*}*/

        /*.w-18 {*/
        /*    width: 18% !important;*/
        /*}*/

        /*.w-19 {*/
        /*    width: 19% !important;*/
        /*}*/

        /*.w-20 {*/
        /*    width: 20% !important;*/
        /*}*/

        /*.w-21 {*/
        /*    width: 21% !important;*/
        /*}*/

        /*.w-22 {*/
        /*    width: 22% !important;*/
        /*}*/

        /*.w-23 {*/
        /*    width: 23% !important;*/
        /*}*/

        /*.w-24 {*/
        /*    width: 24% !important;*/
        /*}*/

        /*.w-25 {*/
        /*    width: 25% !important;*/
        /*}*/

        /*.w-26 {*/
        /*    width: 26% !important;*/
        /*}*/

        /*.w-27 {*/
        /*    width: 27% !important;*/
        /*}*/

        /*.w-28 {*/
        /*    width: 28% !important;*/
        /*}*/

        /*.w-29 {*/
        /*    width: 29% !important;*/
        /*}*/

        /*.w-30 {*/
        /*    width: 30% !important;*/
        /*}*/

        /*.w-31 {*/
        /*    width: 31%;*/
        /*}*/

        /*.w-32 {*/
        /*    width: 32%;*/
        /*}*/

        /*.w-33 {*/
        /*    width: 33%;*/
        /*}*/

        /*.w-34 {*/
        /*    width: 34% !important;*/
        /*}*/

        /*.w-35 {*/
        /*    width: 35% !important;*/
        /*}*/

        /*.w-36 {*/
        /*    width: 36% !important;*/
        /*}*/

        /*.w-37 {*/
        /*    width: 37% !important;*/
        /*}*/

        /*.w-38 {*/
        /*    width: 38% !important;*/
        /*}*/

        /*.w-39 {*/
        /*    width: 39% !important;*/
        /*}*/

        /*.w-40 {*/
        /*    width: 40% !important;*/
        /*}*/

        /*.w-41 {*/
        /*    width: 41% !important;*/
        /*}*/

        /*.w-42 {*/
        /*    width: 42% !important;*/
        /*}*/

        /*.w-43 {*/
        /*    width: 43% !important;*/
        /*}*/

        /*.w-44 {*/
        /*    width: 44% !important;*/
        /*}*/

        /*.w-45 {*/
        /*    width: 45% !important;*/
        /*}*/

        /*.w-46 {*/
        /*    width: 46% !important;*/
        /*}*/

        /*.w-47 {*/
        /*    width: 47% !important;*/
        /*}*/

        /*.w-48 {*/
        /*    width: 48% !important;*/
        /*}*/

        /*.w-49 {*/
        /*    width: 49% !important;*/
        /*}*/

        /*.w-50 {*/
        /*    width: 50% !important;*/
        /*}*/

        /*.w-55 {*/
        /*    width: 55% !important;*/
        /*}*/

        /*.w-60 {*/
        /*    width: 60% !important;*/
        /*}*/

        /*.w-64 {*/
        /*    width: 64% !important;*/
        /*}*/

        /*.w-65 {*/
        /*    width: 65% !important;*/
        /*}*/

        /*.w-70 {*/
        /*    width: 70% !important;*/
        /*}*/

        /*.w-80 {*/
        /*    width: 80% !important;*/
        /*}*/

        /*.w-90 {*/
        /*    width: 90% !important;*/
        /*}*/

        /*.w-100 {*/
        /*    width: 100% !important;*/
        /*}*/

        /*!* ////////////////////Fonts////////////////////// *!*/
        /*.font-12 {*/
        /*    font-size: 12px !important;*/
        /*}*/

        /*.button-sm {*/
        /*    !*font-size: 0.8rem !important;*!*/
        /*    font-weight: 400 !important;*/
        /*    padding: 0.4rem;*/
        /*    border-radius: 0.313rem;*/
        /*    text-align: center !important;*/
        /*    color: white !important;*/
        /*}*/
        /*.button-blue {*/
        /*    background-color: #1c345a;*/
        /*    border: 1px solid #1c345a;*/
        /*    color: white;*/
        /*}*/

        /*.button-blue:hover {*/
        /*    background-color: #001736;*/
        /*    border: 1px solid #001736;*/
        /*    color: white;*/
        /*}*/

        /*.text-center{*/
        /*    text-align: center !important;*/
        /*}*/
        @page {
            margin: 2mm
        }

        .footer, .footer-space {
            height: 100px;
        }

        .header {
            position: fixed;
            top: 0;
        }
        @media print {
            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                text-align: center;
            }
        }
        @media screen {
            .footer {
                position: relative;
                bottom: 0;
                width: 100%;
                text-align: center;
            }
        }


    </style>
    @stack(AppConst::PUSH_CSS)

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,400;0,700;1,400&family=Open+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap">
    {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">--}}
    {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>--}}
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" defer/>--}}
    {{--    <script src="https://kit.fontawesome.com/9487d74d1e.js" crossorigin="anonymous" defer></script>--}}
    {{--    <script src="https://kit.fontawesome.com/2c1e5308ba.js" crossorigin="anonymous" defer></script>--}}
</head>
<body style="background:white !important">
{{--<div id="loader-wrapper" style="">--}}
{{--    <img id="loader" src="{{ AppConst::SITE_LOGOS . '/logo-vertical.png' }}" alt="Loading"/>--}}
{{--</div>--}}
<div id="mainBody" style="margin: 0;
            padding: 0;
            font-family: Calibri, sans-serif;
            min-width: 400px;
            background-color: white;
            /*font-size: 12px;*/
            color: #1c345a;"> {{-- class="d-none"--}}
    <main>
        {{$slot}}
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        // window.onafterprint = window.close;
        window.print();
        window.close();
    });

</script>
</body>
</html>
