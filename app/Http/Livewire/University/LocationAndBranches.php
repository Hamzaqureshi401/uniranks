<?php

namespace App\Http\Livewire\University;
use App\Models\General\Language;

use Livewire\Component;

class LocationAndBranches extends Component
{
    public $languages , 
    $details_in_langs = 1,
    $add_new_location = 1,

    $translations = [];
    

    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
    }
    public function addDetailsInOtherLanguage()
    {
        //dd(1);
        ++$this->details_in_langs;
    }
    public function addNewLocation()
    {
        //dd(1);
        ++$this->add_new_location;
    }
    public function render()
    {
        return view('livewire.university.location-and-branches');
    }
}
