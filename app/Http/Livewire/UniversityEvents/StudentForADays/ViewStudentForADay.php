<?php

namespace App\Http\Livewire\UniversityEvents\StudentForADays;

use App\Models\General\Countries;
use App\Models\General\FeeRange;
use App\Models\General\Major;
use App\Models\Institutes\School;
use App\Models\University\UniversityEvent;
use App\Models\User\UserBio;
use App\Models\User\UserMajor;
use App\Models\User\UserStudyDestination;
use Livewire\Component;
use Livewire\WithPagination;

class ViewStudentForADay extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public UniversityEvent $event;

    public $all_schools;
    public $all_majors;
    public $all_countries;
    public $all_feeRanges;

    public $selected_school;
    public $selected_major;
    public $selected_country;
    public $selected_feeRange;
    public $all_students;

    protected $queryString = [
        'selected_school' => ['except' => ''],
        'selected_major' => ['except' => ''],
        'selected_country' => ['except' => ''],
        'selected_feeRange' => ['except' => ''],
    ];

    public function mount()
    {

        $this->all_schools = School::whereIn('id', $this->event->attendance()->select('campus_id'))->distinct('id')->get();
        $user_sq = $this->event->attendance()->select('users.id');

        $user_majors = UserMajor::select('major_id')->whereIn('user_id', $user_sq);
        $this->all_majors = Major::whereIn('majors.id', $user_majors)->distinct('title')->get();

        $user_destinations = UserStudyDestination::select('country_id')->whereIn('user_id', $user_sq);
        $this->all_countries = Countries::whereIn('id', $user_destinations)->distinct('country_name')->get();

        $user_feeRanges = UserBio::select('fee_range_id')->whereIn('user_id', $user_sq);
        $this->all_feeRanges = FeeRange::whereIn('id', $user_feeRanges)->distinct('range')->get();
    }

    public function render()
    {
        $students = $this->loadStudents();
        return view('livewire.university-events.student-for-a-days.view-student-for-a-day',compact('students'));
    }

    public function loadStudents()
    {
        return $this->event->attendance()
            ->with(['studyDestinations', 'majors', 'userBio', 'school'])
            ->when(!empty($this->selected_school), fn($query) => $query->where('campus_id', $this->selected_school))
            ->when(!empty($this->selected_major), fn($query) => $query->whereRelation('majors', 'major_id', $this->selected_major))
            ->when(!empty($this->selected_country), fn($query) => $query->whereRelation('studyDestinations', 'country_id', $this->selected_country))
            ->when(!empty($this->selected_feeRange), fn($query) => $query->whereRelation('userBio', 'fee_range_id', $this->selected_feeRange))
            ->paginate(10);
    }

    public function toRestore(UniversityEvent $id)
    {
        $id->update(['status' => \AppConst::EVENT_REQUSTED_RESTORE]);
        $this->emit('returnResponseModal',[
                'title'=>'Event Restore Request',
                'message'=>'Event is requested to restore successfully!',
                'btn'=>'Oky',
                'link'=>null,
        ]);
        //session()->flash('status', 'Event is requested to restore successfully!');
    }

    public function toDelete(UniversityEvent $id)
    {
        $id->update(['status' => \AppConst::EVENT_DELETED]);
        $this->emit('returnResponseModal',[
                'title'=>'Event Delete Request',
                'message'=>'Event is requested to delete successfully!',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
        ]);
        //session()->flash('status', 'Event is requested to delete successfully!');
    }

}
