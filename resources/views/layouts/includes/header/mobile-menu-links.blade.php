@php
    $routes  = [
         'Main Information' => [
                'sub-title'=>'Manage university detail',
                'links'=>[
                    'Main Information'=>'admin.university.mainInfo',
                    'Set Logos'=>'admin.university.setLogo',
                    'Domains'=>'admin.university.domains',
                    'Quick View'=>'admin.university.quickView',
                    'About'=>'admin.university.about',
                    'Front Banners'=>'admin.university.frontBanners',
//                    'Front Videos'=>'admin.university.frontVideos',
                    'Social Media Links'=>'admin.university.socialMedia',
                    'Galleries'=>'admin.media.show',
                ]
            ],
//             'User Profile' => [
//                'sub-title'=>'Manage Account detail',
//                'links'=>[
//                    'Profile'=>'admin.user.profile',
//                    'Emails'=>'admin.user.emails',
//                    'Phone Number'=>'admin.user.phoneNumber',
//                    'Password'=>'admin.user.password',
//                    'Active Sessions'=>'admin.user.sessions',
//                ]
//            ],

//            'University Facilities' => [
//                'sub-title'=>'Manage University Facilities',
//                'links'=>[
//                    'Buildings'=>'admin.university.mainBuilding',
//                    'Labs'=>'admin.university.labs',
//                    'housing'=>'admin.university.housing',
//                    'Athletics'=>'admin.university.sports',
//                    'Transportation'=>'admin.university.transport',
//                    'Student Life'=>'admin.university.studentLife',
//                    'Student Support'=>'admin.university.studentSupport',
//                ]
//            ],
             'Student Leads' => [
                'sub-title'=>'Manage your leads',
                'links'=>[
                    'My Leads'=>'admin.leads.owned',
                    'Leads Repository'=>'admin.leads.repository',
                ]
            ],
            'Schools'=>[
                'sub-title'=>'Join School Events',
                'links'=>[
                    'School Fairs'=>'admin.schoolFairs.fair.list',
                    'Schools List'=>'admin.school.list',
                    'One to One Meeting'=>'admin.school.list',
                ]
            ]
    ];
@endphp
<div class="hidden" id="navbarSupportedContent">
    <nav class="sidebar card mb-4">
        <ul class="nav flex-column gap-3" id="nav_accordion">
                @foreach($routes as $sub_category_name => $sub_routes )
                    <li class="nav-item has-submenu">
                        <a class="nav-link fs-3 fw-bold accordion-btn" href="#">@lang($sub_category_name)</a>
                        <ul class="submenu collapse">
                            @foreach($sub_routes['links'] as $title => $route_name)
                                <li><a class="nav-link submenu-item fs-4"
                                       href="{{route($route_name)}}">@lang($title)</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
        </ul>
    </nav>
</div>
