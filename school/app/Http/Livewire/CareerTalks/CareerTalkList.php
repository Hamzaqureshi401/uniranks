<?php

namespace App\Http\Livewire\CareerTalks;

use App\Models\Fairs\Fair;
use Livewire\Component;
use Livewire\WithPagination;

class CareerTalkList extends Component
{

    use WithPagination;

    protected string $paginationTheme = 'bootstrap' ;
    public $isModalOpen = false;
    /**@var Fair | null $selected_fair*/
    public $selected_fair = null;

    protected $listeners = ['openModal', 'onModelClose'];

    public function loadFairs(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {

        return  Fair::careerTalk()
            ->whereSchoolId(\Auth::user()->selected_school->id)
            ->with(['school.city','fairType'])
            ->withCount(['reservationRequests','sessions','attendance'])
            ->orderByDesc('start_date')
            ->paginate(10);
    }

    public function render()
    {
        $fairs = $this->loadFairs();

        return view('livewire.career-talks.career-talk-list',compact('fairs'));
    }

    public function openModalConfirmModal(Fair $fair)
    {
        $this->selected_fair = $fair;
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function onModelClose()
    {
        $this->selected_fair = null;
        $this->closeModal();
    }
    public function deleteFair(){
        $this->selected_fair->sessions()->delete();
        $this->selected_fair->reservationRequests()->delete();
        $this->selected_fair->delete();
        session()->flash('status', 'Fair deleted Successfully!');
        $this->closeModal();
    }
}
