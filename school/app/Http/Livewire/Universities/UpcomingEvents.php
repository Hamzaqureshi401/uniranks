<?php

namespace App\Http\Livewire\Universities;

use App\Models\General\Countries;
use App\Models\Institutes\University;
use App\Models\University\UniversityEvent;
use App\Models\University\UniversityEventInvitation;
use App\Models\University\UniversityEventType;
use Livewire\Component;
use Livewire\WithPagination;

class UpcomingEvents extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';
    public $countries = [];
    public $country = '';
    public $type;
    public $type_title;
    public $period = '';
    protected $queryString = ['country' => ['except' => ''], 'period' => ['except' => '']];

    public function mount()
    {
        $this->loadCountries();
        $this->type_title = UniversityEventType::find($this->type)?->title;
    }

    public function render()
    {
        $events = $this->loadEvents(false);
        return view('livewire.universities.upcoming-events', compact('events'));
    }

    public function loadEvents($reset_pagination = true): \Illuminate\Pagination\LengthAwarePaginator
    {
        if ($reset_pagination) {
            $this->resetPage();
        }

        $school = \Auth::user()->selected_school;
        $period = explode(' to ', $this->period);
        return $school->universityEvents()->where('university_event_type_id', $this->type)
            ->with('eventInvitations', fn($q) => $q->where('school_id', $school->id))
            ->when(!empty($this->country), fn($q) => $q->where('country_id', $this->country))
            ->when(count($period) > 1, fn($q) => $q->whereBetween('start_datetime', $period))
            ->orderByDesc('start_datetime')
            ->paginate(50);
    }

    public function register(?UniversityEventInvitation $inv,$event_id)
    {
        if(empty($inv)) {
            $inv = UniversityEventInvitation::create([
                'school_id' => \Auth::user()->selected_school?->id,
                'university_event_id' => $event_id,
                'accepted_by_school' => \AppConst::INVITATION_ACCEPTED,
            ]);
        }else{
            $inv->update(['accepted_by_school' => \AppConst::INVITATION_ACCEPTED]);
        }
    }

    public function revoke(UniversityEventInvitation $invitation)
    {
        $invitation->update(['accepted_by_school' => \AppConst::INVITATION_ACCEPTED]);
//        $invitation->delete();
    }

    private function loadCountries()
    {
        $school = \Auth::user()->selected_school;
        $subQ = $school->universityEvents()->select('country_id')->where('university_event_type_id',$this->type);
        $this->countries = Countries::orderBy('country_name')->whereIn('id', $subQ)->get();
    }
}
