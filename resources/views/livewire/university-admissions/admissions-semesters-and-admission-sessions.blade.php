<div>
<div class="d-md-flex  align-items-center">
                  <div class="h4 blue">@lang('University Admissions')</div>
                  <div class="light-gray col-marg h4 mobile-nav-hidden">|</div>
                   <div class="h4 blue col-marg">
                     @lang('Semesters') &amp; @lang('Admission Sessions')
                    </div>
               </div>
                <div class="paragraph-style-2 blue  mb-3">
                   @lang('State University Admission Semesters with Admission deadline')
                </div>
               



   <div class="card">
      <div class="card-body">
         
         <x-general.status-alert/>
         <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
         @include('livewire.university-admissions.AdmissionsSemestersAndAdmissionSessions-pages.admissions-main-page')
         <!-- <div x-data="{created_date: @entangle('support_information.created_date').defer}"
            x-init="addDatePicker($refs.created_date);"> -->
            
            
         <!-- </div> -->
      </div>
   </div>
   <br>
      <div class="row-h">
         <div class="col-md-6 offset-6 d-flex justify-content-md-end">
            <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
            <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Cancel')</button>
         </div>
      </div>
      <div class="w-100 px-4 mt-3">
         <hr>
      </div>
      
   @include('livewire.university-admissions.AdmissionsSemestersAndAdmissionSessions-pages.admission-list')
         
            
   <x-general.loading message="Processing..."/>
</div> 