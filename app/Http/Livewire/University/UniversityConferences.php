<?php

namespace App\Http\Livewire\University;

use Livewire\Component;

class UniversityConferences extends Component
{
     public $languages , 
    $details_in_langs       = 1,
    $university,
    $addCenferenceDetailsInOtherLanguage = 1;
    
    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }
    public function addCenferenceDetailsInOtherLanguage()
    {
        ++$this->addCenferenceDetailsInOtherLanguage;
    }
    public function rules()
    {
        return [
            'conferences'                         => ['array'],
            'conferences.*'                       => ['present'],
            'conferences.name'                    => ['required','min:1'],
            'conferences.intro_about_conference'  => ['required','min:1'],
            'conferences.starts_date'             => ['required','min:1'],
            'conferences.end_date'                => ['required','min:1'],
            'conferences.url'                     => ['required','min:1'],
            'conferences.subjects'                => ['required','min:1'],
            'conferences.introduction'            => ['required','min:1'],
            'conferences.subject1'                => ['required','min:1'],
            'conferences.subject2'                => ['required','min:1'],
            'conferences.subject3'                => ['required','min:1'],
            'conferences.subject4'                => ['required','min:1'],
            // above input

            // select start
            // 'conferences.title'                   => ['required','min:1'],
            // 'conferences.position'                => ['required','min:1'],
            // 'conferences.school'                  => ['required','min:1'],
            // 'conferences.college'                 => ['required','min:1'],
            // 'conferences.department'              => ['required','min:1'],
            
            //'academic_name_eng' => ['required','min:1'],
            // 'quick_view.*' => ['present'],
            // 'quick_view.founded_year' => ['integer', 'max:' . date('Y')],
            // 'quick_view.no_alumni'=> ['integer','nullable'],
            // 'quick_view.no_students'=> ['integer','nullable'],
            // 'quick_view.no_schools'=> ['integer','nullable'],
            // 'quick_view.no_majors'=> ['integer','nullable'],
            // 'quick_view.no_conferences'=> ['integer','nullable'],
            // 'university_languages' => ['required', 'array', 'min:1'],
        ];
    } 

    public function render()
    {
        $this->university = \Auth::user()->selected_university;
        return view('livewire.university.university-conferences');
    }
}
