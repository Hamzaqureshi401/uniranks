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

    <link href="{{ AppConst::CDN_PATH }}" rel="preconnect" crossorigin>
    <style>
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
        table{
            width: 2.6378in;
            height: 3.89764in;
        }
        @media print {
            .centerOnPrintedPage {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 100vh;
            }

            /*.footer {*/
            /*    position: fixed;*/
            /*    bottom: 0;*/
            /*    width: 100%;*/
            /*    text-align: center;*/
            /*}*/
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
</head>
<body style="background:white !important">
<div id="mainBody" class="centerOnPrintedPage" style="margin: 0;
            padding: 0;
            font-family: Calibri, sans-serif;
            min-width: 400px;
            background-color: white;
            /*font-size: 12px;*/
            color: #1c345a;"> {{-- class="d-none"--}}
    <main>
        @php
        /**@var \App\Models\User $student*/
        @endphp
        <table >
            <tr>
                <td style="padding-left: 1.25rem;">
                    <img src="{{asset('assets/UR-QR-Print.svg')}}" alt="logo">
                </td>
            </tr>
            <tr>
                <td style="display:  flex; align-items: center; padding-top: 1rem;">
                    <img style="width: 40px; height: 40px;  border-radius:50%!important" alt="" src="{{$student->profile_photo_url}}">
                    <div style="margin-left: 10px">
                        <p class="blue" style="margin: 0; color:#1C345AFF ; print-color-adjust: exact; font-size: 1rem"><b>{{$student->name ?: $student->userBio?->full_name}}</b></p>
                        <p class="blue mb-0" style="margin: 0; color:#1C345AFF; print-color-adjust: exact; font-size: 1rem">{{$student->userBio?->city?->city_name}},{{$student->userBio?->country?->country_name}}</p>
                    </div>

                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 1rem;">
                    <p class="gray mb-0" style="margin: 0; color: #9b9b9b;  print-color-adjust: exact; font-size: 1rem">
                        @if(!empty($student?->userBio?->study_status_id) && $student?->userBio?->study_status_id != 2)
                            {{$student?->userBio?->studyStatus?->title}}
                        @else
                            @if(!empty($student?->userBio->studyLevel))
                                @lang('Studying in') {{$student?->userBio->studyLevel?->title}}
                            @else
                                @lang("Looking to study undergraduate")
                            @endif
                        @endif
                    </p>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 1.25rem;">
                    <div style="
                    print-color-adjust: exact;
    padding: 1.5rem;
    background: linear-gradient(to right, #1c345a 6px, transparent 6px) 0 0,
    linear-gradient(to right, #1c345a 6px, transparent 6px) 0 100%,
    linear-gradient(to left, #1c345a 6px, transparent 6px) 100% 0,
    linear-gradient(to left, #1c345a 6px, transparent 6px) 100% 100%,
    linear-gradient(to bottom, #1c345a 6px, transparent 6px) 0 0,
    linear-gradient(to bottom, #1c345a 6px, transparent 6px) 100% 0,
    linear-gradient(to top, #1c345a 6px, transparent 6px) 0 100%,
    linear-gradient(to top, #1c345a 6px, transparent 6px) 100% 100%;
    background-repeat: no-repeat;
    background-size: 50px 50px;
    ">
                        {!! QrCode::size(300)->backgroundColor(255,255,255)->color(28, 52, 90)->generate($student->id)  !!}
                    </div>
                </td>
            </tr>
        </table>

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
