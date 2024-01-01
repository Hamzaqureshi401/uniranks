<div>
<div class="col-lg-12">
      <x-general.status-alert/>
         <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
       
              <div class="h4 blue mt-3">School Request for Presentation
              @include('about-icon')</div>
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
                                            <div class="blue mt-2">{{ !empty($presentation->createdBy->name) ? $presentation->createdBy->name : 'Name Not Found For The User Please Update!'}}</div>
                                            <div class="d-md-flex mb-0 h6 mt-1 justify-content-between gray">
                                                <div class="mt-2">{{ $presentation->slots->count() }} Available Slots</div>
                                                 <div class="mt-2">First Available Slot: {{ $presentation->slots->first()->start_datetime }}</div>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-lg-1"></div>
                                    <div class="col-lg-6 text-place-end">
                                        <div class="d-md-flex justify-content-end mt-1 mobile-marg text-place-end">
                                         <button wire:click="getSlots({{ $presentation->id }})"  class="button-sm button-blue m-0 ">Booking Options</button>
      
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

                
                @endforeach
                
             
            <!-- Modal -->

            
            </div>
            <div class="modal fade" id="slotsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Slots</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Livewire component rendering the slots -->
                @if($slots)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Start Date Time</th>
                                <th>Action</th>
                                <!-- Add more columns as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slots as $slot)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $slot->start_datetime }}</td>
                                <td>

                                    @if($slot->status == 0)
                                    @if($slot->where('reserved_by' , Auth::id())->where('status' , 1)->count() >= 1)
                                    <button class="button-sm button-orange mobile-btn w-98">Already Accepted 1 Slot!</button>
                                    @else
                                    <span wire:click="confirmSlot({{ $slot->id }})" style="cursor: pointer;" class="button-sm button-blue m-0">Confirm</span>
                                    @endif
                                    
                                    @else
                                    <button class="button-sm button-green mobile-btn w-98">Accepted</button>
                                    @endif
                                </td>
                                <!-- Render other slot data -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No slots available</p>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function () {
        console.log(1);
        Livewire.on('showSlotsModal', () => {
            $('#slotsModal').modal('show'); // Show the modal when the event is emitted
        });
    });
     document.addEventListener('livewire:load', function () {
        Livewire.on('closeModal', () => {
            $('#slotsModal .btn-close').click(); // Hide the modal when the event is emitted
            $('#slotsModal').modal('show');
        });
    });
</script>
</div>
