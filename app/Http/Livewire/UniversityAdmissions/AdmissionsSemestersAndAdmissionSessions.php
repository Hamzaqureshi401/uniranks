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
}
