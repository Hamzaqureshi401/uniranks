<?php

namespace App\Http\Livewire\University;

use App\Models\General\Language;
use App\Models\Academic\Academic;
use App\Models\Research\ResearchField;
use App\Models\Institutes\School;
use Auth;
use Illuminate\Support\Facades\Validator;

use Livewire\Component;

class Academics extends Component
{
     public $languages , 
            $details_in_langs   = 0,
            $academics,
            $academics_form,
            $researchFields,
            $edit_item,
            $schools,
            $names = [],
            $descriptions = [],
            $edit_id,
            $academics_list;

    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
        $this->initForm();
    }

    public function initForm($reset = false)
    {
        if (!empty($this->edit_id) && $reset) {
            $this->setupEditForm();
            return;
        }
        $this->academics      = Academic::where('user_id' , Auth::id())->get();
        $this->researchFields = ResearchField::get();
        $this->schools        = School::get();
        $this->translations   = [];
        $this->details_in_langs   = 0;
        $this->translations[] = 'en';
        
    }

    public function rules()
    {
        return [
            'academics_form'                         => ['array' , 'required'],
            'academics_form.*'                       => ['present'],
            'names'                                  => ['array'],
            'academics_form.email'                   => 'required|email|max:255|unique:academics,email',
           
        ];
    }

    public function save()
    {
        if (empty($this->edit_item)) {
            $inputs = $this->validate();
        }
         $data = ['user_id' => Auth::id()];
         foreach ($this->translations as $key => $lang) {
            if(!empty($this->names[$key])){
                $data['description'][$lang] = $this->names[$key];
            }
            
        }
        $final = array_merge($data , $this->academics_form);
        if (!empty($this->edit_item)) {
            $this->edit_item->update($final);
        } else {
           Auth::user()->academics()->create($final);
        }
        $this->edit_item = null;
        $this->edit_id = null;
        $this->initForm();
        $this->refreshForm();
        session()->flash('status', 'Operation Successful!');
    }

    public function refreshForm(){

        $this->academics_form = null;
        $this->names = null;

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

     public function edit($id)
    { 
        $this->edit_id = $id;
        $this->setupEditForm();
    }
     public function setupEditForm(): void
    {
        $this->edit_item = Academic::find($this->edit_id);
        $this->academics_form = $this->edit_item->only([
            'first_name',
            'email',
            'title',
            'position',
            'school_id',
            'college_id',
            'department_id',
            'profile_page_web_url',
            'orcid',
            'web_of_science_research_id',
            'scopus_author_id',
            'research_gate_link',
            'google_scholar_link',
            'linkedin_url']);
         $translations = $this->edit_item->getTranslations();
        $this->names = array_values($translations['description']);
        $this->translations = array_keys($translations['description']);
        $this->details_in_langs = count($this->translations);
       // dd(count($this->translations) , $this->descriptions ,$this->translations);
        
        $this->emit('goToTop');
    }

    public function render()
    {
        return view('livewire.university.academics');
    }
} 
