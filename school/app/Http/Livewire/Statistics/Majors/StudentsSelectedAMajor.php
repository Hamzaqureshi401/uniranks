<?php

namespace App\Http\Livewire\Statistics\Majors;

use App\Models\User;
use App\Models\General\Major;
use AppConst;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsSelectedAMajor extends Component
{
    use WithPagination;

    /** @var integer $major_id */
    public $major_id =  '';
    public $selectMajors;

    protected $queryString = ['major_id' => ['except' => '']];

    protected string $paginationTheme = 'bootstrap';

    public function mount()
    {
        /** @var Major $selectMajors */
        $this->selectMajors = Major::whereRelation('students', 'campus_id', Auth::user()->selected_school->id)->get();
    }

    public function render()
    {
        $major = Major::find($this->major_id);
        $students = $this->loadStudents(false);
        return view('livewire.statistics.majors.students-selected-a-major', compact('students', 'major'));
    }

    public function loadStudents($reset_pagination=true) : LengthAwarePaginator
    {
        if ($reset_pagination){
            $this->resetPage();
        }

        return User::with(['preferredUniversities', 'majors'])
            ->whereRoleId(\AppConst::STUDENT)
            ->whereCampusId(\Auth::user()->selected_school->id)
            ->when(!empty($this->major_id),fn($query)=>$query->whereRelation('majors','major_id',$this->major_id), fn($query)=>$query->whereHas('majors'))
            ->paginate(10);
    }
}
