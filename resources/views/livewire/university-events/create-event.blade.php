<div>
    <div class="row">
        <div class="col-12">
            <div x-data="{ showFilters:false }" class="w-100">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between blue">
                        <div class="h5 blue">Create Events</div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-body">
                    <p class="h4 hover-blue-color">Create a Work Shop</p>
                    <p class="paragraph-style2">The Student Admissions Agreement provides you with access to a pool of leads
                        that closely align with your agent profile's study destinations, majors, and programs. The unique benefit
                        of this agreement is that you can access these leads without the requirement of adding actual funds to
                        your account. In exchange for this service, we will charge a commission fee of 20% based on the
                        enrollments you secure.</p>
                    <div class="text-end">
                        <a href="{{ route('admin.events.workshops.list')}}" class="button button-sm button-blue"> Create a Work Shop</a>
                    </div>
                   <!--  <div class="text-end">
                        <button class="button button-sm button-blue">Learn Mor Subscribe</button>
                    </div> -->
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-body">
                    <p class="h4 hover-blue-color">Create a Open Days</p>
                    <p class="paragraph-style2">Our platform offers a comprehensive leads repository service, enabling you to
                        filter and discover students who align with your university preferences: By topping up your account, you
                        gain access to the tools necessary to search for and connect with these prospective students.</p>
                    <div class="text-end">
                        <a href="{{ route('admin.events.openDays.list')}}" class="button button-sm button-blue"> Create a Open Days</a>
                    </div>
                    <!-- <div class="text-end">
                        <button class="button button-sm button-blue" type="button" wire:click="openModal">Top up Your Account                        </button>
                    </div> -->
                </div>
            </div>
        
            
            <div class="card mb-4">
                <div class="card-body">
                    <p class="h4 hover-blue-color">Create a Competitions</p>
                    <p class="paragraph-style2">The UNIRANKS Events Packages enable universities and education agents to connect
                        with students during the SchoolsMaster university fair events. These packages are designed to provide
                        comprehensive support, including powerful tools that facilitate communication and student matching both
                        during and after the event.</p>
                     <div class="text-end">
                        <a href="{{ route('admin.events.competitions.list')}}" class="button button-sm button-blue"> Create a Competitions</a>
                    </div>
                    <!-- <div class="text-end mt-2">
                        <a href="http://127.0.0.1:8000/admin/account/event-packages" class="button button-sm button-blue text-decoration-none">Purchase Event
                            Package</a>
                    </div> -->
                </div>
            </div>
        
            
             <div class="card mb-4">
                <div class="card-body">
                    <p class="h4 hover-blue-color">Create Student For a Days</p>
                    <p class="paragraph-style2">The UNIRANKS Events Packages enable universities and education agents to connect
                        with students during the SchoolsMaster university fair events. These packages are designed to provide
                        comprehensive support, including powerful tools that facilitate communication and student matching both
                        during and after the event.</p>
                     <div class="text-end">
                        <a href="{{ route('admin.events.studentForADays.list')}}" class="button button-sm button-blue"> Create a Student For a Days</a>
                    </div>
                    <!-- <div class="text-end mt-2">
                        <a href="http://127.0.0.1:8000/admin/account/event-packages" class="button button-sm button-blue text-decoration-none">Purchase Event
                            Package</a>
                    </div> -->
                </div>
            </div>
        
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
