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
        session()->flash('status', 'Operation Successful!');
    }
    public function render()
    {
        return view('livewire.university.components.university-primary-name');
    }
}
