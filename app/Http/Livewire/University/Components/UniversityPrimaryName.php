<?php

namespace App\Http\Livewire\University\Components;

use Livewire\Component;

class UniversityPrimaryName extends Component
{
    public $university_name;

    public function initForm(){
        $this->university_name = \Auth::user()->selected_university->university_name;
    }

    public function mount(){
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
        'title'=>'University Name Update',
            'message'=>'Your University name has been updated.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
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
    public function render()
    {
        return view('livewire.university.components.university-primary-name');
    }
}
