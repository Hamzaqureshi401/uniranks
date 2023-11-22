<div class="blue">@lang('Add a new University Admission &amp; Semesters')</div>
   <div class="row mt-3">
      <div class="col-md-6 col-12">
         <div class="form-floating w-100">
            <select wire:model.defer="admission.semester" class="form-select input-field" id="floatingSelectGrid" aria-label="">
               <option>Select semesters</option>
            </select>
            <label for="floatingSelectGrid">@lang('Select semesters')</label>
         </div>
      </div>
      <div class="col-md-6 col-12 mobile-marg-2">
         <div class="form-floating w-100">
            <input wire:model.defer="admission.semester_start_date" type="text" class="input-field basicDate form-control flatpickr-input active" id="floatingInput" placeholder="Semesters start date" data-input="" readonly="readonly">
            <label for="floatingInput">@lang('Semesters start date')</label>
         </div>
      </div>
   </div>
   <div class="row mt-3">
      <div class="col-md-6 col-12">
         <div class="form-floating w-100">
            <input wire:model.defer="admission.admission_begin_date" type="text" class="input-field basicDate form-control flatpickr-input active" id="floatingInput" placeholder="Admission begin date" data-input="" readonly="readonly">
            <label for="floatingInput">@lang('Admission begin date')</label>
         </div>
      </div>
      <div class="col-md-6 col-12 mobile-marg-2">
         <div class="form-floating w-100">
            <input wire:model.defer="admission.admission_deadline_date" type="text" class="input-field basicDate form-control flatpickr-input active" id="floatingInput" placeholder="Admission deadline date" data-input="" readonly="readonly">
            <label for="floatingInput">@lang('Admission deadline date')</label>
         </div>
      </div>
   </div>
   <div class="mt-3">
      <div class="form-floating w-100">
         <textarea wire:model.defer="admission.ad_sm_note" class="form-control input-textarea" id="floatingInput" placeholder="Admission &amp; Semester Notes" rows="3"></textarea>
         <label for="floatingInput">@lang('Admission &amp; Semester Notes')</label>
      </div>
   </div>
   <div class="w-100 px-5 mt-4">
      <hr>
   </div>
   <div class=" text-place-end mb-4 mt-4">
      <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
      @lang('+ Add Admission &amp; Semsters Note Information different language')
      </button>
   </div>
   @for($i = 0; $i<$details_in_langs; $i++)
   @if($i > 0)
   <br>
   @endif
   <div class="card">
      <div class="card-body">
         <div class="language-div-1">
            <div class="col-md-5">
               <div class="form-floating w-100">
                  <select wire:model.defer="admission.lang-{{$i}}" class="form-select input-field"  aria-label="">
                     <option>Language(English)</option>
                  </select>
                  <label for="floatingSelectGrid">@lang('Select Language')</label>
               </div>
            </div>
            <div class="col-md-12 mt-3">
               <div class="form-floating w-100">
                  <textarea wire:model.defer="admission.ad_sm_note-{{$i}}" class="form-control input-textarea"  placeholder="Admission &amp; Semester Notes" rows="3"></textarea>
                  <label for="floatingInput">@lang('Admission &amp; Semester Notes')')</label>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endfor
