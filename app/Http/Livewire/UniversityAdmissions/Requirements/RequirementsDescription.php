<?php

namespace App\Http\Livewire\UniversityAdmissions\Requirements;

use App\Models\General\Language;
use Livewire\Component;

class RequirementsDescription extends Component
{

    public $translations = [];
    public $details_in_langs = 1;
    public $languages;
    public $admission_requirements = '';

    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
        $this->initForm();
    }

    public function initForm()
    {
        $uni = \Auth::user()->selected_university;
        $translations = $uni->getTranslations();
        $this->admission_requirements = array_values($translations['admission_requirements']);
        $this->translations = array_keys($translations['admission_requirements']);
        $this->details_in_langs = count($this->translations);
        if ($this->details_in_langs < 1) {
            $this->details_in_langs = 1;
            $this->translations[] = 'en';
        }

    }


    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }

    protected function rules()
    {
        $rules = [];
        return array_merge([
            'translations' => ['array', 'required', 'min:1'],
            'admission_requirements' => ['required'],
        ], $rules);
    }

    public function save()
    {
        $this->validate();
        $admission_requirements = [];
        foreach ($this->translations as $key => $lang) {
            $admission_requirements[$lang] = $this->admission_requirements[$key];
        }

        $uni = \Auth::user()->selected_university;
        $uni->update(['admission_requirements' => $admission_requirements]);

        $this->initForm();
        $this->emit('returnResponseModal',[
                'title'=>'Admission Requirements Record Updated',
                'message'=>'Admission requirements record has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        //session()->flash('status', 'Operation Successful!');
    }

    public function render()
    {
        return view('livewire.university-admissions.requirements.requirements-description');
    }
}
