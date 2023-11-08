<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class LatestEvents extends Component
{
    public $fairs = [];
    public $university_events = [];
    public function mount(){
    }
    public function render()
    {
        return view('livewire.dashboard.latest-events');
    }
}
