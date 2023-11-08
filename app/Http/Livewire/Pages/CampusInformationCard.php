<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class CampusInformationCard extends Component
{
    public $campus;

    public $ur_cr;
    public $ad_cr;
    public $ev_cr;

    public $listeners = ['refresh-credits'=>'loadCredits'];
    public function mount(){
        $this->campus = \Auth::user()->selected_university;
        $this->loadCredits();
    }

    public function loadCredits(){
        $campus  = \Auth::user()->selected_university->fresh();
        $this->ur_cr = $campus->ur_credit;
        $this->ad_cr = $campus->admissions_credit;
        $this->ev_cr = $campus->event_credit;
    }
    public function render()
    {
        return view('livewire.pages.campus-information-card');
    }
}
