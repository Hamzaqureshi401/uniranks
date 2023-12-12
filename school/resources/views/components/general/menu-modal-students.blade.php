<div class="modal" id="menu-popup-students" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
                        <div class="col-4">
                            <h5 class="h5 blue">@lang('My Students')</h5>
                            <h6 class="h6 gray">@lang('Manage students registration')</h6>
                            <hr>
                            <ul class="sidebar-ul">
                                <li class=""><a @class(['a-underline blue','light-blue' => Route::is('admin.school.students.list')])
                                                    href="{{route('admin.school.students.list')}}">@lang('My Students')</a></li>
                                <li class=""><a @class(['a-underline blue','light-blue' => Route::is('admin.school.students.add')])
                                                    href="{{route('admin.school.students.add')}}">@lang('Add New Student')</a></li>
                                <li class=""><a
                                        @class(['a-underline blue','light-blue' => Route::is('admin.school.students.addBulk')])
                                        href="{{route('admin.school.students.addBulk')}}">@lang('Add Bulk Students')</a></li>
                                <li class=""><a
                                        @class(['a-underline blue','light-blue' => Route::is('admin.school.students.registartion.link')])
                                        href="{{route('admin.school.students.registartion.link')}}">@lang('Registration Link')</a></li>
                                <li><a @class(['a-underline blue','light-blue' => Route::is('admin.school.students.registartion.qr')])
                                       href="{{route('admin.school.students.registartion.qr')}}">@lang('Registration QR Code')</a></li>
                            </ul>
                        </div>
                        <div class="col-8">
                            <h5 class="h5 blue">@lang('Statistics and Analysis')</h5>
                            <h6 class="h6 gray">@lang('a very good look at everything')</h6>
                            <hr>
                            <ul class="sidebar-ul">
                                <li>
                                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.registrations.list') ])
                                       href="{{route('admin.school.statistics.registrations.list')}}">
                                        @lang('Registration List')
                                    </a>
                                </li>
                                <li class="">
                                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.registrations.coverage') ])
                                       href="{{route('admin.school.statistics.registrations.coverage')}}">
                                        @lang('Registration Coverage')
                                    </a>
                                </li>
                                <li class="">
                                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.universities.list') ])
                                       href="{{route('admin.school.statistics.universities.list')}}">
                                        @lang('Universities Statistics')
                                    </a>
                                </li>
                                <li class="">
                                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.universities.studentList') ])
                                       href="{{route('admin.school.statistics.universities.studentList')}}">
                                        @lang('Student Universities List')
                                    </a>
                                </li>
                                <li class="">
                                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.universities.coverage') ])
                                       href="{{route('admin.school.statistics.universities.coverage')}}">
                                        @lang('Universities Coverage')
                                    </a>
                                </li>
                                <li class="">
                                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.majors.list') ])
                                       href="{{route('admin.school.statistics.majors.list')}}">
                                        @lang('Majors statistics')
                                    </a>
                                </li>
                                <li class="">
                                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.majors.studentList') ])
                                       href="{{route('admin.school.statistics.majors.studentList')}}">
                                        @lang('Student Majors List')
                                    </a>
                                </li>
                                <li class="">
                                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.majors.coverage') ])
                                       href="{{route('admin.school.statistics.majors.coverage')}}">
                                        @lang('Majors Coverage')
                                    </a>
                                </li>
                                <li class="">
                                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.destinations.list') ])
                                       href="{{route('admin.school.statistics.destinations.list')}}">
                                        @lang('Destinations & Statistics')
                                    </a>
                                </li>
                                <li class="">
                                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.destinations.studentList') ])
                                       href="{{route('admin.school.statistics.destinations.studentList')}}">
                                        @lang('Student Destinations List')
                                    </a>
                                </li>
                                <li class="">
                                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.destinations.coverage') ])
                                       href="{{route('admin.school.statistics.destinations.coverage')}}">
                                        @lang('Destinations Coverage')
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
