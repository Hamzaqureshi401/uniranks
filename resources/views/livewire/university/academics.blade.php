<div>
   <!-- <div class="d-md-flex justify-content-between  align-items-center">
   <div class="h4 mb-0 blue">@lang('University Academics')</div>
  
</div> -->
<div class="d-md-flex justify-content-between">
    <div class="blue col-md-12">
        <div class="d-md-flex align-items-center">
            <div class="h4 mb-0 blue">University Academics</div>
            <div class="light-gray col-marg h4 mobile-hidden">|</div>
            <div class="h4 mb-0 blue col-marg">Academics Researches</div>
        </div>
    </div>
</div>
<div class="h4 mt-3 blue">@lang('Academics') &amp; Researches</div>
<div class="paragraph-style-2 blue">
   @lang('This is where you will need to update some records related to Academics') &amp; Researches
</div>
<div class="d-md-flex justify-content-end mt-2">
   <div class="col-md-5 col-12 mobile-marg-2">
      <select class="form-control input-field">
         <option>Select Entry Type</option>
         <option>Select Journel</option>
         <option>Select Workshop</option>
      </select>
   </div>
</div>
   <div class="card mt-1">
      <div class="card-body">
         
         <x-general.status-alert/>
         <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
         @include('livewire.university.academics-pages.academics-common-page')
        
      </div>
   </div>
     <!--  <div class="row-h">
         <div class="col-md-6 offset-6 d-flex justify-content-md-end">
            <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
            <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Cancel')</button>
         </div>
      </div> -->
       <div class="row mt-4">
        <div class="col-md-6 offset-6 d-flex justify-content-md-end">
            <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
            @if(!empty($edit_item))
                <button wire:click="initForm(true)" class="button-orange button-sm mobile-button w-35">@lang('Reset')</button>
            @endif
            <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Cancel')</button>
        </div>
    </div>
      <div class="w-100 px-4 mt-3">
         <hr>
      </div>
      
   @include('livewire.university.academics-pages.academics-list')
            
   <x-general.loading message="Processing..."/>
</div> 