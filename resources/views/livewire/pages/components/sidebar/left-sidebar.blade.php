<div class="col mobile-hidden ps-0">
    @foreach($routes as $group_name=>$route_group)
        <div @class(["card",'mt-3'=>!$loop->first])>
            <div class="card-body">
                <h5 class="h5 blue">@lang($group_name)</h5>
                <h6 class="h6 gray">@lang($route_group['sub-title'])</h6>
                <hr>
                <ul class="sidebar-ul">
                    @foreach($route_group['links'] as $title => $route_name)
                        <li @class(['mb-2'=>!$loop->last])>
                            <a @class(['a-underline blue','light-blue'=>Route::is($route_name)]) href="{{route($route_name)}}">
                                @lang($title)
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    @endforeach
</div>
