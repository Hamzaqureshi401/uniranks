<?php

namespace App\Http\Livewire\University\Components;

use Livewire\Component;

class SecondryName extends Component
{
     public $university_name,
    $translations = [],
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

    public function render()
    {
        return view('livewire.university.components.secondry-name');
    }

    public function mount(){
        $this->initForm();
    }

    public function saveSecondryName(){
        $uni = \Auth::user()->selected_university->first();
        $otherData = [
            'website' => $uni->website,
            'country' => $uni->country->country_name,
            'status'  => $uni->status 
        ];
        dd($this->translations , $this->name_type , $this->name , \Auth::user()->selected_university->first() , $otherData);
        $data = ['translated_name' => []];
        foreach ($this->translations as $key => $lang) {
            $data['translated_name'][$lang] = $this->translated_name[$key];
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
    public function addPrimaryAndSecondry($i = null){

        $this->flag = 1;
        $this->type[$i] = ['1' => 'Primary' ,'2' => 'Secondary'];
    }
    public function addDetailsInOtherLanguage()
    { 
        ++$this->details_in_langs;
        $this->setVal[] = $this->details_in_langs;
        //dd($this->setVal);
        $this->addPrimaryAndSecondry(end($this->setVal));
        
    }
    public function setPrimaryAndSecondry($i = null){  

    //dd($this->setVal , $i);  

        if (!empty($i) && $this->name_type[$i] == 1) {
        $this->flag = 0;
        foreach ($this->setVal as $key => $value) {
            if ($value != $i) {
                $this->other_val = $value;
                    $this->type[$this->other_val] = ['2' => 'Secondary'];
                }
        }
        $this->type[$this->setVal[$i]] = ['1' => 'Primary', '2' => 'Secondary'];
               
        }else{
            $this->type = ['1' => 'Primary' ,'2' => 'Secondary'];
        }
    }

    public function initForm(){
        $this->university_name = \Auth::user()->selected_university->university_name;
        $uni = \Auth::user()->selected_university;
        $uni->refresh();
        $this->about_translations = $uni->getTranslations('translated_name') ?? [];
        $this->translations[] = 'en';
        $this->details_in_langs = 1;
        $this->type = [];
        $this->setPrimaryAndSecondry(null);
       
    }
}
