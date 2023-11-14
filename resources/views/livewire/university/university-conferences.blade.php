<div>
 <div class="d-md-flex justify-content-between  align-items-center">
                  <div class="h4 mb-0 blue">University Conferences</div>
                 
                  
               </div>
               <div class="h4 mt-3 blue">Conferences &amp; Workshops Data</div>
                <div class="paragraph-style-2 blue">
                  This is where you will need to update some records related to Conferences and Workshops Activities
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <div class="col-md-6 col-12">
                        <select class="form-control input-field">
                            <option>Select Entry Type</option>
                            <option>Conferences</option>
                            <option>Workshops</option>
                        </select>
                    </div>
                    
                </div>
   <div class="card">
      <div class="card-body">
         
         <x-general.status-alert/>
         <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
         @include('livewire.university.university-conference-pages.conference-common-page')
         <!-- <div x-data="{created_date: @entangle('support_information.created_date').defer}"
            x-init="addDatePicker($refs.created_date);"> -->
            
            
         <!-- </div> -->
      </div>
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
      
   @include('livewire.university.university-conference-pages.conference-list')
         
            
   <x-general.loading message="Processing..."/>
</div>  