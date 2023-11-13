<div>
   <div class="card">
      <div class="card-body">
         <div class="d-md-flex justify-content-between  align-items-center">
            <div class="h4 mb-0 blue">@lang('Location and Branches')</div>
         </div>
         <br>
         <div class="paragraph-style-2 blue">
            @lang('If the university has multiple branches locally and/or in other countries, add first the main branch, then add each branch after that below. Please Note you must give each branch a name, branch name can be (university name + city and/or country name) or the offical name for the university branch.')
         </div>
         <x-general.status-alert/>
         <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
         <!-- <div x-data="{created_date: @entangle('support_information.created_date').defer}"
            x-init="addDatePicker($refs.created_date);"> -->
            @for($i = 0; $i<$add_new_location; $i++)
            @if($i > 0)
            <br>
            @endif
            @include('livewire.university.location-branches-pages.location-and-branches-main-page')
            @endfor
         <!-- </div> -->
      </div>
      <div class="row-h">
         <div class="col-md-6 offset-6 d-flex justify-content-md-end">
            <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
            <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Cancel')</button>
         </div>
      </div>
      <div class="w-100 px-4 mt-3">
         <hr>
      </div>
      <div class="row-h text-center">
         <div class="fw-bold col-md-3">00971 50 9587831/ ext 050</div>
         <div class="col-md-3">Created on 15 Jan 2022</div>
         <div class="col-md-3">By David Scott</div>
         <div class="col-md-3"><a href="" class="red ">Delete</a></div>
      </div>
      <br>
   </div>
   <div class=" text-place-end mt-4 mb-4">
      <button class="m-0 button-no-bg" wire:click="addNewLocation" type="button">
      @lang('+ Add New Branch with a Location')
      </button>
   </div>
   @include('livewire.university.location-branches-pages.location-&-branches-list')   
   <x-general.loading message="Processing..."/>
</div>