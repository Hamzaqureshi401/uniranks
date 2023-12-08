<div class="blue">@lang('Add a new University Admission &amp; Semesters')</div>
   <div class="row mt-3">
      <div class="col-md-6 col-12">
         <div class="form-floating w-100">


             <select wire:model.defer="admission.university_semester_id" id="semester-select" class="form-select input-field" 
                              aria-label="" wire:change="loadSemesterDetail">
                              <option value="">@lang('Semester')</option>
                              @foreach($review_request ?? [] as $semester)
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

   <input type="hidden" id="st" value="{{ $semester_details ? $semester_details->start_date : '' }}">
   <input type="hidden" id="ed" value="{{ $semester_details ? $semester_details->end_date : '' }}">
    @if(!empty($semester_details))
   <div class="row mt-3">
    <div class="col-md-6 col-12">
        <div class="form-floating w-100">
            <input wire:model.defer="admission.start_date"
                   
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
   <div class=" text-place-end mb-4 mt-4">
      <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
      @lang('+ Add Admission &amp; Semsters Note Information different language')
      </button>
   </div>
   @push(AppConst::PUSH_CSS)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush
    @push(AppConst::PUSH_JS)
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        @if(app()->getLocale() != 'en')
            <script src="https://npmcdn.com/flatpickr/dist/l10n/{{app()->getLocale()}}.js"></script>
        @endif
        <script>
            document.addEventListener('DOMContentLoaded', function() {
    // Initialize Flatpickr for start date input
    addPickerToElement('.flatpickr-input', '{{ $semester_details ? $semester_details->start_date : "today" }}');

    // Initialize Flatpickr for end date input
    addPickerToElement('.flatpickr-input', '{{ $semester_details ? $semester_details->end_date : "today" }}');
});

// Function to add Flatpickr to an element
function addPickerToElement(el, min_date = "today") {
    return flatpickr(el, {
        locale: "{{ app()->getLocale() }}",
        enableTime: false,
        allowInput: false,
        minDate: min_date,
    });
}
$(document).ready(function() {
        $('#semester-select').change(function() {

            setTimeout(function() {
    var start_date = $('#st').val();
    var end_date = $('#ed').val();
    console.log(start_date, end_date);
    $('.flatpickr-input').flatpickr({
        locale: "{{ app()->getLocale() }}",
        enableTime: false,
        allowInput: false,
        minDate: start_date,
        maxDate: end_date,
    });
}, 3000); // Delay execution by 5000 milliseconds (5 seconds)

            
            
        


 });
    });
        </script>
    @endpush

