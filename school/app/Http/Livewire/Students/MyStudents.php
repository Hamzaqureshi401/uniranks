<?php

namespace App\Http\Livewire\Students;

use App\Models\General\Countries;
use App\Models\General\FeeRange;
use App\Models\General\Major;
use App\Models\Institutes\University;
use App\Models\User;
use App\Notifications\Student\SendRegistrationLink;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class MyStudents extends Component
{
    /**
     * @var \App\Models\School\SchoolPointHistory $histories ;
     * @var \App\Models\General\Countries
     * @var float $cash_out;
     * @var float $points_out_total;
     * @var float $points_in_total;
     * @var array $selectedStudents;
     * @var int $school_id;
     **/

    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public $select_destination;
    public $select_major;
    public $select_university;
    public $fee_ranges;

    public $search_destination = '';
    public $search_major = '';
    public $search_university = '';
    public $search_budget = '';
    public $school_id;

    public $selectedStudents = [];

    protected $queryString = ['search_destination' => ['except' => ''], 'search_major' => ['except' => ''], 'search_university' => ['except' => ''],'search_budget'=>['except' => '']];

    public function mount()
    {
        $this->school_id = \Auth::user()->selected_school->id;
        $this->select_destination = Countries::whereRelation('students', 'campus_id', $this->school_id)->get();
        $this->select_major = Major::whereRelation('students', 'campus_id', $this->school_id)->get();
        $this->select_university = University::whereRelation('students', 'campus_id', $this->school_id)->get();
        $this->fee_ranges = FeeRange::whereRelation('students', 'campus_id', $this->school_id)->get();

    }

    public function render()
    {
        $students = $this->loadStudents(false);
        $selectedStudent_count = $this->updatedSelectedStudents();
        return view('livewire.students.my-students', compact('students', 'selectedStudent_count'));
    }

    public function loadStudents($reset_pagination=true) : LengthAwarePaginator
    {
        if ($reset_pagination){
            $this->resetPage();
        }

        return User::whereSelectedSchoolStudents()
            ->withCount(['studyDestinations', 'majors', 'preferredUniversities','hobbies'])
            ->with(['userBio.country','userBio.city','userBio.feeRange','userBio.curriculum','userBio.nationality','userBio.studyLevel'])
            ->when(!empty($this->search_destination), fn($query) => $query->whereRelation('studyDestinations', 'country_id', $this->search_destination))
            ->when(!empty($this->search_major), fn($query) => $query->whereRelation('majors', 'major_id', $this->search_major))
            ->when(!empty($this->search_university), fn($query) => $query->whereRelation('preferredUniversities', 'university_id', $this->search_university))
            ->when(!empty($this->search_budget), fn($query) => $query->whereRelation('userBio', 'fee_range_id', $this->search_budget))
            ->orderBy('id')
            ->paginate(10);
    }

    public function updatedSelectedStudents()
    {
        return count($this->selectedStudents);
    }

    public function sendRegistrationLink(){
        //TODO REMOVE AFTER SENDGRID ISSUE RESLOVED
        return;
        if(empty($this->selectedStudents)) return;
        /**@var User [] $students */
        $students = User::whereIn('id',$this->selectedStudents)->get();
        foreach ($students as $student){
            $student->notify(new SendRegistrationLink());
        }

        $this->dispatchBrowserEvent('notify',['type' => 'success', 'message' => 'Email Sent.']);

    }

}
