<?php

namespace App\Http\Livewire\UniversityAdmissions\Requirements;

use App\Models\General\GradeScale;
use Livewire\Component;

class PreviousGrades extends Component
{
    public $degree_id;
    public $gradeScales = [];
    public $gpa_requirments = [];
    public $unselected_grade_scale_id = [];
    public $val = false;
    public $showAdd = true;



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
            $this->gpa_requirments [] = $req->only(['degree_id', 'grade_scale_id', 'required_grades' , 'updated_at']);
        }
        $this->unselected_grade_scale_id = array_column($this->gpa_requirments, 'grade_scale_id');
        if (empty($this->gpa_requirments)) {
            $this->addGpaRequirement();
        }
        if(count(array_column($this->gpa_requirments, 'grade_scale_id')) != count($this->gradeScales)){
            $this->showAdd = false;
        }

    }

    public function addGpaRequirement()
    {
        if(count(array_column($this->gpa_requirments, 'grade_scale_id')) != count($this->gradeScales)){
            $this->unselected_grade_scale_id = array_column($this->gpa_requirments, 'grade_scale_id');
            $this->gpa_requirments [] = ['degree_id' => $this->degree_id, 'grade_scale_id' => '', 'required_grades' => ''];
            $this->emit('setOpion');
        }else{
            $this->mount();
        }
    }

    public function removeGpaRequirement($index)
    {
        unset($this->gpa_requirments [$index]);
        sort($this->gpa_requirments);
    }


    protected function rules()
{
    $rules = [];
    
    // Loop through each element in gpa_requirments and add validation rules
    foreach ($this->gpa_requirments as $key => $value) {
        $gradeScale = $this->gradeScales->where('id', $value['grade_scale_id'])->first();
        
        if ($gradeScale) {
            $rules["gpa_requirments.{$key}.required_grades"] = [
                'numeric',
                'min:0',
                'max:' . $gradeScale->title,
            ];
        }
    }

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
        $this->emit('returnResponseModal',[
                'title'=>'Grades Record Added',
                'message'=>'Grades record has been added.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        //session()->flash('status', 'Operation Successful!');
    }

    public function render()
    {
        return view('livewire.university-admissions.requirements.previous-grades');
    }
}
