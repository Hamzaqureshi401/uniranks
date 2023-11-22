<?php

namespace App\Http\Livewire\University;

use App\Models\General\Language;
use App\Models\Academic\Academic;
use App\Models\Research\ResearchField;
use App\Models\Institutes\School;
use Auth;
use Livewire\Component;

class Academics extends Component
{
     public $languages , 
            $details_in_langs   = 1,
            $academics,
            $academics_form,
            $researchFields,
            $schools,
            $names = [],
            $descriptions = [],
            $academics_list;

    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
        $this->initForm();
    }

    public function initForm()
    {
        $this->academics      = Academic::where('user_id' , Auth::id())->get();
        $this->researchFields = ResearchField::get();
        $this->schools        = School::get();
        $this->translations   = [];
        $this->translations[] = 'en';
        
    }

    public function rules()
    {
        return [
            'academics_form'                         => ['array' , 'required'],
            'academics_form.*'                       => ['present'],
            'names'                                  => ['array'],
            'academics_form.email'                   => 'required|email|max:255|unique:academics,email',

            // 'academics.academic_name_eng' => 'required|string|max:255',
             
            // 'academics_form.title' => 'required|string|max:255',
            // 'academics.position' => 'required|string|max:255',
            // 'academics.school_id' => 'required|exists:schools,id',
            // 'academics.college_id' => 'required|string|max:255',
            // 'academics.web_of_sc_id'=>'required|string|max:255' ,
            // 'academics.department_id' => 'required|string|max:255',
            // 'academics.p_p_web_url' => 'nullable|url|max:255',
            // 'academics.orcid' => 'nullable|string|max:255',
            // 'academics.web_of_science_research_id' => 'nullable|string|max:255',
            // 'academics.scopus_author_id' => 'nullable|string|max:255',
            // 'academics.research_gate_link' => 'nullable|url|max:255',
            // 'academics.google_scholar_link' => 'nullable|url|max:255',
            // 'academics.linkedin_url' => 'nullable|url|max:255',
            // 'academics.academic_email' => 'nullable|email|max:255',
        // Add other fields and their validation rules here
    
             //'academics_form.first_name'       => ['required'],
           
        ];
    }

    public function save()
    {
        $inputs = $this->validate();
         $data = ['user_id' => Auth::id()];
         foreach ($this->translations as $key => $lang) {
            if(!empty($this->names[$key])){
                $data['description'][$lang] = $this->names[$key];
            }
            
        }
        $final = array_merge($data , $this->academics_form);
        Auth::user()->academics()->create($final);
        $this->initForm();
        session()->flash('status', 'Operation Successful!');
    }

     public function delete($id){
        
        Academic::where('id' , $id)->delete();
        $this->initForm();
        session()->flash('status', 'Delete Successful!');
     }

    
    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }

    public function render()
    {
        return view('livewire.university.academics');
    }
} 
