<div>
    <div class="row">
        <div class="col-12">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between blue">
                        <div class="h5 blue">University Information</div>
                    </div>
                </div>
            </div>

            @foreach($routes['Information']['links'] as $key => $rout)
            
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            
                    <p class="h4 hover-blue-color">{{ $key }}</p>
                    <p class="paragraph-style2">The Student Admissions Agreement provides you with access to a pool of leads
                        that closely align with your agent profile's study destinations, majors, and programs. The unique benefit
                        of this agreement is that you can access these leads without the requirement of adding actual funds to
                        your account. In exchange for this service, we will charge a commission fee of 20% based on the
                        enrollments you secure.</p>
                    </div>
                    <div class="col-12">
                    <div class="text-end mt-3">
                        <a href="{{ route($rout)}}" class="button button-sm button-blue"> {{ $key }}</a>
                    </div>

                    </div>
                        </div>
                    
                   <!--  <div class="text-end">
                        <button class="button button-sm button-blue">Learn Mor Subscribe</button>
                    </div> -->
                </div>
            </div>

            @endforeach
            
            
        
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
