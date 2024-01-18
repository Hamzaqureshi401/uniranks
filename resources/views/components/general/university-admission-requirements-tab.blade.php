<div>
    <x-general.university-admissions-page-title sub-title="University General Admission Requirements"/>
    <div class="paragraph-style-2 blue  mb-3">
        <p class="mb-0">@lang('Add University Admission Requirements')</p>
    </div>
    <div class="card mt-1">
        <div class="card-body pt-0">
            @php
                $links = [
                        ['title'=>'Admissions Requirments','route'=>'admin.university.admissionRequirements.show','alies'=>[]],
                                [
                                'title'=>'Previous Grades',
                                'route'=>'admin.university.admissionRequirements.previousGrades.show',
                                'alies'=>[
                                        'admin.university.admissionRequirements.previousGrades.undergraduate',
                                        'admin.university.admissionRequirements.previousGrades.postgraduate',
                                        'admin.university.admissionRequirements.previousGrades.phd',
                                        ]
                                ],
                                [
                                'title'=>'English Test',
                                'route'=>'admin.university.admissionRequirements.englishTest.show',
                                'alies'=>[
                                        'admin.university.admissionRequirements.englishTest.undergraduate',
                                        'admin.university.admissionRequirements.englishTest.postgraduate',
                                        'admin.university.admissionRequirements.englishTest.phd',
                                        ]
                                ],
                                [
                                'title'=>'Entry Test',
                                'route'=>'admin.university.admissionRequirements.entryTest.show',
                                'alies'=>[
                                        'admin.university.admissionRequirements.entryTest.undergraduate',
                                        'admin.university.admissionRequirements.entryTest.postgraduate',
                                        'admin.university.admissionRequirements.entryTest.phd',
                                        ]
                                ],
                                 ['title'=>'Education Documents','route'=>'admin.university.admissionRequirements.education','alies'=>[]],
                                 ['title'=>'Travel Documents','route'=>'admin.university.admissionRequirements.travel','alies'=>[]],
                                 ['title'=>'Other Documents','route'=>'admin.university.admissionRequirements.others','alies'=>[]]

                        ]
            @endphp
                <!-- Header Lg -->
            <nav class="navbar navbar-expand-lg navbar-light pb-0 px-0 bg-white container-fluid"
                 style="border-radius: 0.9rem;">
                <div class="container-fluid container px-md-0">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @foreach($links as $link)
                                @php
                                    $active = Route::is($link['route']) || in_array(Route::currentRouteName(),$link['alies']);
                                @endphp
                                <li @class(['nav-item invoices-tab-item','active'=>$active])>
                                    <a class="nav-link padding-left-0 " aria-current="page"
                                       href="{{route($link['route'])}}">@lang($link['title'])</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>

            {{$slot}}
       
</div>
