<?php

namespace App\Http\Livewire\Sponsored;

use App\Models\School\SchoolSponsoredEvent;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class SponsoredEventsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $events = $this->loadEvents();
        return view('livewire.sponsored.sponsored-events-list',compact('events'));
    }

    public function loadEvents(): LengthAwarePaginator
    {
        $uni_id = \Auth::user()->selected_university;
        return SchoolSponsoredEvent::whereTargetCountryId($uni_id->country_id)->with(['school.g_12_fee_range','createdByUser'])
            ->with('offers',fn($q)=>$q->where('university_id',$uni_id->id))
            ->orderByDesc('event_datetime')
            ->paginate(50);
    }
}
