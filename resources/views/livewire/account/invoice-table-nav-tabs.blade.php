<div>
    <!-- Header Lg -->
    <nav class="navbar navbar-expand-lg navbar-light pb-0 bg-white container-fluid"
         style="border-radius: 0.9rem;">
        <div class="container-fluid container px-md-0">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach($links as $link)
                        <li @class(['nav-item invoices-tab-item','active'=>Route::is($link['route'])])>
                            <a class="nav-link padding-left-0 " aria-current="page"
                               href="{{route($link['route'])}}">@lang($link['title'])</a>
                        </li>
                    @endforeach
                </ul>
                <div class="primary-text">
                    @lang('Export Transaction')
                    <a href="{{$exportExcelUrl ?: 'javascript:void(0)' }}" @if(!empty($exportExcelUrl)) target="_blank" @endif  class="a-underline blue"><i class="ms-2 fa-solid fa-file-excel pointer"></i></a>
                    <a href="{{$exportPdfUrl ?: 'javascript:void(0)'}}" @if(!empty($exportPdfUrl))  target="_blank" @endif  class="a-underline blue"><i class="ms-1 fa-solid fa-file-pdf pointer"></i></a>
                </div>
            </div>
        </div>
    </nav>
</div>
