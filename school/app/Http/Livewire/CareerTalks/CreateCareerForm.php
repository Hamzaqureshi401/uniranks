<?php

namespace App\Http\Livewire\CareerTalks;

use App\Http\Livewire\HasPoints;
use App\Models\Fairs\Fair;
use App\Models\Fairs\FairEditHistory;
use App\Models\Fairs\FairType;
use App\Models\General\Gender;
use App\Models\General\Major;
use App\Models\Institutes\School;
use Livewire\Component;

class CreateCareerForm extends Component
{
    use HasPoints;
    public $fair_name;
    public $type;
    public $start_date;
    public $end_date;
    public $number_of_halls;
    public $sessions = [];

    public $fair_types;
    public $school;
    public $genders;
    public $majors;
    public ?Fair $fair;
    public $title;
    public $selected_halls = [];

    public function mount()
    {
        $this->fair_types = FairType::all();
        $this->school = \Auth::user()->selected_school;
        $this->school->load(['g_12_fee_range', 'curriculum']);
        $this->genders = Gender::all();
        $this->majors = Major::orderBy('title')->get();
        $this->setData();
        $this->title = (!empty($this->fair) ? 'Edit' : 'Create New') . ' Career Talk';
    }

    public function render()
    {
        return view('livewire.career-talks.create-career-form');
    }

    public function updateSelectedHalls($datetime){
        $this->selected_halls = [];
        foreach ($this->sessions as $session){
            if ($session['start_at'] != $datetime){
                continue;
            }
            $this->selected_halls[] = $session['hall_number'];
        }
    }

    public function addASession()
    {
        $this->selected_halls = [];
        $this->sessions[] = [
            'major_id' => '',
            'user_id' => \Auth::user()->id,
            'start_at' => '',
            'duration' => '',
            'hall_number' => '',
        ];
        $this->dispatchEvents();
    }

    public function removeSession($index)
    {
        array_splice($this->sessions, $index, 1);
       $this->dispatchEvents();
    }

    protected function rules()
    {
        return [
            'fair_name' => [],
            'type' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required', 'after_or_equal:start_date'],
            'number_of_halls' => ['required'],
            'sessions' => ['required', 'array', 'min:1'],
            'sessions.*.major_id' => ['required'],
            'sessions.*.user_id' => '',
            'sessions.*.start_at' => ['required', 'after_or_equal:start_date','before_or_equal:end_date'],
            'sessions.*.duration' => ['required'],
            'sessions.*.hall_number' => ['required'],
        ];
    }

    protected function validationAttributes()
    {
        return [
            'sessions.*.major_id' => "Major",
            'sessions.*.start_at' => "Session Start Date and Time",
            'sessions.*.duration' => "Session Duration",
            'sessions.*.hall_number'=>"Session Hall Number"
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function setData()
    {
        if (empty($this->fair)) {
            $this->fair = null;
        }
        $this->type = $this->fair?->type;
        $this->fair_name = $this->fair?->fair_name;
        $this->start_date = $this->fair?->start_date;
        $this->end_date = $this->fair?->end_date;
        $this->number_of_halls = $this->fair?->number_of_halls;
        $this->sessions = $this->fair?->sessions()->get(['major_id', 'user_id', 'start_at', 'duration', 'hall_number'])?->toArray() ?? [];
        if (empty($this->sessions)) {
            $this->addASession();
        }
    }

    public function resetForm(): void
    {
        $this->redirectAfterSuccess();
    }

    /**
     * @param bool $close
     * @return void
     */
    public function save(bool $close = false): void
    {
        $validatedData = $this->validate();
        if (!empty($this->fair)) {
            $this->update($validatedData, $close);
            $this->dispatchEvents();
            return;
        }
        $this->dispatchEvents();
        $this->createNew($validatedData, $close);
    }

    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function createNew(array $validatedData, bool $close): void
    {
        $validatedData['school_id'] = \Auth::user()->selected_school->id;
        $validatedData['event_type_id'] = \AppConst::CAREER_TALK;
        $this->fair = Fair::create($validatedData);
        $this->fair->history()->create(['details' => $validatedData, 'operation_type' => FairEditHistory::OPERATION_ADD]);
        $this->addPointsInTransactionForSelectedSchool(\AppConst::PT_CREATE_CAREER_TALK,\AppConst::PT_EARNED_FOR_EVENT,$this->fair->id);
        $this->fair->sessions()->createMany($validatedData['sessions']);
        $this->fair->refresh();
        session()->flash('status', 'Fair Created Successfully!');
        $this->setData();
        if (!$close) {
            return;
        }
        $this->redirectAfterSuccess();
    }

    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function update(array $validatedData, bool $close): void
    {
        if ($this->fair->is_approved) {
            $this->createUpdateFairRequest($validatedData, $close);
            return;
        }

        $this->updateFairDetails($validatedData, $close);
    }


    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function updateFairDetails(array $validatedData, bool $close): void
    {
        $this->fair->update($validatedData);
        $this->fair->sessions()->delete();
        $this->fair->sessions()->createMany($validatedData['sessions']);
        $history = $this->fair->history()->first();
        $history->update(['details' => $validatedData]);
        session()->flash('status', 'Fair Details Updated!');
        $this->fair->refresh();
        if (!$close) {
            return;
        }
        $this->redirectAfterSuccess();
    }

    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function createUpdateFairRequest(array $validatedData, bool $close): void
    {
        $validatedData ['requested_by'] = \Auth::id();
        $this->fair->editRequests()->create(['details' => $validatedData]);
        session()->flash('status', 'Fair Update Request Added, Our Team will review it shortly!.');
        if (!$close) return;
        $this->redirectAfterSuccess();
    }

    /**
     * @return void
     */
    private function redirectAfterSuccess(): void
    {
        $this->redirect(route('admin.school.career-talk.list'));
    }

    public function dispatchEvents(){
        $this->dispatchBrowserEvent('add-picker-with-sessions');
    }
}
