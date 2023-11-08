<div class="container row align-items-center top-menu-container mb-4">
    <!-- Example single danger button -->
    @foreach($routes as $main_category => $top_rotes)
        <div class="dropdown menu-item col">
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
                            <div class="pt-3  font-1 font-normal">
                                @lang($sub_category_name)
                            </div>
                        </li>
                        @if(!empty($sub_routes['sub-title']))
                            <li>
                                <div class="font-light gray">
                                    @lang($sub_routes['sub-title'])</div>
                            </li>
                        @endif
                        @foreach($sub_routes['links'] as $title => $route_name)
                            <div class="dropdown-divider"></div>
                            <li><a @class(["dropdown-item font-light font-1" ])
                                   href="{{route($route_name)}}">
                                    @lang($title)
                                </a>
                            </li>

                        @endforeach
                    @endif
                @endforeach
            </ul>
        </div>
    @endforeach
    <livewire:user.user-currency-selection/>
</div>

