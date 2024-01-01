      <div class="mt-3 mb-3">
         <div class="h2 blue">@lang("WORLD'S LARGEST SCHOOLS EVENT PLATFORM")
            @include('about-icon')
         </div>
         <!-- <div class="paragraph-style1 gray font-normal mt-3"></div> -->
      </div>
      <div class="row g-2">
         <!--to force new line-->
         <div class="col-12 col-md-4 col-lg-3">
            <a href="{{ route('admin.school.list')}}">
         
            <div class="card">
               <div class="p-3 statistics-card-content">
                  <div class="d-flex justify-content-between">
                     <h5 class="h5 blue">@lang('Schools')</h5>
                     <!-- <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4> -->
                  </div>
                  <!-- <div class="row mt-2 align-items-center">
                     <div class="col-12">
                     
                                                 <h3 class="h2 blue">214</h3>
                                         </div>
                     </div> -->
                  <div class="row mt-2">
                     <p class="blue paragraph-style2">@lang('Manage School accounts, student, counselors, events and more') </p>
                  </div>
                  <!-- <div class="row mt-2">
                     <p class="blue paragraph-style2"></p>
                     </div> -->
                  <div class="mt-2 d-flex justify-content-between align-items-center">
                     <div class="">
                        <img src="{{asset('assets/icons/school-solid.svg')}}" width="30px">
                     </div>
                     <div class="align-self-end">
                        <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                     </div>
                  </div>
               </div>
            </div>
            </a>
         </div>
         <!--to force new line--> 
         <div class="col-12 col-md-4 col-lg-3">
         <a href="{{ route('admin.events.create-event')}}">
            <div class="card">
               <div class="p-3 statistics-card-content">
                  <div class="d-flex justify-content-between">
                     <h5 class="h5 blue">@lang("Create Event")</h5>
                     <!-- <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4> -->
                  </div>
                  <!-- <div class="row mt-2 align-items-center">
                     <div class="col-12">
                     
                                                 <h3 class="h2 blue">214</h3>
                                         </div>
                     </div> -->
                  <div class="row mt-2">
                     <p class="blue paragraph-style2">@lang("Create the couselor account, sub-accounts, and basic information") </p>
                  </div>
                  <!-- <div class="row mt-2">
                     <p class="blue paragraph-style2"></p>
                     </div> -->
                  <div class="mt-2 d-flex justify-content-between align-items-center">
                     <div class="">
                        <img src="{{asset('assets/icons/calendar-days-solid.svg')}}" width="30px">
                     </div>
                     <div class="align-self-end">
                        <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                     </div>
                  </div>
               </div>
            </div>
            </a>
         </div>
         <!--to force new line-->
         <div class="col-12 col-md-4 col-lg-3">
         <a href="{{ route('admin.leads.owned')}}">
         
            <div class="card">
               <div class="p-3 statistics-card-content">
                  <div class="d-flex justify-content-between">
                     <h5 class="h5 blue">@lang("My Students")</h5>
                     <!-- <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4> -->
                  </div>
                  <!-- <div class="row mt-2 align-items-center">
                     <div class="col-12">
                     
                                                 <h3 class="h2 blue">214</h3>
                                         </div>
                     </div> -->
                  <div class="row mt-2">
                     <p class="blue paragraph-style2">@lang("Create student's accounts, manage students, and more, and more")</p>
                  </div>
                  <!-- <div class="row mt-2">
                     <p class="blue paragraph-style2"></p>
                     </div> -->
                  <div class="mt-2 d-flex justify-content-between align-items-center">
                     <div class="">
                        <img src="{{asset('assets/icons/users-solid.svg')}}" width="30px">
                     </div>
                     <div class="align-self-end">
                        <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                     </div>
                  </div>
               </div>
            </div>
         </a>
         </div>
         <div class="col-12 col-md-4 col-lg-3">
         <a href="{{ route('admin.university.university-main-information-view')}}">
            <div class="card">
               <div class="p-3 statistics-card-content">
                  <div class="d-flex justify-content-between">
                     <h5 class="h5 blue">@lang("My University")</h5>
                     <!-- <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4> -->
                  </div>
                  <!-- <div class="row mt-2 align-items-center">
                     <div class="col-12">
                     
                                                 <h3 class="h2 blue">214</h3>
                                         </div>
                     </div> -->
                  <div class="row mt-2">
                     <p class="blue paragraph-style2">@lang("List universities, manage students, and more, and more")</p>
                  </div>
                  <!-- <div class="row mt-2">
                     <p class="blue paragraph-style2"></p>
                     </div> -->
                  <div class="mt-2 d-flex justify-content-between align-items-center">
                     <div class="">
                        <img src="{{asset('assets/icons/building-columns-solid.svg')}}" width="30px">
                     </div>
                     <div class="align-self-end">
                        <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                     </div>
                  </div>
               </div>
            </div>
            </a>
         </div>
         <div class="col-12 col-md-4 col-lg-3">
         <a href="{{ route('admin.schoolFairs.fair.list')}}">
            <div class="card">
               <div class="p-3 statistics-card-content">
                  <div class="d-flex justify-content-between">
                     <h5 class="h5 blue">@lang("University Fairs")</h5>
                     <!-- <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4> -->
                  </div>
                  <!-- <div class="row mt-2 align-items-center">
                     <div class="col-12">
                     
                                                 <h3 class="h2 blue">214</h3>
                                         </div>
                     </div> -->
                  <div class="row mt-2">
                     <p class="blue paragraph-style2">@lang("Run a university fair with few clicks, invite local and international universities")</p>
                  </div>
                  <!-- <div class="row mt-2">
                     <p class="blue paragraph-style2"></p>
                     </div> -->
                  <div class="mt-2 d-flex justify-content-between align-items-center">
                     <div class="">
                        <img src="{{ asset('assets/icons/shop-solid.svg') }}" width="30px">
                     </div>
                     <div class="align-self-end">
                        <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                     </div>
                  </div>
               </div>
            </div>
            </a>
         </div>
         <div class="col-12 col-md-4 col-lg-3">
         <a href="{{ route('admin.schoolFairs.careerTalks.list')}}">
         
            <div class="card">
               <div class="p-3 statistics-card-content">
                  <div class="d-flex justify-content-between">
                     <h5 class="h5 blue">@lang("Career Talk")</h5>
                     <!-- <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4> -->
                  </div>
                  <!-- <div class="row mt-2 align-items-center">
                     <div class="col-12">
                     
                                                 <h3 class="h2 blue">214</h3>
                                         </div>
                     </div> -->
                  <div class="row mt-2">
                     <p class="blue paragraph-style2">@lang("Manage School accounts, student, counselors, events and more") </p>
                  </div>
                  <!-- <div class="row mt-2">
                     <p class="blue paragraph-style2"></p>
                     </div> -->
                  <div class="mt-2 d-flex justify-content-between align-items-center">
                     <div class="">
                        <img src="{{ asset('assets/icons/chalkboard-user-solid.svg') }}" width="30px">
                     </div>
                     <div class="align-self-end">
                        <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                     </div>
                  </div>
               </div>
            </div>
         </a>
         </div>
         <div class="col-12 col-md-4 col-lg-3">
         <a href="{{ route('admin.schools.presentation')}}">
         
            <div class="card">
               <div class="p-3 statistics-card-content">
                  <div class="d-flex justify-content-between">
                     <h5 class="h5 blue">@lang("Request for Presentation")</h5>
                     <!-- <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4> -->
                  </div>
                  <!-- <div class="row mt-2 align-items-center">
                     <div class="col-12">
                     
                                                 <h3 class="h2 blue">214</h3>
                                         </div>
                     </div> -->
                  <div class="row mt-2">
                     <p class="blue paragraph-style2">@lang("ask a university to give your students a presentation about their major university")</p>
                  </div>
                  <!-- <div class="row mt-2">
                     <p class="blue paragraph-style2"></p>
                     </div> -->
                  <div class="mt-2 d-flex justify-content-between align-items-center">
                     <div class="">
                        <img src="{{ asset('assets/icons/person-chalkboard-solid.svg') }}" width="30px">
                     </div>
                     <div class="align-self-end">
                        <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                     </div>
                  </div>
               </div>
            </div>
         </a>
         </div>
         <div class="col-12 col-md-4 col-lg-3">
         <a href="{{ route('admin.university.confirm-one-to-one-meeting')}}">
            <div class="card">
               <div class="p-3 statistics-card-content">
                  <div class="d-flex justify-content-between">
                     <h5 class="h5 blue">@lang("Request a Meeting")</h5>
                     <!-- <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4> -->
                  </div>
                  <!-- <div class="row mt-2 align-items-center">
                     <div class="col-12">
                     
                                                 <h3 class="h2 blue">214</h3>
                                         </div>
                     </div> -->
                  <div class="row mt-2">
                     <p class="blue paragraph-style2">@lang("Request a meeting with SchoolMaster Team or a university representative")</p>
                  </div>
                  <!-- <div class="row mt-2">
                     <p class="blue paragraph-style2"></p>
                     </div> -->
                  <div class="mt-2 d-flex justify-content-between align-items-center">
                     <div class="">
                        <img src="{{ asset('assets/icons/handshake-simple-solid.svg') }}" width="30px">
                     </div>
                     <div class="align-self-end">
                        <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                     </div>
                  </div>
               </div>
            </div>
            </a>
         </div>
         <!--to force new line-->
      </div>
      <div class="h22 blue mt-4">@lang('Student Statisctics')
      @include('about-icon')</div>
      <div class="d-md-flex justify-content-between">
         <div class="paragraph-style1 gray font-normal align-self-center">@lang("Monitor student Statistics UAE")</div>
         <div class="d-md-flex col-md-4 mobile-marg-2">
            <div class="col-md-6" style="padding-right: 5px">
               <select class="input-field form-control">
                  <option>@lang("Province")</option>
               </select>
            </div>
            <div class="col-md-6">
               <div class="col-marg">
                  <select class="input-field form-control">
                     <option>@lang("City")</option>
                  </select>
               </div>
            </div>
         </div>
      </div>
      <!-- Your HTML content using the calculatePercentage function -->
      <!-- ... -->
      <div class="row mt-1 g-2">
         <!--to force new line-->
         @foreach($student_statistics as $value)
         <div class="col-12 col-md-4 col-lg-3">
            <div class="card">
               <div class="p-3 statistics-card-content">
                  <div class="d-flex justify-content-between">
                     <h5 class="h5 blue">{{ $value['title'] }}</h5>
                  </div>
                  <div class="row mt-2 align-items-center">
                     <div class="col-12">
                        <h3 class="h2 blue">{{ $value['title_count'] }}</h3>
                     </div>
                  </div>
                  <div class="row mt-2">
                     <p class="blue paragraph-style2"> {{ 
                        $value['percentage'] }} 
                     </p>
                  </div>
                  <div class="row">
                     <div class="col-10">
                        <div class="blue small mt-1">
                           {{ $value['sub-title'] }}
                        </div>
                     </div>
                     <div class="col-2">
                        <div class="align-self-end">
                           <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
         <!--to force new line-->
         <div class="h22 blue mt-5">@lang("Event Statisctics")
         @include('about-icon')</div>
         <div class="paragraph-style1 gray font-normal mt-2">@lang("Monitor students events")</div>
         <div class="row mt-1 g-2">
            @foreach($event_statistics as $value)
            <div class="col-12 col-md-4 col-lg-3">
               <div class="card">
                  <div class="p-3 statistics-card-content">
                     <div class="d-flex justify-content-between">
                        <h5 class="h5 blue">{{ $value['title'] }}</h5>
                        <!-- <h4 class="h4 light-Registrations text-end"><i class="fa-solid fa-angle-right"></i></h4>
                           -->
                     </div>
                     <div class="row mt-2 align-items-center">
                        <div class="col-12">
                           <h3 class="h2 blue">{{ $value['title_count'] }}</h3>
                        </div>
                     </div>
                     <div class="row mt-2">
                        <p class="blue paragraph-style2"> {{ 
                           $value['percentage'] }} 
                        </p>
                     </div>
                     <div class="row">
                        <div class="col-10">
                           <div class="blue small mt-1">
                              {{ $value['sub-title'] }}
                           </div>
                        </div>
                        <div class="col-2">
                           <div class="align-self-end">
                              <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         <div class="h22 blue mt-5">@lang("Students Events Statisctics")
         @include('about-icon')</div>
         <div class="paragraph-style1 gray font-normal mt-2">@lang("Monitor student's events attendance &amp; engagements")</div>
         <div class="row mt-1 g-2">
            @foreach($students_events_statisctics as $value)
            <div class="col-12 col-md-4 col-lg-3">
               <div class="card">
                  <div class="p-3 statistics-card-content">
                     <div class="d-flex justify-content-between">
                        <h5 class="h5 blue">{{ $value['title'] }}</h5>
                        <!-- <h4 class="h4 light-Registrations text-end"><i class="fa-solid fa-angle-right"></i></h4>
                           -->
                     </div>
                     <div class="row mt-2 align-items-center">
                        <div class="col-12">
                           <h3 class="h2 blue">{{ $value['title_count'] }}</h3>
                        </div>
                     </div>
                     <div class="row mt-2">
                        <p class="blue paragraph-style2"> {{ 
                           $value['percentage'] }} 
                        </p>
                     </div>
                     <div class="row">
                        <div class="col-10">
                           <div class="blue small mt-1">
                              {{ $value['sub-title'] }}
                           </div>
                        </div>
                        <div class="col-2">
                           <div class="align-self-end">
                              <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
            <div class="col-12 col-md-4 col-lg-3">
               <div class="card">
                  <div class="p-3 statistics-card-content">
                     <div class="d-flex justify-content-between">
                        <h5 class="h5 blue">{{ 'Performance' }}</h5>
                        <!--  <h4 class="h4 light-Registrations text-end"><i class="fa-solid fa-angle-right"></i></h4>
                           -->
                     </div>
                     <div class="row mt-2 align-items-center">
                        <div class="col-12">
                           <span class="mb-2 fa fa-star checked" aria-hidden="true"></span>
                           <span class="mb-2 fa fa-star checked" aria-hidden="true"></span>
                           <span class="mb-2 fa fa-star checked" aria-hidden="true"></span>
                           <span class="mb-2 fa fa-star" aria-hidden="true"></span>
                           <span class="mb-2 fa fa-star" aria-hidden="true"></span> 
                        </div>
                     </div>
                     <!-- <div class="row mt-2">
                        <p class="blue paragraph-style2"> 
                        </p>
                        </div> -->
                     <div class="row">
                        <div class="col-10">
                           <div class="blue small mt-1">
                              {{ 'Rated by 6521 Users' }}
                           </div>
                        </div>
                        <div class="col-2">
                           <div class="align-self-end">
                              <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="h2 blue mt-5">@lang('School and Universities Statisctics')
         @include('about-icon')</div>
         <div class="paragraph-style1 gray font-normal mt-2">@lang("Monitor Schools and Universities listed, and recognized.")</div>
         <div class="row mt-1 g-2">
            @foreach($school_and_universities_statisctics as $value)
            <div class="col-12 col-md-4 col-lg-3">
               <div class="card">
                  <div class="p-3 statistics-card-content">
                     <div class="d-flex justify-content-between">
                        <h5 class="h5 blue">{{ $value['title'] }}</h5>
                        <!--  <h4 class="h4 light-Registrations text-end"><i class="fa-solid fa-angle-right"></i></h4>
                           -->
                     </div>
                     <div class="row mt-2 align-items-center">
                        <div class="col-12">
                           <h3 class="h2 blue">{{ $value['title_count'] }}</h3>
                        </div>
                     </div>
                     <div class="row mt-2">
                        <p class="blue paragraph-style2"> {{ 
                           $value['percentage'] }} 
                        </p>
                     </div>
                     <div class="row">
                        <div class="col-10">
                           <div class="blue small mt-1">
                              {{ $value['sub-title'] }}
                           </div>
                        </div>
                        <div class="col-2">
                           <div class="align-self-end">
                              <i class="fa-solid light-blue font-1-5rem fa-angle-right"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
     
   