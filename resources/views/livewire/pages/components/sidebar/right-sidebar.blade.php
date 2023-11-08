<div class="col mobile-hidden pe-0">
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
{{--    <div class="card mt-3">--}}
{{--        <div class="card-body">--}}
{{--            <h5 class="h5 blue">@lang('Join Events')</h5>--}}
{{--            <h6 class="h6 gray">@lang('Find & join Universities events')</h6>--}}
{{--            <hr>--}}
{{--            <ul class="sidebar-ul">--}}
{{--                <li class="mb-2">--}}
{{--                    <a @class(['a-underline blue','light-blue' => Route::is('admin.school.tours.show')])--}}
{{--                                    href="--}}{{--route('admin.school.tours.show')--}}{{--">@lang('Internation Tours Visit List')--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.events.openDays.list')])--}}
{{--                                    href="{{route('admin.events.openDays.list')}}">@lang('Open day')</a></li>--}}
{{--                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.events.workshops.list')])--}}
{{--                                    href="{{route('admin.events.workshops.list')}}">@lang('Workshops')</a></li>--}}
{{--                <li class="mb-2"><a class="a-underline blue" href="javascript:void(0)">@lang('Student for a day')</a></li>--}}
{{--                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.join.studentTour.show')])--}}
{{--                                    href="--}}{{--route('admin.school.join.studentTour.show')--}}{{--">@lang('Student tour')</a></li>--}}
{{--                <li class="mb-2"><a class="a-underline blue" href="javascript:void(0)">@lang('Competition')</a></li>--}}
{{--                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.university.list')])--}}
{{--                                    href="--}}{{--route('admin.university.list')--}}{{--">@lang('Universities List')</a></li>--}}
{{--                <li><a @class(['a-underline blue','light-blue' => Route::is('admin.school.join.u2c-meetings.show')])--}}
{{--                       href="--}}{{--route('admin.school.join.u2c-meetings.show')--}}{{--">@lang('One to One Meeting')</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    --}}{{--TODO:--}}
{{--    <div class="card mt-3">--}}
{{--        <div class="card-body">--}}
{{--            <h5 class="h5 blue">Support</h5>--}}
{{--            <h6 class="h6 gray">We are here to help</h6>--}}
{{--            <hr>--}}
{{--            <ul class="sidebar-ul">--}}
{{--                <li class="mb-2"><a class="a-underline blue active" href="javascript:void(0)">Creat a ticket</a></li>--}}
{{--                <li class="mb-2"><a class="a-underline blue" href="javascript:void(0)">Request Call Back</a></li>--}}
{{--                <li><a class="a-underline blue" href="javascript:void(0)">Chat with us</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    --}}{{--ENDTODO--}}
{{--    <div class="card mt-3">--}}
{{--        <div class="card-body">--}}
{{--            <h5 class="h5 blue">@lang('Share & Suggest')</h5>--}}
{{--            <h6 class="h6 gray">@lang('Invite Colleagues, & Universities')</h6>--}}
{{--            <hr>--}}
{{--            <ul class="sidebar-ul" x-data="{}">--}}
{{--                @foreach(['school','university'] as $type)--}}
{{--                <li class="mb-2"><a @class(['a-underline blue']) @click="$wire.emit('openInvitationModal','{{$type}}')"--}}
{{--                                    href="javascript:void(0)">--}}
{{--                        @lang("Suggest ".ucfirst($type))</a></li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
