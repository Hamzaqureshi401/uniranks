<div class="sticky-footer">
    <nav class="navbar-expand-lg navbar-dark  px-lg-0 bg-dark-blue container-fluid">
        <div class="container-fluid container px-lg-0">
            <div class="collapse navbar-collapse primary-bg">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item secondary-bg">
                        <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#menu-popup">
                            @lang('Support')
                        </a>
                    </li>
                    <li class="nav-item"><a href="javascript:void(0)" class="nav-link" data-bs-toggle="modal" data-bs-target="#menu-popup-dashboard">@lang('Dashboard')</a></li>
                    <li class="nav-item  px-0"><span class="nav-link px-0" href="#">|</span></li>
                    <li class="nav-item"><a href="javascript:void(0)" class="nav-link" data-bs-toggle="modal" data-bs-target="#menu-popup-dashboard">@lang('School')</a></li>
                    <li class="nav-item  px-0"><span class="nav-link  px-0" href="#">|</span></li>
                    <li class="nav-item"><a href="javascript:void(0)" class="nav-link"data-bs-toggle="modal" data-bs-target="#menu-popup-students">@lang('Students')</a></li>
                    <li class="nav-item  px-0"><span class="nav-link  px-0" href="#">|</span></li>
                    <li class="nav-item"><a href="javascript:void(0)" class="nav-link" data-bs-toggle="modal" data-bs-target="#menu-popup-events">@lang('Events')</a></li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item secondary-bg">
                        <a class="nav-link active padding-left-0" aria-current="page" href="{{route('admin.school.schoolPoints.creditHistory')}}">
                            @lang('Credit'): <livewire:pages.components.total-sm-credit/>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<x-general.menu-modal-dashboard/>
<x-general.menu-modal-events/>
<x-general.menu-modal-students/>

