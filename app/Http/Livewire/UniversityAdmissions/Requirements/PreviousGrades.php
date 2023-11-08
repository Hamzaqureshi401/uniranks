<?php

namespace App\Http\Livewire\UniversityAdmissions\Requirements;

use App\Models\General\GradeScale;
use Livewire\Component;

class PreviousGrades extends Component
{
    public $degree_id;
    public $gradeScales = [];
    public $gpa_requirments = [];

    public function mount()
    {

        $this->gradeScales = GradeScale::all();
        $this->initForm();
    }

    public function initForm()
    {
        $uni = \Auth::user()->selected_university;
        $this->gpa_requirments = [];
        $gpa_reqs = $uni->gpaRequirments()->where('degree_id', $this->degree_id)->get();
        foreach ($gpa_reqs as $req) {
            $this->gpa_requirments [] = $req->only(['degree_id', 'grade_scale_id', 'required_grades']);
        }

        if (empty($this->gpa_requirments)) {
            $this->addGpaRequirement();
        }

    }

    public function addGpaRequirement()
    {
        $this->gpa_requirments [] = ['degree_id' => $this->degree_id, 'grade_scale_id' => '', 'required_grades' => ''];
    }

    public function removeGpaRequirement($index)
    {
        unset($this->gpa_requirments [$index]);
        sort($this->gpa_requirments);
    }


    protected function rules()
    {
        $rules = [];
        return array_merge([
            'gpa_requirments' => [],
        ], $rules);
    }

    public function save()
    {
        $this->validate();
        $uni = \Auth::user()->selected_university;
        $uni->gpaRequirments()->where('degree_id',$this->degree_id)->delete();
        $uni->gpaRequirments()->createMany($this->gpa_requirments);
        $this->initForm();
        session()->flash('status', 'Operation Successful!');
    }

    public function render()
    {
        return view('livewire.university-admissions.requirements.previous-grades');
    }
}
