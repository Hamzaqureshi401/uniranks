<div>
    <div class="d-md-flex align-items-center">
        <div class="h4 blue">@lang('University Main Information')</div>
        <div class="light-gray mobile-nav-hidden col-marg h4">|</div>
        <div class="h4 blue col-marg">
            @lang('Direct Admission Contact')
            @include('about-icon')
        </div>
    </div>
    <div class="paragraph-style-2 blue">
   @lang('Update the direct admission enrolment and add the legal university name')
</div>
    <div class="card mt-3">
        <div class="card-body">
            <x-general.status-alert name="status"/>
            <form>
                <div class="blue paragraph-style2">
                    @lang('this is where you need to update the direct admission and enrolment department phone number, or the main university number with the extension number')
                </div> 
                @php
                    /**
                    * @var \App\Models\General\Countries[] $countries
                    **/
                @endphp
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="form-floating w-100">
                            <select wire:model.defer="dial_code" class="form-select input-field" id="floatingSelectGrid"
                                    aria-label="">
                                <option value="">@lang('Country Code')</option>
                                @foreach($countries ?? [] as $country)
                                    <option value="{{$country->country_code}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">@lang('Country Code')</label>
                        </div>
                        <x-jet-input-error for="dial_code" class="mt-2" />
                    </div>
                    <div class="col-md-7">
                        <div class="form-floating w-100">
                            <input wire:model.defer="phone_number" class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Phone Number')">
                            <label for="floatingInput">@lang('Phone Number')</label>
                        </div>
                        <x-jet-input-error for="phone_number" class="mt-2" />
                    </div>
                    <div class="col-md-2">
                        <div class="form-floating w-100">
                            <input wire:model.defer="ext" class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('extension')">
                            <label for="floatingInput">@lang('extension')</label>
                        </div>
                    </div>
                </div>
                <div class="d-md-flex text-place-end mt-3 mb-3 justify-content-end">
                    <button class="m-0 button-no-bg" type="button" wire:click="save">+ @lang('Add phone number')</button>
                </div>
            </form>
            <x-general.loading message="Processing Your Request.." />
            <div class="w-100 mt-4 px-4">
                <hr>
            </div>
            @php
                /**
                * @var \App\Models\University\UniversityContactNumber[] $contacts
                **/
            @endphp


        </div>
    </div>
    @if(!empty($contacts))
<div class="card bg-transparent mt-4">
    <div class="card-body">
        <div class="h4 blue">@lang('Contacts')</div>
         <div class="w-100 px-4 mt-3">
        <hr>
    </div>
     <table class="table">
    <!-- <thead>
        <tr>
            <th>@lang('Phone Number')</th>
            <th>@lang('Created on')</th>
            <th>@lang('By')</th>
            <th></th>
        </tr>
    </thead> -->
    <tbody>
        @forelse($contacts as $contact)
            <tr>
                <td class="blue">{{$contact->full_phone_number}} {{!empty($contact->ext) ? '/'.__('ext')." $contact->ext":""}}</td>
                <td class="font-light blue">{{$contact->created_at?->toDayDateTimeString()}}</td>
                <!-- <td class="font-light blue">{{$contact->createdBy?->name ?:"---"}}</td> -->
                <td class="text-end blue">
                    <a href="javascript:void(0)" wire:click="edit('{{$contact->id}}')" class="light-blue">@lang('Edit')</a>
                </td>
                @if($loop->index != 0)
                <td class="text-end blue">
                    
                     
                    <a href="javascript:void(0)" wire:click="deleteContact('{{$contact->id}}')" class="red">@lang('Delete')</a>

                   

                </td>
                 @endif
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">@lang('No Contact Added Yet!')</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
</div>
@endif

   <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Update Contact</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!-- Livewire component rendering the slots -->
               @if(!empty($edit))
               <div  class="row">
                 <div class="col-md-12 mt-3">
                        <div class="form-floating w-100">
                            <select wire:model.defer="edit_dial_code" class="form-select input-field" 
                                    aria-label="">
                                <option value="">@lang('Country Code')</option>
                                @foreach($countries ?? [] as $country)
                                    <option value="{{$country->country_code}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">@lang('Country Code')</label>
                        </div>
                        <x-jet-input-error for="dial_code" class="mt-2" />
                    </div>
                  <div class="col-md-12 mt-3">
                     <input wire:model.defer="edit_phone_number" class="form-control input-field" placeholder="Update Contact Number" value="{{ $edit->phone_number }}">
                  </div>
                 
                  <div class="col-md-12 mt-3">


                        <div class="form-floating w-100">
                            <input wire:model.defer="edit_ext" class="form-control input-field" value="{{ $edit->ext ?? '' }}"
                                   placeholder="@lang('extension')">
                            <label for="floatingInput">@lang('extension')</label>
                        </div>
                    
                     
                  </div>
                 
                  <div class="col-md-12 mt-3">
                     <a href="javascript:void(0)" wire:click="updateContact({{$edit->id}})" class="btn btn-primary">@lang('Update Contact')</a>
                  </div>
               </div>
               @else
               <p>No Data available</p>
               @endif
            </div>
         </div>
      </div>
   </div>
<script type="text/javascript">
     document.addEventListener('livewire:load', function () {
       console.log(1);
       Livewire.on('showContactModal', () => {
           $('#contactModal').modal('show'); // Show the modal when the event is emitted
       });
   });
    document.addEventListener('livewire:load', function () {
       Livewire.on('closeModalcontact', () => {
           $('#contactModal .btn-close').click(); // Hide the modal when the event is emitted
           //$('#contactModal').modal('show');
       });
   });
</script>
</div>
