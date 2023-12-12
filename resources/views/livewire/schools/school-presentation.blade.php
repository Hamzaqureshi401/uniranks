<div>
<div class="col-lg-12">
              <div class="h4 blue mt-3">School Request for Presentation</div>
              <div class="h5 mt-4 blue">Find schools are looking to have a solo event with you</div>
              @foreach($presentations as $presentation)
                <div class="card mt-4">
                
                        <div class="p-3">
                            <div class="d-flex align-self-start justify-content-between">
                            <div class=" w-10 university-img-div">
                                <img src="{{ $presentation->school->logo ?? 'https://1.daeux.com/UR/new/assets/oxford.png' }}" class="" width="94px">
                                <!-- {{ $presentation->school->logo ?? 'No Logo Found' }} -->
                            </div>
                            <div class="w-90 ps-3 d-flex flex-column justify-content-between align-items-stretch">
                                <div class="top-content">
                                    <div class="col-lg-9">
                                        <div class="h5 blue mb-0"> {{ $presentation->school->school_name ?? '--'}}</div>
                                    </div>
                                    <div class="col-lg-3 light-blue light-blue-text text-place-end">Request for Presentation</div>
                                    
                                </div>
                                <div class="top-content">
                                    <div class="col-lg-5 d-flex align-items-center justify-content-between mt-2">
                                        <div class="col-lg-2 university-img-div"><img src="{{ $presentation->createdBy->profile_photo_path ?? 'https://1.daeux.com/UR/new/assets/profile/4.png' }}" class="" width="50px"></div>
                                        <div class="col-lg-10">
                                            <div class="blue mt-2">{{ $presentation->createdBy->name ?? '--'}}</div>
                                            <div class="d-md-flex mb-0 h6 mt-1 justify-content-between gray">
                                                <div class="mt-2">{{ $presentation->slots->count() }} Available Slots</div>
                                                 <div class="mt-2">First Available Slot: {{ $presentation->slots->first()->start_datetime }}</div>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-lg-1"></div>
                                    <div class="col-lg-6 text-place-end">
                                        <div class="d-md-flex justify-content-end mt-1 mobile-marg text-place-end">
                                        <button class="button-sm button-blue m-0 ">Booking Options</button>
                                        </div>
                                        <div class="d-md-flex text-place-end mt-1 justify-content-between mb-0 h6 gray">
                                            <div class="mt-2">Fees 20K AED ~ 40K AED</div>
                                             <div class="mt-2">Grade 12 Students:50</div>
                                             <div class="mt-2">Grade 11 Students:50</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        
                        </div>
                    </div>
                </div>

              <!--   <div class="card mt-4">
                
                        <div class="p-3">
                            <div class="d-flex align-self-start justify-content-between">
                            <div class=" w-10 university-img-div">
                                <img src="https://1.daeux.com/UR/new/assets/oxford.png" class="" width="94px">
                            </div>
                            <div class="w-90 ps-3 d-flex flex-column justify-content-between align-items-stretch">
                                <div class="top-content">
                                    <div class="col-lg-9">
                                        <div class="h5 blue mb-0">Hariot-watt University Malaysia-USA</div>
                                    </div>
                                    <div class="col-lg-3 light-blue light-blue-text text-place-end">Request for Presentation</div>
                                    
                                </div>
                                <div class="top-content">
                                    <div class="col-lg-5 d-flex align-items-center justify-content-between mt-2">
                                        <div class="col-lg-2 university-img-div"><img src="https://1.daeux.com/UR/new/assets/profile/4.png" class="" width="50px"></div>
                                        <div class="col-lg-10">
                                            <div class="blue mt-2">Scott Henry Request for Presentation</div>
                                            <div class="d-md-flex mb-0 h6 mt-1 justify-content-between gray">
                                                <div class="mt-2">5 Available Slots</div>
                                                 <div class="mt-2">First Available Slot: jan 15/2023</div>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-lg-1"></div>
                                    <div class="col-lg-6 text-place-end">
                                        <div class="d-md-flex justify-content-end mt-1 mobile-marg text-place-end">
                                        <button class="button-sm button-blue m-0 ">Booking Options</button>
                                        </div>
                                        <div class="d-md-flex text-place-end mt-1 justify-content-between mb-0 h6 gray">
                                            <div class="mt-2">Fees 20K AED ~ 40K AED</div>
                                             <div class="mt-2">Grade 12 Students:50</div>
                                             <div class="mt-2">Grade 11 Students:50</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        
                        </div>
                    </div>
                </div> -->
                
                @endforeach
                
              <!--   <div class="mt-5">
                    <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fa-solid fa-angle-left" aria-hidden="true"></i> </a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#"> <i class="fa-solid fa-angle-right" aria-hidden="true"></i> </a>
                      </li>
                    </ul>
                  </nav>
                </div> -->
            
            
            </div>
</div>
