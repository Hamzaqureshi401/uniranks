<?php

namespace App\Http\Livewire\Leads;

use App\Models\User;
use Livewire\Component;

class StudentDetailsModal extends Component
{

    public ?User $student;
    public $isStudentDetailsModelOpen = false;

    protected $listeners = ['showStudentDetails','onModelClose'=>'closeStudentDetails'];

    public function showStudentDetails(User $user){
        $this->student = $user;
        $this->student->load([
            'school',
            'studyDestinations',
            'majors',
            'preferredUniversities.rankingPositions',
            'hobbies',
            'userBio.country',
            'userBio.city',
            'userBio.studyLevel'
        ])->loadCount(['studyDestinations', 'majors', 'preferredUniversities','hobbies']);
        $this->isStudentDetailsModelOpen = true;
    }

    public function closeStudentDetails(){
        $this->isStudentDetailsModelOpen = false;
        $this->student = null;
    }

    public function render()
    {
        return view('livewire.leads.student-details-modal');
    }
}
