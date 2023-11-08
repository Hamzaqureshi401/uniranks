<?php

namespace App\Http\Livewire\UniversityEvents\Workshops;

use App\Models\University\UniversityEvent;
use Livewire\Component;
use Livewire\WithPagination;

class WorkshopsList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public $dateRange = '';
    public $status = '';

    protected $queryString = [
        'dateRange' => ['except' => ''],
        'status' => ['except' => ''],
    ];

    public function mount()
    {
        $this->dateRange = '';
        $this->status = '';
    }

    public function render()
    {
        $workshops = $this->loadWorkshops();
        return view('livewire.university-events.workshops.workshops-list', compact('workshops'));
    }

    public function loadWorkshops()
    {
        $rawDate = explode('to', $this->dateRange);
        return UniversityEvent::whereUniversityEventTypeId(\AppConst::UNIVERSITY_EVENT_TYPE_WORKSHOP)
            ->whereUniversityId(\Auth::user()->selected_university?->id)
            ->with(['feeRange', 'type', 'curriculums', 'majors'])
            ->when(!($this->status == ''), fn($query)=>$query->where('status', '=', $this->status))
            ->when(!empty($this->dateRange), fn($query)=>$query->whereBetween('start_datetime',$rawDate))
            ->paginate(10);
    }

    public function toRestore($id)
    {
        $workshop = UniversityEvent::find($id);
        $workshop->update(['status' => \AppConst::EVENT_REQUSTED_RESTORE]);
        session()->flash('status', 'Event is requested to restore successfully!');
    }
    public function toDelete($id)
    {
        $workshop = UniversityEvent::find($id);
        $workshop->update(['status' => \AppConst::EVENT_DELETED]);
        session()->flash('status', 'Event is requested to delete successfully!');
    }
}
