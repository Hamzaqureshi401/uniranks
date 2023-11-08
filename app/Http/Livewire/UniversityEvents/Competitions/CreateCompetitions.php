<?php

namespace App\Http\Livewire\UniversityEvents\Competitions;

use App\Http\Livewire\UniversityEvents\CanInviteSchools;
use App\Http\Livewire\UniversityEvents\HasHistory;
use App\Models\Fairs\FairType;
use App\Models\General\Cities;
use App\Models\General\Curriculum;
use App\Models\General\FeeRange;
use App\Models\University\UniversityEvent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateCompetitions extends Component
{

    use HasHistory, CanInviteSchools;


    public ?UniversityEvent $event;

    public $all_fair_types;
    public $all_curriculums;
    public $all_fee_ranges;
    public $all_cities;

    public $title;
    public $fair_type;
    public $start_date;
    public $end_date;
    public $max_students;
    public $fee_range;
    public $description;
    public $curriculums = '';
    public $cities = '';

    public $country_id;


    public function mount()
    {
        $this->all_fair_types = FairType::all();
        $this->all_curriculums = Curriculum::all();
        $this->all_fee_ranges = FeeRange::all();
        $this->country_id = Auth::user()->selected_university->country_id;
        $this->all_cities = Cities::whereCountryId($this->country_id)->get();
        $this->setData();
        $this->title = (!empty($this->fair) ? 'Edit' : 'Create New') . ' Competition';
    }

    public function render()
    {
        $no_schools = $this->getSchoolsCount();
        return view('livewire.university-events.competitions.create-competitions',compact('no_schools'));
    }

    public function setData()
    {
        if (empty($this->event)) {
            $this->event = null;
        }
        $this->title = $this->event?->title ?? "";
        $this->fair_type = $this->event?->fair_type_id ?? "";
        $this->start_date = $this->event?->start_datetime ?? "";
        $this->end_date = $this->event?->end_datetime ?? "";
        $this->curriculums = $this->event?->curriculums->pluck('id') ?? [];
        $this->max_students = $this->event?->max_students ?? "";
        $this->fee_range = $this->event?->fee_range_id ?? "";
        $this->description = $this->event?->description ?? "";
    }

    protected function rules()
    {
        return [
            'title' => [''],
            'start_date' => ['required'],
            'end_date' => ['required', 'after_or_equal:start_date'],
            'max_students' => ['required'],
            'fee_range' => ['required'],
            'description' => ['required']
        ];
    }

    public function save()
    {
        $validatedData = $this->validate();
        $uni = Auth::user()->selected_university;
        $create_university_events = [
            'university_event_type_id' => \AppConst::UNIVERSITY_EVENT_TYPE_COMPITITION,
            'title' => empty($this->title) ? $uni->university_name .' Competition' : $this->title,
            'description' => $this->description,
            'start_datetime' => $this->start_date,
            'end_datetime' => $this->end_date,
            'max_students' => $this->max_students,
            'university_id' => Auth::user()->selected_university->id,
            'fee_range_id' => $this->fee_range,
            'country_id' => $this->country_id,
        ];
        if (!empty($this->event)) {
            $this->update($create_university_events);
            return;
        }
        $this->createNew($create_university_events);
    }

    public function createNew($create_university_events)
    {
        $university_events = UniversityEvent::create($create_university_events);
        $university_events->curriculums()->sync($this->curriculums);
        $this->inviteSchools($university_events);
        $this->addHistory($university_events, $create_university_events);
        $this->setData();
        session()->flash('status', 'Created Successfully!');
        $this->redirectAfterSuccess();
    }

    public function update($create_university_events)
    {
        if ($this->event->approval_status) {
            $this->createUpdateFairRequest($create_university_events);
            return;
        }
        $this->updateUniversityEvents($create_university_events);
    }

    public function createUpdateFairRequest($create_university_events)
    {
        $this->event->editRequests()->create(['details' => $create_university_events]);
        session()->flash('status', 'Update Request Added, Our Team will review it shortly!.');
        $this->redirectAfterSuccess();
    }

    public function updateUniversityEvents($create_university_events)
    {
        $this->event->update($create_university_events);
        $this->event->curriculums()->sync($this->curriculums);
        $this->addHistory($this->event, $create_university_events);
        $this->inviteSchools($this->event);
        session()->flash('status', 'Updated Successfully!');
        $this->redirectAfterSuccess();
    }

    public function cancel()
    {
        $this->setData();
        $this->redirectAfterSuccess();
    }

    private function redirectAfterSuccess(): void
    {
        $this->redirect(route('admin.events.competitions.list'));
    }
}
