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
    $type,
    $flag = 0,
    $other_val,
    $setVal = [],
    $name = [],
    $name_language = [],
    $name_type = [],
    $translated_name = []; 
    


    public function initForm(){
        $this->university_name = \Auth::user()->selected_university->university_name;
        $uni = \Auth::user()->selected_university;
        $uni->refresh();
        $this->about_translations = $uni->getTranslations('translated_name') ?? [];
        $this->translations[] = 'en';
        $this->details_in_langs = 1;
        $this->type = [];
        $this->setPrimaryAndSecondry(null);
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

    public function setPrimaryAndSecondry($i = null){  

    //dd($this->setVal , $i);  

        if (!empty($i) && $this->name_type[$i] == 1) {
        
        foreach ($this->setVal as $key => $value) {
            if ($value != $i) {
                $this->other_val = $value;
                    $this->type[$this->other_val] = ['2' => 'Secondary'];
                }
        }
        $this->flag = 0;
        $this->type[$this->setVal[$i]] = ['1' => 'Primary', '2' => 'Secondary'];

        //dd($this->setVal , $this->type , $i);
               
        }else{
            $this->type = ['1' => 'Primary' ,'2' => 'Secondary'];
        }
    }
    public function addDetailsInOtherLanguage()
    { 
        ++$this->details_in_langs;
        $this->setVal[] = $this->details_in_langs;
        //dd($this->setVal);
        $this->addPrimaryAndSecondry(end($this->setVal));
        
    }
    public function addPrimaryAndSecondry($i = null){

        $this->flag = 1;
        $this->type[$i] = ['1' => 'Primary' ,'2' => 'Secondary'];
    }
    public function saveSecondryName(){
        //$inputs = $this->validate();
        $uni = \Auth::user()->selected_university->first();

        $otherData = [
            'website' => $uni->website,
            'country' => $uni->country->country_name,
            'status'  => $uni->status 
        ];
        
        $data = ['name_language' => []];
        foreach ($this->names as $key => $lang) {
            $data['name_language'][$lang] = $this->translated_name[$key];
        }
        \Auth::user()->selected_university->OriginalUniversity($data);
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
