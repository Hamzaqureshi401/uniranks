<?php

namespace App\Http\Livewire\UniversityEvents\Workshops;

use App\Http\Livewire\UniversityEvents\CanInviteSchools;
use App\Models\Fairs\FairType;
use App\Models\General\Curriculum;
use App\Models\General\FeeRange;
use App\Models\General\Major;
use App\Models\University\UniversityEvent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateWorkshops extends Component
{
    use CanInviteSchools;

    public ?UniversityEvent $event;

    public $all_fair_types;
    public $all_curriculums;
    public $all_fee_ranges;
    public $all_majors;

    public $title;
    public $fair_type;
    public $start_date;
    public $end_date;
    public $curriculums;
    public $max_students;
    public $fee_range;
    public $majors;
    public $description;
    public $edit_history = [];

    public function mount()
    {
        $this->all_fair_types = FairType::all();
        $this->all_curriculums = Curriculum::all();
        $this->all_fee_ranges = FeeRange::all();
        $this->all_majors = Major::all();

        $this->setData();

        $this->title = (!empty($this->fair) ? 'Edit' : 'Create New') . ' Workshop';
    }

    public function render()
    {
        $no_schools = $this->getSchoolsCount();
        return view('livewire.university-events.workshops.create-workshops',compact('no_schools'));
    }

    public function setData()
    {
        if (empty($this->event)) {
            $this->event = null;
        }
        //        Initialize variables in Edit Workshops page
        $this->title = $this->event?->title ?? "";
        $this->fair_type = $this->event?->fair_type_id ?? "";
        $this->start_date = $this->event?->start_datetime ?? "";
        $this->end_date = $this->event?->end_datetime ?? "";
        $this->curriculums = $this->event?->curriculums->pluck('id')->toArray() ?? [];
        $this->majors = $this->event?->majors->pluck('id')->toArray() ?? [];
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
            'curriculums' => ['required'],
            'max_students' => ['required'],
            'fee_range' => ['required'],
            'majors' => ['required'],
            'description' => ['required']
        ];
    }

    public function save()
    {
        $validatedData = $this->validate();
        $uni = Auth::user()->selected_university;

        /**
         * @var App\Models\University\UniversityEvent $create_university_events ;
         */
        $create_university_events = [
            'university_event_type_id' => \AppConst::UNIVERSITY_EVENT_TYPE_WORKSHOP,
            'title' => empty($this->title) ? $uni->university_name.' Workshop' : $this->title,
            'description' => $this->description,
            'start_datetime' => $this->start_date,
            'end_datetime' => $this->end_date,
            'max_students' => $this->max_students,
            'university_id' => Auth::user()->selected_university->id,
            'fee_range_id' => $this->fee_range,
        ];
        $validatedData = $this->validate();
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
        $university_events->majors()->sync($this->majors);
        $this->inviteSchools($university_events);
        $this->addHistory($university_events, $create_university_events);
        $this->setData();
        //session()->flash('status', 'New Workshop Created Successfully!');
        $this->emit('returnResponseModal',[
                'title'=>'Workshop Added',
                'message'=>'1 new workshop has been added.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        $this->redirect(route('admin.events.workshops.create'));
    }

    public function addHistory(UniversityEvent $event, $create_university_events)
    {
        $create_university_events = array_merge($create_university_events, [
            'fair_type' => $event->fairType?->fair_type_name,
            'fee_range' => $event->feeRange?->currency_range,
            'curriculums' => $event->curriculums()->pluck('title')->implode(', '),
            'majors' => $event->majors()->pluck('title')->implode(', ')
        ]);
        $event->history()->create(['details' => $create_university_events]);
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
        //session()->flash('status', 'Workshop Update Request Added, Our Team will review it shortly!.');
        $this->emit('returnResponseModal',[
                'title'=>'Workshop Updated Request Added',
                'message'=>'Workshop Update Request Added, Our Team will review it shortly!.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        $this->redirectAfterSuccess();
    }

    public function updateUniversityEvents($create_university_events)
    {
        $this->event->update($create_university_events);
        $this->event->curriculums()->sync($this->curriculums);
        $this->event->majors()->sync($this->majors);
        $this->inviteSchools($this->event);
        $this->addHistory($this->event, $create_university_events);
        $this->emit('returnResponseModal',[
                'title'=>'Workshop Updated',
                'message'=>'Workshop has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        //session()->flash('status', 'Workshop Updated Successfully!');
        $this->redirectAfterSuccess();
    }

    public function cancel()
    {
        $this->setData();
        $this->redirectAfterSuccess();
    }

    private function redirectAfterSuccess(): void
    {
        $this->redirect(route('admin.events.workshops.list'));
    }
}
