<?php

namespace App\Http\Livewire\Schools;

use App\Actions\School\GenerateSlugForUserSchool;
use Livewire\Component;

class SchoolQr extends Component
{
    public $school;
    public $qr_data;
    public function mount(){
        $this->school = \Auth::user()->selected_school;
        $this->qr_data = GenerateSlugForUserSchool::run();
    }

    public function render()
    {
        return view('livewire.schools.school-qr');
    }
}
