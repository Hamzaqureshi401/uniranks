@props(['links'=>[]])
<div wire:ignore>
    <nav class="navbar navbar-expand-lg navbar-light pb-0 px-0 bg-white container-fluid">
        <div class="container-fluid container px-md-0">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach($links as $link)
                        @php
                            $active = Route::is($link['route']);
                        @endphp
                        <li @class(['nav-item invoices-tab-item','active'=>$active])>
                            <a class="nav-link padding-left-0 " aria-current="page"
                               href="{{route($link['route'])}}">@lang($link['title'])</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

</div>
