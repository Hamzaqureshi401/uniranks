<?php

namespace App\Http\Livewire\Schools;

use Livewire\Component;

class SchoolPresentation extends Component
{
    public
    $presentations,
    $slots;
    
    public function render()
    {
        return view('livewire.schools.school-presentation');
    }
    public function mount(){
        $this->presentations = \Auth::user()->selected_university->presentationRequests()->get();

    }

     public function getSlots($id)
    {
        $this->selectedPresentation = $this->presentations->where('id', $id)->first();
        $this->slots = $this->selectedPresentation->slots;
        $this->emit('showSlotsModal');
    }

    public function confirmSlot($id){
        //dd($id , $this->slots->where('id' , $id)->first());
        $slot = $this->slots->where('id' , $id)->first();
        $slot->status = 1;
        $slot->reserved_by = \Auth::id();
        $slot->save();
         $this->emit('closeModal');
         $this->emit('showSlotsModal');
         session()->flash('status', $slot->start_datetime. ' Confirmed Successful!');
        // $this->slots = $this->slots;
        
    }
}
