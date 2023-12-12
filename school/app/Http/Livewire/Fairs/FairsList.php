<?php

namespace App\Http\Livewire\Fairs;

use App\Models\Fairs\Fair;
use App\Models\General\EventPackage;
use App\Models\Institutes\School;
use App\Models\PointingSystem\PointType;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class FairsList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public $isModalOpen = false;
    /**@var Fair | null $selected_fair*/
    public $selected_fair = null;

    protected $listeners = ['openModal', 'onModelClose'];

    public function render()
    {
        $fairs = $this->loadFairs();
        return view('livewire.fairs.fairs-list', compact('fairs'));
    }

    public function loadFairs(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Fair::simpleFair()
            ->whereSchoolId(\Auth::user()->selected_school->id)
            ->with(['school.city','fairType'])
            ->withCount(['attendance','invitation'=>fn($q)=>$q->where(['status' => \AppConst::INVITATION_ACCEPTED])])
            ->orderByDesc('start_date')->paginate(10);
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
        $this->selected_fair->delete();
        session()->flash('status', 'Fair deleted Successfully!');
        $this->closeModal();
    }
}
