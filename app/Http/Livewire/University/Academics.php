<?php

namespace App\Http\Livewire\University;

use App\Models\General\Language;
use App\Models\Academic\Academic;
use App\Models\Research\ResearchField;
use App\Models\Institutes\School;




use Livewire\Component;

class Academics extends Component
{
     public $languages , 
            $details_in_langs   = 1,
            $academics          = [],
            $researchFields,
            $schools ;

    // public $academics;
    // public $types;
    // public $quick_view = []; 


    public function mount()
    {
        $this->languages = Language::all();
        //$this->types = UniversityType::orderBy('name')->get();
        //$this->categories = UniversityCategories::orderBy('name')->get();
        $this->initForm();
    }

    public function initForm()
    {
        $this->academics = Academic::get();
        $this->researchFields = ResearchField::get();
        $this->schools = School::get();
        //$this->university_languages = $university->languages()->pluck('languages.id')->toArray();

    }

    public function rules()
    {
        return [
            'academics'                         => ['array'],
            'academics.*'                       => ['present'],
            'academics.academic_name_eng'       => ['required','min:1'],
            'academics.email'                   => ['required','min:1'],
            'academics.p_p_web_url'             => ['required','min:1'],
            'academics.orcid'                   => ['required','min:1'],
            'academics.web_of_sc_id'            => ['required','min:1'],
            'academics.scopus_author_id'        => ['required','min:1'],
            'academics.research_gate_link'      => ['required','min:1'],
            'academics.google_scholar_link'     => ['required','min:1'],
            'academics.linkedin_url'            => ['required','min:1'],
            'academics.academic_email'          => ['required','min:1'],
            'academics.academic_name'           => ['required','min:1'],
            // above input

            // select start
            'academics.title'                   => ['required','min:1'],
            'academics.position'                => ['required','min:1'],
            'academics.school'                  => ['required','min:1'],
            'academics.college'                 => ['required','min:1'],
            'academics.department'              => ['required','min:1'],
            
            //'academic_name_eng' => ['required','min:1'],
            // 'quick_view.*' => ['present'],
            // 'quick_view.founded_year' => ['integer', 'max:' . date('Y')],
            // 'quick_view.no_alumni'=> ['integer','nullable'],
            // 'quick_view.no_students'=> ['integer','nullable'],
            // 'quick_view.no_schools'=> ['integer','nullable'],
            // 'quick_view.no_majors'=> ['integer','nullable'],
            // 'quick_view.no_academics'=> ['integer','nullable'],
            // 'university_languages' => ['required', 'array', 'min:1'],
        ];
    }

    public function save()
    {
        $inputs = $this->validate();
        // $qv_data = [];
        // foreach ($inputs['quick_view'] as $key => $value){
        //     $qv_data[$key] = (!empty($value) || $value == 0 ? $value:null);
        // }
        // $languages_data = $inputs['university_languages'];
        // $university = \Auth::user()->selected_university;
        // $university->quickView()->update($qv_data);
        // $university->languages()->sync($languages_data);

        dd(1);
        session()->flash('status', 'Operation Successful!');
    }

    // public function delete(){

    //     $university = \Auth::user()->selected_university;
    //     $university->quickView()->delete();
    //     session()->flash('status', 'Operation Successful!');
    // }

    
    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }

    public function render()
    {
        return view('livewire.university.academics');
    }
} 
