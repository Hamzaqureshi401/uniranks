{{-- <div class="container"> 
     <div class="row">
        @foreach($routes as $main_category => $top_rotes)
            <div class="col-2 dropdown menu-item">
                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    @lang($main_category)
                </a>

                <ul class="dropdown-menu1 shadow-sm dropdown-menu dropdown-menu-header list-unstyled" style="width: 100%; margin-left: 8px !important;" aria-labelledby="dropdownMenuLink">
                    @foreach($top_rotes as $sub_category_name => $sub_routes )
                        @if(!is_array($sub_routes))
                            <a class="dropdown-item font-1 font-light mr-8 text-wrap" href="{{route($sub_routes)}}">
                                @lang($sub_category_name)
                            </a>
                            <div class="dropdown-divider"></div>
                        @else
                            @if(!$loop->first)
                                <div class="dropdown-divider full-width"></div>
                            @endif

                            <div class="pt-3 font-1 font-normal mr-8">
                                @lang($sub_category_name)
                            </div>
                            @if(!empty($sub_routes['sub-title']))
                                <div class="font-light gray mr-8">
                                    @lang($sub_routes['sub-title'])
                                </div>
                            @endif
                            <ul class="list-unstyled mr-8">
                                @foreach($sub_routes['links'] as $title => $route_name)
                                    <div class="dropdown-divider full-width"></div>
                                    <a @class(["dropdown-item font-light font-1 text-wrap" ]) href="{{route($route_name)}}">
                                        @lang($title)
                                    </a>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endforeach
        <div class="col-2 dropdown menu-item">
            <livewire:user.user-currency-selection/>
        </div>
    </div> 
 </div> --}}
 <div class="container">
@include('layouts.includes.header.metoxi-header-left-side-manue') 
</div>
