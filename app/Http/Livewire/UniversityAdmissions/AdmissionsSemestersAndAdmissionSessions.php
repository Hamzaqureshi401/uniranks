<?php

namespace App\Http\Livewire\UniversityAdmissions;

use App\Models\General\Language;
use Livewire\Component;

class AdmissionsSemestersAndAdmissionSessions extends Component
{
      public $languages , 
    $details_in_langs       = 1;
    
    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }

    public function render()
    { 
        return view('livewire.university-admissions.admissions-semesters-and-admission-sessions');
    }

    public function rules()
    {
        return [
            'admission'                         => ['array'],
            'admission.*'                       => ['present'],
            'admission.semester'                => ['required','min:1'],
            'admission.semester_start_date'     => ['required','min:1'],
            'admission.admission_begin_date'    => ['required','min:1'],
            'admission.admission_deadline_date' => ['required','min:1'],
            'admission.ad_sm_note'              => ['required','min:1'],
            
            //'academic_name_eng' => ['required','min:1'],
            // 'quick_view.*' => ['present'],
            // 'quick_view.founded_year' => ['integer', 'max:' . date('Y')],
            // 'quick_view.no_alumni'=> ['integer','nullable'],
            // 'quick_view.no_students'=> ['integer','nullable'],
            // 'quick_view.no_schools'=> ['integer','nullable'],
            // 'quick_view.no_majors'=> ['integer','nullable'],
            // 'quick_view.no_admission'=> ['integer','nullable'],
            // 'university_languages' => ['required', 'array', 'min:1'],
        ];
    }
}
