<?php

namespace App\Http\Livewire\University\Components;
use App\Models\General\Language;

use Livewire\Component;

class UniversityPrimaryName extends Component
{
    public $university_name,
    $translations = [],
    $descriptions = [],
    $about_translations = [],
    $details_in_langs = 1,
    $languages,
    $translated_name = [];
    


    public function initForm(){
        $this->university_name = \Auth::user()->selected_university->university_name;
        $uni = \Auth::user()->selected_university;
        $uni->refresh();
        $this->about_translations = $uni->getTranslations('translated_name') ?? [];
        $this->translations = [];
        $this->details_in_langs = 1;
        // $this->translations = empty($this->about_translations) ? ['en'] : array_keys($this->about_translations);
        // $this->translated_name = array_values($this->about_translations);
        // $this->details_in_langs = count($this->translations) ?: 1;
        
    }

    public function mount(){
        $this->languages = Language::orderBy('name')->get();
        $this->initForm();
    }

    public function rules(){
        return [
          'university_name'=>['required','string'],
        ];
    }
    public function addDetailsInOtherLanguage()
    { 
        ++$this->details_in_langs;
    }

    public function save(){

        $inputs = $this->validate();
        \Auth::user()->selected_university->update($inputs);
        $this->emit('returnResponseModal',[
        'title'=>'University Primary Name Update',
            'message'=>'Your University name has been updated.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->initForm();
        //session()->flash('status', 'Operation Successful!');
    }
    public function saveSecondryName(){
        //$inputs = $this->validate();
        $data = ['translated_name' => []];
        foreach ($this->translations as $key => $lang) {
            $data['translated_name'][$lang] = $this->translated_name[$key];
        }
        \Auth::user()->selected_university->update($data);
        $this->emit('returnResponseModal',[
        'title'=>'University Secondry Name Added',
            'message'=>'University secondry name has been added.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->initForm();
        //session()->flash('status', 'Operation Successful!');
    }
     public function delete(){
        \Auth::user()->selected_university->update(['university_name' => null]);
         $this->initForm();
         $this->emit('returnResponseModal',[
        'title'=>'Record Deleted',
            'message'=>'Your University name has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        // session()->flash('status', 'Operation Successful!');
    }
     public function deleteTranslation($key)
    {
        $uni = \Auth::user()->selected_university;

        if ($uni->hasTranslation('translated_name', $key)) {
            $uni->forgetTranslation('translated_name', $key);
            $uni->save();
            $this->initForm();
            $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
                'message'=>'University name in different languages has been deleted.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
            //session()->flash('status', 'Operation Successful!');
        }
    }

    public function render()
    {
        return view('livewire.university.components.university-primary-name');
    }
}
