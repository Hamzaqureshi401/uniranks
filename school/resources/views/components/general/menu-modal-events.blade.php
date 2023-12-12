<div class="modal" id="menu-popup-events" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header position-absolute w-100" style="z-index: 10000;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="d-flex">
                <div class="auth-card-sidebar d-none d-md-block">
                    <div class="auth-card-overlay p-4">
                        <div class="d-flex">
                            <x-jet-authentication-card-logo/>
                        </div>
                        <div class="mt-5">
                            <div>
                                <h3 class="ms-3 ">{{__('School Menu')}}</h3>
                                <ul style="list-style: none">
                                    <li><a href="{{route('admin.dashboard')}}" class="text-light text-decoration-none">{{ __('Dashboard') }}</a></li>
                                    <li><a href="{{route('admin.university.list')}}" class="text-light text-decoration-none">{{ __('Universities') }}</a></li>
                                    <li><a href="{{route('admin.school.students.list')}}" class="text-light text-decoration-none">{{ __('Students') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="auth-card-main flex-fill p-5">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="h5 blue">@lang('Join Events')</h5>
                            <h6 class="h6 gray">@lang('Find & join Universities events')</h6>
                            <hr>
                            <ul class="sidebar-ul">
                                <li class="">
                                    <a @class(['a-underline blue coming-soon','light-blue' => Route::is('admin.school.tours.show')])
                                       href="{{route('admin.school.tours.show')}}">@lang('Internation Tours Visit List')
                                    </a>
                                </li>
                                <li class=""><a @class(['a-underline blue','light-blue' => Route::is('admin.school.join.universityEvents.openDay')])
                                                    href="{{route('admin.school.join.universityEvents.openDay')}}">@lang('Open day')</a></li>
                                <li class=""><a @class(['a-underline blue','light-blue' => Route::is('admin.school.join.universityEvents.workshop')])
                                                    href="{{route('admin.school.join.universityEvents.workshop')}}">@lang('Workshop')</a></li>
                                <li class=""><a @class(['a-underline blue','light-blue' => Route::is('admin.school.join.universityEvents.studentForADay')])
                                                    href="{{route('admin.school.join.universityEvents.studentForADay')}}">@lang('Student for a day')</a></li>
                                <li class=""><a @class(['a-underline blue','light-blue' => Route::is('admin.school.join.universityEvents.compitition')])
                                                    href="{{route('admin.school.join.universityEvents.compitition')}}">@lang('Competition')</a></li>
                                <li class=""><a @class(['a-underline blue coming-soon','light-blue' => Route::is('admin.school.join.studentTour.show')])
                                                    href="{{route('admin.school.join.studentTour.show')}}">@lang('Student tour')</a></li>
                                <li class=""><a @class(['a-underline blue','light-blue' => Route::is('admin.university.list')])
                                                    href="{{route('admin.university.list')}}">@lang('Universities List')</a></li>
                                <li><a @class(['a-underline blue coming-soon','light-blue' => Route::is('admin.school.join.u2c-meetings.show')])
                                       href="{{route('admin.school.join.u2c-meetings.show')}}">@lang('One to One Meeting')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
