<div class="container">
    <div class="row">
        @foreach($routes as $main_category => $top_rotes)
            <div class="col-2 dropdown menu-item">
                
                    <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        @lang($main_category)
                    </a>

                    <ul class="dropdown-menu1 shadow-sm dropdown-menu dropdown-menu-header" style="width: 100%" aria-labelledby="dropdownMenuLink">
                        @foreach($top_rotes as $sub_category_name => $sub_routes )
                            @if(!is_array($sub_routes))
                                <li><a class="dropdown-item font-1 font-light" href="{{route($sub_routes)}}">
                                        @lang($sub_category_name)</a></li>
                                <div class="dropdown-divider"></div>
                            @else
                                @if(!$loop->first)
                                    <div class="dropdown-divider"></div>
                                @endif
                                <li>
                                    <div class="pt-3 font-1 font-normal">
                                        @lang($sub_category_name)
                                    </div>
                                    @if(!empty($sub_routes['sub-title']))
                                        <div class="font-light gray">
                                            @lang($sub_routes['sub-title'])
                                        </div>
                                    @endif
                                    <ul>
                                        @foreach($sub_routes['links'] as $title => $route_name)
                                            <li>
                                                <div class="dropdown-divider"></div>
                                                <a @class(["dropdown-item font-light font-1" ]) href="{{route($route_name)}}">
                                                    @lang($title)
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                
            </div>
        @endforeach
        <div class="col-2 dropdown menu-item">
            <livewire:user.user-currency-selection/>
        </div>
    </div>
</div>
