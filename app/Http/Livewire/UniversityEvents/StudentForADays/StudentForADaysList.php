<?php

namespace App\Http\Livewire\UniversityEvents\StudentForADays;

use App\Models\University\UniversityEvent;
use Livewire\Component;
use Livewire\WithPagination;

class StudentForADaysList extends Component
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
        $openDays = $this->loadEvents();
        return view('livewire.university-events.student-for-a-days.student-for-a-days-list', compact('openDays'));
    }

    public function loadEvents()
    {
        $rawDate = explode('to', $this->dateRange);
        return UniversityEvent::whereUniversityEventTypeId(\AppConst::UNIVERSITY_EVENT_TYPE_STUDENT_FOR_DAY)
            ->whereUniversityId(\Auth::user()->selected_university?->id)
            ->with(['feeRange', 'type', 'curriculums'])
            ->when(!($this->status == ''), fn($query)=>$query->where('status', '=', $this->status))
            ->when(!empty($this->dateRange), fn($query)=>$query->whereBetween('start_datetime',$rawDate))
            ->paginate(10);
    }

    public function toRestore($id)
    {
        $openDay = UniversityEvent::find($id);
        $openDay->update(['status' => \AppConst::EVENT_REQUSTED_RESTORE]);
        session()->flash('status', 'Event is requested to restore successfully!');
    }
    public function toDelete($id)
    {
        $openDay = UniversityEvent::find($id);
        $openDay->update(['status' => \AppConst::EVENT_DELETED]);
        session()->flash('status', 'Event is requested to delete successfully!');
    }
}
