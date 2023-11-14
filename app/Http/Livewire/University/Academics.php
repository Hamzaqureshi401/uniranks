<?php

namespace App\Http\Livewire\University;

use App\Models\General\Language;


use Livewire\Component;

class Academics extends Component
{
     public $languages , 
    $details_in_langs       = 1;
    
    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }

    public function render()
    {
        return view('livewire.university.academics');
    }
} 
