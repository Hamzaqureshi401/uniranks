<?php

namespace App\Http\Livewire\Statistics\Registrations;

use App\Models\User;
use App\Models\General\Major;
use Livewire\Component;
use Auth;
use AppConst;

class CoveragePercentage extends Component
{
    public $total_students_count;
    public $registered_students_count;
    public $unregistered_students_count;
    public $registered_students_percentage;
    public $unregistered_students_percentage;
    public $message = '';

    public function mount()
    {
        $school = Auth::user()->selected_school;
        $this->total_students_count = $school->total_students;
        $this->registered_students_count = User::whereSelectedSchoolStudents()->count();

        $this->unregistered_students_count = $this->total_students_count - $this->registered_students_count;
        $this->registered_students_percentage  = 0;
        $this->unregistered_students_percentage = 0;
        if ($this->total_students_count > 0) {
            $this->registered_students_percentage = round(($this->registered_students_count / $this->total_students_count) * 100,1) ;
            $this->unregistered_students_percentage = round(($this->unregistered_students_count / $this->total_students_count) * 100,1);
        }
    }

    public function render()
    {
        return view('livewire.statistics.registrations.coverage-percentage');
    }

    public function sendReminder()
    {
        //TODO:REMINDER EMAIL;
    }


}


