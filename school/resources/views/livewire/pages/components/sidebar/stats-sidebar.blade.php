<div class="col mobile-hidden ps-0">
    <div class="card">
        <div class="card-body">
            <h5 class="h5 blue">@lang('Student Registration')</h5>
            <h6 class="h6 gray">@lang('a very good look at everything')</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.registrations.list') ])
                       href="{{route('admin.school.statistics.registrations.list')}}">
                        @lang('Registered Students')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.registrations.coverage') ])
                       href="{{route('admin.school.statistics.registrations.coverage')}}">
                        @lang('Diagram view')
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="h5 blue">@lang('University Statistics')</h5>
            <h6 class="h6 gray">@lang('a very good look at everything')</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.universities.list') ])
                       href="{{route('admin.school.statistics.universities.list')}}">
                        @lang('University selections')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.universities.studentList') ])
                       href="{{route('admin.school.statistics.universities.studentList')}}">
                        @lang('Student selections')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.universities.coverage') ])
                       href="{{route('admin.school.statistics.universities.coverage')}}">
                        @lang('Diagram View')
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="h5 blue">@lang('Major Statistics')</h5>
            <h6 class="h6 gray">@lang('a very good look at everything')</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.majors.list') ])
                       href="{{route('admin.school.statistics.majors.list')}}">
                        @lang('Major Analysis')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.majors.studentList') ])
                       href="{{route('admin.school.statistics.majors.studentList')}}">
                        @lang('Student Choices')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.majors.coverage') ])
                       href="{{route('admin.school.statistics.majors.coverage')}}">
                        @lang('Diagram view')
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="h5 blue">@lang('Destinations Statistics')</h5>
            <h6 class="h6 gray">@lang('a very good look at everything')</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.destinations.list') ])
                       href="{{route('admin.school.statistics.destinations.list')}}">
                        @lang('Desired Destinations')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.destinations.studentList') ])
                       href="{{route('admin.school.statistics.destinations.studentList')}}">
                        @lang('Student Choices')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.destinations.coverage') ])
                       href="{{route('admin.school.statistics.destinations.coverage')}}">
                        @lang('Diagram view')
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

