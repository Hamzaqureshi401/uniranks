<div class="blue">@lang('Add a new University Admission &amp; Semesters')</div>
   <div class="row mt-3">
      <div class="col-md-6 col-12">
         <div class="form-floating w-100">


             <select wire:model.defer="admission.university_semester_id" class="form-select input-field" 
                              aria-label="" wire:change="loadSemesterDetail">
                              <option value="">@lang('Semester')</option>
                              @foreach($semesters ?? [] as $semester)
                              <option value="{{$semester->university_semester_id}}">{{$semester->semester->name}}</option>
                              @endforeach
             </select>
            <label for="floatingSelectGrid">@lang('Select semesters')</label>
         </div>
      </div>
      <div class="col-md-6 col-12 mobile-marg-2">
         <div class="form-floating w-100">
            <input wire:model.defer="admission.semester_start_date" type="text" class="input-field basicDate form-control flatpickr-input active" placeholder="Semesters start date" data-input="" readonly="readonly">
            <label for="floatingInput">@lang('Semesters start date')</label>
         </div>
      </div>
   </div>
   @if(!empty($semester_details))
   <div class="row mt-3">
    <div class="col-md-6 col-12">
        <div class="form-floating w-100">
            <input wire:model.defer="admission.start_date"
                   type="date"
                   class="input-field basicDate form-control flatpickr-input active"
                   placeholder="Admission begin date"
                   data-input=""
                   min="{{ $semester_details ? $semester_details->start_date : '' }}"
                   max="{{ $semester_details ? $semester_details->end_date : '' }}"
            >
            <label for="floatingInput">@lang('Admission begin date')</label>
        </div>
    </div>
    <div class="col-md-6 col-12 mobile-marg-2">
        <div class="form-floating w-100">
            <input wire:model.defer="admission.end_date"
                   type="date"
                   class="input-field basicDate form-control flatpickr-input active"
                   placeholder="Admission deadline date"
                   data-input=""
                   max="{{ $semester_details ? $semester_details->start_date : '' }}"
                   max="{{ $semester_details ? $semester_details->end_date : '' }}"
            >
            <label for="floatingInput">@lang('Admission deadline date')</label>
        </div>
    </div>
</div>
@endif

   <div class="mt-3">
      <div class="form-floating w-100">
         <textarea wire:model.defer="admission.c_description" class="form-control input-textarea" placeholder="Admission &amp; Semester Notes" rows="3"></textarea>
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
   
   <div class="card">
      <div class="card-body">
         <div class="language-div-3">
            <div class="mt-3 row">
               <div class="col-md-5 col-12">
                  <div class="form-floating w-100">
                    <select wire:model.defer="translations.{{$i}}" class="form-select input-field">
                                        <option value="">@lang('Select Language')</option>
                                        @foreach($languages as $language)
                                            <option
                                                value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
                                        @endforeach
                                    </select>
                     <label for="floatingSelectGrid">@lang('Select Language')</label>
                  </div>
               </div>
               <div class="col-md-7 col-12 mobile-marg-2">
                  <div class="form-floating w-100">
                     <input wire:model.defer="names.{{$i}}" class="form-control input-field" placeholder="Admission &amp; Semester Notes">
                     <label for="floatingInput">@lang('Admission &amp; Semester Notes')')</label>
                  </div>
               </div>
            </div>
         </div>


      </div>
   </div>
   @endif
   @endfor
