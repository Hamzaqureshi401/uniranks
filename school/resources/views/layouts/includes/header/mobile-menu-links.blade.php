<div class="hidden" id="navbarSupportedContent">
    <nav class="sidebar card mb-4">
        <ul class="nav flex-column gap-3" id="nav_accordion">
{{--            <li class="nav-item has-submenu">--}}
{{--                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang("Notifications")</a>--}}
{{--                <ul class="submenu collapse">--}}
{{--                    <li><a class="nav-link submenu-item fs-4" href="#">@lang("Students inquiries")</a></li>--}}
{{--                    <li><a class="nav-link submenu-item fs-4" href="#">@lang("Messages")</a></li>--}}
{{--                    <li><a class="nav-link submenu-item fs-4" href="#">@lang("New Events")</a></li>--}}
{{--                    <li><a class="nav-link submenu-item fs-4" href="#">@lang("Students Chat")</a></li>--}}
{{--                    <li><a class="nav-link submenu-item fs-4" href="#">@lang("Application")</a></li>--}}
{{--                    <li><a class="nav-link submenu-item fs-4" href="#">@lang("My Schedule")</a></li>--}}
{{--                    <li><a class="nav-link submenu-item fs-4" href="#">@lang("My Calendar")</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang("Dashboard")</a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.information')}}?t=basic_info">@lang("School Basic Info")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.information')}}?t=location_info">@lang("Location and branches")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.information')}}?t=student_info">@lang("Schools Students")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.newBranch')}}">
                            @lang('School New Branch')</a></li>

                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang("Counselor")</a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.information')}}?t=user-personal-info">@lang("Basic Info")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.information')}}?t=user-emails">@lang("Primary Email address")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.information')}}?t=user-phone-number">@lang("Phone numbers")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.information')}}?t=user-password">@lang("Change Password")</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang("Create an Event")</a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.fair.list')}}">@lang("University Fair")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.career-talk.list')}}">@lang("Career Talk")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.sponsoredEvents')}}">@lang('Request Event Sponsor')</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang("Join Events")</a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4 coming-soon" href="{{route('admin.school.tours.show')}}">@lang("International Tours Visit List")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.join.universityEvents.openDay')}}">@lang("Open day")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.join.universityEvents.workshop')}}">@lang("Workshop")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.join.universityEvents.studentForADay')}}">@lang("Student for a day")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.join.universityEvents.compitition')}}">@lang("Competition")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.university.list')}}">@lang("Universities List")</a></li>
                    <li><a class="nav-link submenu-item fs-4 coming-soon" href="{{route('admin.school.join.u2c-meetings.show')}}">@lang("One to One Meeting")</a></li>
                </ul>
            </li>
{{--            <li class="nav-item has-submenu">--}}
{{--                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang("Students Applications")</a>--}}
{{--                <ul class="submenu collapse">--}}
{{--                    <li><a class="nav-link submenu-item fs-4" href="#">@lang("Applications List")</a></li>--}}
{{--                    <li><a class="nav-link submenu-item fs-4" href="#">@lang("Recommendation Letters")</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang("My students")</a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.students.list')}}">@lang("My students")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.students.add')}}">@lang("Add New Student")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.students.addBulk')}}">@lang("Add Bulk Students")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.students.registartion.link')}}">@lang("Registration Link")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.students.registartion.qr')}}">@lang("Registration QR Code")</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang("Counselor Support")</a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.counselor.courses')}}">@lang("Counselor Courses")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.counselor.workshops')}}">@lang("Counselor Workshops")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.counselor.events')}}">@lang("Counselor Events")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.counselor.international')}}">@lang("International Trips")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.counselor.conferences')}}">@lang("Conferences")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.counselor.visits')}}">@lang("University Visit")</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang("School SM Credit")</a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.schoolPoints.creditDetail')}}">@lang("SM credit over view")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.schoolPoints.schoolActivity')}}">@lang("School activity SM credit")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.schoolPoints.universityActivity')}}">@lang("University activity SM credit")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.schoolPoints.studentActivity')}}">@lang("Student activity SM credit")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.schoolPoints.convertCredit')}}">@lang("Convert SM credit")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.schoolPoints.creditHistory')}}">@lang("SM credit history")</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang("Support")</a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4 coming-soon" href="#">@lang("Create a ticket")</a></li>
                    <li><a class="nav-link submenu-item fs-4 coming-soon" href="#">@lang("Request Call Back")</a></li>
                    <li><a class="nav-link submenu-item fs-4 coming-soon" href="#">@lang("Chat with us")</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang("Share & Suggest")</a>
                <ul class="submenu collapse" x-data="{}">
                    @foreach(['school','university'] as $type)
                        <li><a class="nav-link submenu-item fs-4" @click="$wire.emit('openInvitationModal','{{$type}}')"
                                            href="javascript:void(0)"></a></li>
                        @lang("Suggest ".ucfirst($type))
                    @endforeach
                    <li><a  class="nav-link submenu-item fs-4" @click="$wire.emit('showShareEventModal')"
                                        href="javascript:void(0)">
                            @lang("Share Event")</a></li>
                    <li class=""><a  class="nav-link submenu-item fs-4"
                                    href="{{route('admin.school.inviteToEvent')}}"> @lang("Invite to Event")</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang("Statistics and Analysis")</a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.statistics.destinations.list')}}">@lang("Destinations Statistics")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.statistics.destinations.studentList')}}">@lang("Student Destinations List")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.statistics.destinations.coverage')}}">@lang("Destinations Coverage")</a></li>

                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.statistics.universities.list')}}">@lang("Universities statistics")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.statistics.universities.studentList')}}">@lang("Student Universities List")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.statistics.universities.coverage')}}">@lang("Universities Coverage")</a></li>

                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.statistics.majors.list')}}">@lang("Majors statistics")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.statistics.majors.studentList')}}">@lang("Student Majors List")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.statistics.majors.coverage')}}">@lang("Majors Coverage")</a></li>

                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.statistics.registrations.list')}}">@lang("Registration List")</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="{{route('admin.school.statistics.registrations.coverage')}}">@lang("Registration Coverage")</a></li>
                </ul>
            </li>
{{--            <li class="nav-item mb-3">--}}
{{--                <a class="nav-link fs-3 fw-bold" href="#">@lang("Universities")</a>--}}
{{--            </li>--}}
        </ul>
    </nav>
</div>
