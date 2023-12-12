<?php

namespace App\Http\Livewire\Schools;

use Livewire\Component;

class SchoolPresentation extends Component
{
    public
    $presentations;
    
    public function render()
    {
        return view('livewire.schools.school-presentation');
    }
    public function mount(){
        $this->presentations = \Auth::user()->selected_university->presentationRequests()->get();

    }
}
