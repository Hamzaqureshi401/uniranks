<?php

namespace App\Http\Livewire\Statistics\Destinations;

use App\Models\User;
use AppConst;
use Livewire\Component;
use Auth;

class StudentsDestinationStatistic extends Component
{

    public $totalStudent_count;
    public $students_selectDestination_count;
    public $students_noDestination_count;
    public $selectDestinations_percent;
    public $noDestinations_percent;

    public function mount(){
        $this->totalStudent_count = $this->getStudentCount();
        $this->students_selectDestination_count = $this->studentsSelectDestinationCount();
        $this->students_noDestination_count = $this->totalStudent_count - $this->students_selectDestination_count;
        $this->selectDestinations_percent = 0;
        $this->noDestinations_percent = 0;
        if($this->totalStudent_count > 0){
            $this->selectDestinations_percent = round($this->students_selectDestination_count / $this->totalStudent_count * 100, 1) ;
        $this->noDestinations_percent = round($this->students_noDestination_count / $this->totalStudent_count * 100, 1) ;
        }
    }

    public function render()
    {
        return view('livewire.statistics.destinations.students-destination-statistic');
    }

    public function studentsSelectDestinationCount(){
        return User::whereSelectedSchoolStudents()->has('studyDestinations')->count();
    }

    public function getStudentCount()
    {
        return Auth::user()->selected_school->total_students;
    }

    public function sendEmail()
    {
        //TODO:Email Functionality
    }
}
