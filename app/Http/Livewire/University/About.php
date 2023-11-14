<?php

namespace App\Http\Livewire\University;

use App\Models\General\Language;
use Livewire\Component;

class About extends Component
{
    public $descriptions = [];
    public $translations = [];
    public $languages;
    public $about_translations = [];
    public $details_in_langs = 1;

    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
        $this->initForm();
    }

    public function initForm()
    {
        //dd(1);
        $uni = \Auth::user()->selected_university;
        $uni->refresh();
//        dd($uni->getTranslations('description'));
        $this->about_translations = $uni->getTranslations('description') ?? [];
        $this->translations = empty($this->about_translations) ? ['en'] : array_keys($this->about_translations);
        $this->descriptions = array_values($this->about_translations);
        $this->details_in_langs = count($this->translations) ?: 1;
    }

    public function addDetailsInOtherLanguage()
    { 
        ++$this->details_in_langs;
    }

    public function deleteTranslation($key)
    {
        $this->about_translations[$key] = null;
        unset($this->about_translations[$key]);
        \Auth::user()->selected_university->update(['description'=>$this->about_translations]);
        $this->initForm();
        session()->flash('status', 'Operation Successful!');
    }

    protected function rules()
    {
        return [
            'descriptions' => ['array', 'required', 'min:1'],
            'translations' => ['array', 'required', 'min:1'],
        ];
    }

    public function save()
    {
        $this->validate();
        $data = ['description' => []];
        foreach ($this->translations as $key => $lang) {
            $data['description'][$lang] = $this->descriptions[$key];
        }
        \Auth::user()->selected_university->update($data);
        $this->initForm();
        session()->flash('status', 'Operation Successful!');
    }


    public function render()
    {
        return view('livewire.university.about');
    }
}
