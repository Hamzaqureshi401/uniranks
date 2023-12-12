<?php

namespace App\Http\Livewire\Statistics\Destinations;

use App\Models\General\Countries;
use App\Models\Institutes\University;
use App\Models\User;
use Livewire\Component;

class DestinationSelectionPieChart extends Component
{
    public $chart_labels = [];
    public $chart_dataset = [];
    public $chart_colors = [];
    public $total_count = 0;

    public $total_school_students = 0;

    public function mount(){
        $school_id = \Auth::user()->selected_school->id;
        $countries = Countries::whereRelation('students', 'campus_id', $school_id)
            ->withCount(['students'=>fn($q)=>$q->where('campus_id', $school_id)])
            ->orderByDesc('students_count')
            ->get();

        $this->total_count = $this->getStudentCountWhoSelected();
        $this->total_school_students = $this->getStudentCount();
        foreach ($countries ?? [] as $country){
//            $percentage =  $this->total_count > 0 ? round($country->students_count / $this->total_count * 100, 1) : 0;
//            $this->chart_labels[] = "$university->students_count ". __('Students which is'). " $percentage%"." ".__('have selected')." $country->country_name";
            $this->chart_labels[] = "$country->students_count ". __('students have selected')." $country->country_name";
            $this->chart_dataset[] = $country->students_count;
            $this->chart_colors[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

    }

    public function getStudentCountWhoSelected(): int
    {
        return  User\UserStudyDestination::whereIn('user_id',User::whereSelectedSchoolStudents()->select('id'))->distinct()->count('user_id');

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
        return view('livewire.statistics.destinations.destination-selection-pie-chart');
    }
}
