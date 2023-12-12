<div>
    <div class="row">
        <div class="col-12 d-flex justify-content-between">
            <div class="h4 text-blue">@lang('Share School Registration Link')</div>
            <div class="d-flex align-items-center" style="cursor: pointer">
                <i class="fas fa-print primary-text mx-2" onclick="printDivContent()" title="@lang('Print')"></i>
            </div>
        </div>
    </div>
    @php
        /**
        * @var \App\Models\Institutes\School $school;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  */
    @endphp
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body" id="print-section">
                    <div class="w-100">
                        <div class="d-flex justify-content-center align-items-center flex-column"
                             style="display: flex; justify-content: center; align-items: center; flex-flow: column">
                            <img src="{{AppConst::SITE_LOGOS}}/Logo-stars-v1.png"
                                 style="width: 75%; margin-bottom: 1rem">
                            <p class="h2 primary-text mb-3" style="font-size: 2rem;
    line-height: 2rem;;color: #1c345a; margin-top: 1rem;  font-family: Calibri, sans-serif;">@lang('Your future begin here')</p>
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
    background-size: 50px 50px;">
                                {!! QrCode::size(300)->backgroundColor(255,255,255)->color(28, 52, 90)->generate($qr_data)  !!}
                            </div>
                            <p class="h2 primary-text mt-3" style="font-size: 2rem;
    line-height: 2rem;;color: #1c345a; margin-top: 1rem; font-family: Calibri, sans-serif;">@lang('Scan Me')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push(AppConst::PUSH_JS)
        <script type="text/javascript">
            function printDivContent() {
                let contentOfDiv = document.getElementById("print-section").innerHTML;
                let newWin = window.open('', '', 'height=650, width=650');
                newWin.document.write('<title>{{$school->school_name}} {{__("Registration QR Code")}} </title>');
                newWin.document.write("")
                // newWin.document.write("");

                newWin.document.write(contentOfDiv);
                setTimeout(()=>{
                    newWin.print();
                    newWin.close();
                    },150)
            }
        </script>
    @endpush
</div>
