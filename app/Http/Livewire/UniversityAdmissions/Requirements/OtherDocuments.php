<?php

namespace App\Http\Livewire\UniversityAdmissions\Requirements;

use App\Models\General\ApplicationRequirement;
use Livewire\Component;

class OtherDocuments extends Component
{
    public $type_id;
    public $other_application_requirements = [];
    public $other_requirments_types = [];

    public function mount()
    {
        $this->type_id = [\AppConst::APPLICATION_TYPE_TRAVEL,\AppConst::APPLICATION_TYPE_EDUCATION];
        $this->other_requirments_types = ApplicationRequirement::whereNotIn('type_id',$this->type_id)->get();
        $this->initForm();
    }

    public function initForm()
    {
        $uni = \Auth::user()->selected_university;
        $this->other_application_requirements = [];
        $app_reqs = $uni->applicationRequirments()->with('requirement:id,type_id')
            ->whereHas('requirement', fn($q)=>$q->whereNotIn('type_id',$this->type_id))
            ->get();

        foreach ($app_reqs as $req) {
            $this->other_application_requirements [] = $req->only(['application_requirement_id', 'notes']);
        }

        if (empty($this->other_application_requirements)) {
            $this->addApplicationRequirement();
        }
    }


    public function addApplicationRequirement()
    {
        $this->other_application_requirements [] = ['application_requirement_id' => '', 'notes' => ''];
    }


    public function removeApplicationRequirement($index)
    {
        unset($this->other_application_requirements [$index]);
        sort($this->other_application_requirements);
    }

    protected function rules()
    {
        return [
            'other_application_requirements' => [],
        ];
    }

    public function save()
    {
        $this->validate();
        $uni = \Auth::user()->selected_university;
        $uni->applicationRequirments()->whereHas('requirement', fn($q)=>$q->whereNotIn('type_id',$this->type_id))->delete();
        $uni->applicationRequirments()->createMany($this->other_application_requirements);
        $this->initForm();
        session()->flash('status', 'Operation Successful!');
    }

    public function render()
    {
        return view('livewire.university-admissions.requirements.other-documents');
    }
}
