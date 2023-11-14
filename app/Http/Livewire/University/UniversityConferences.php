<?php

namespace App\Http\Livewire\University;

use Livewire\Component;

class UniversityConferences extends Component
{
     public $languages , 
    $details_in_langs       = 1,
    $addCenferenceDetailsInOtherLanguage = 1;
    
    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }
    public function addCenferenceDetailsInOtherLanguage()
    {
        ++$this->addCenferenceDetailsInOtherLanguage;
    }

    public function render()
    {
        return view('livewire.university.university-conferences');
    }
}
