<?php

namespace App\Http\Livewire\Statistics\Universities;

use App\Models\General\Major;
use App\Models\Institutes\University;
use App\Models\User;
use App\Models\User\UserMajor;
use Livewire\Component;

class UniversitySelectionPieChart extends Component
{
    public $chart_labels = [];
    public $chart_dataset = [];
    public $chart_colors = [];
    public $total_count = 0;

    public $total_school_students = 0;

    public function mount(){
        $school_id = \Auth::user()->selected_school->id;
        $universities = University::whereRelation('students', 'campus_id', $school_id)
            ->withCount(['students'=>fn($q)=>$q->where('campus_id', $school_id)])
            ->orderByDesc('students_count')
            ->get();

        $this->total_count = $this->getStudentCountWhoSelected();
        $this->total_school_students = $this->getStudentCount();
        foreach ($universities ?? [] as $university){
//            $percentage =  $this->total_count > 0 ? round($university->students_count / $this->total_count * 100, 1) : 0;
//            $this->chart_labels[] = "$university->students_count ". __('Students which is'). " $percentage%"." ".__('have selected')." $university->university_name";
            $this->chart_labels[] = "$university->students_count ". __('students have selected')." $university->university_name";
            $this->chart_dataset[] = $university->students_count;
            $this->chart_colors[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

    }

    public function getStudentCountWhoSelected(): int
    {
        return  User\UserPossibleUniversity::whereIn('user_id',User::whereSelectedSchoolStudents()->select('id'))->distinct()->count('user_id');

    }

    public function getStudentCount()
    {
        return \Auth::user()->selected_school?->total_students;
    }

    public function sendEmail()
    {
        //TODO:Email Functionality
    }

    public function render()
    {
        return view('livewire.statistics.universities.university-selection-pie-chart');
    }
}
