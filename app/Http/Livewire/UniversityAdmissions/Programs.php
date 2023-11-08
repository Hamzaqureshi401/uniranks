<?php

namespace App\Http\Livewire\UniversityAdmissions;

use App\Models\General\AdmissionFeeType;
use App\Models\General\ApplicationRequirement;
use App\Models\General\Degree;
use App\Models\General\Faculty;
use App\Models\General\GradeScale;
use App\Models\General\Language;
use App\Models\General\Major;
use App\Models\General\Test;
use App\Models\University\Admissions\UniversityAdmissionProgram;
use App\Models\University\Admissions\UniversityAdmissionProgramApplicationRequirement;
use App\Models\University\Admissions\UniversityAdmissionProgramGpaRequirement;
use App\Models\University\Admissions\UniversityAdmissionProgramTestRequirement;
use App\Models\University\UniversityProgramFeeTerm;
use Livewire\Component;

class Programs extends Component
{
    public $dataCollection;
    public $descriptions = [];
    public $admission_requirements = [];
    public $names = [];
    public $translations = [];
    public $details_in_langs = 1;
    public $languages;

    public $information;
    public $selected_programs;
    public $document;
    public $edit_id;
    public $edit_item;

    public $degrees = [];
    public $majors = [];
    public $feeTerms = [];
    public $faculities = [];
    public $gradeScales = [];
    public $tests = [];
    public $requirmentsTypes = [];

    public $application_requirements = [];
    public $gpa_requirments = [];

    public $testing_requirements = [];


//    protected $queryString = ['edit' => ['except' => '', 'as' => 'semester']];


    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
        $this->faculities = Faculty::orderBy('title')->get();
        $this->degrees = Degree::get();
        $this->feeTerms = UniversityProgramFeeTerm::all();
        $this->gradeScales = GradeScale::all();
        $this->tests = Test::with('type')->orderBy('type_id')->get();
        $this->requirmentsTypes = ApplicationRequirement::get();
        $this->initForm();
        $this->loadData();
    }

    public function addGpaRequirement()
    {
        $this->gpa_requirments [] = ['grade_scale_id' => '', 'required_grades' => ''];
    }

    public function addTestingRequirement()
    {
        $this->testing_requirements [] = ['test_id' => '', 'required_grades' => ''];
    }

    public function addApplicationRequirement()
    {
        $this->application_requirements [] = ['requirement_id' => '', 'notes' => ''];
    }

    public function removeGpaRequirement($index)
    {
        unset($this->gpa_requirments [$index]);
        sort($this->gpa_requirments);
    }

    public function removeTestingRequirement($index)
    {
        unset($this->testing_requirements [$index]);
        sort($this->testing_requirements);
    }

    public function removeApplicationRequirement($index)
    {
        unset($this->application_requirements [$index]);
        sort($this->admission_requirements);
    }

    public function loadPrograms()
    {
        $this->majors = Major::whereFacultyId($this->information['faculty_id'])->orderBy('title')->get();
    }


    public function initForm()
    {
        if (!empty($this->edit_id)) {
            $this->setupEditForm();
            return;
        }

        $this->information = [
            'degree_id' => '', 'faculty_id' => '', 'program_id' => '',
            'duration_years' => '', 'duration_months' => '', 'fee_term_id' => '',
            'fee' => '', 'is_online' => '', 'is_distance_learning' => ''
        ];

        $this->testing_requirements = [];
        $this->gpa_requirments = [];
        $this->application_requirements = [];
        $this->addTestingRequirement();
        $this->addGpaRequirement();
        $this->addApplicationRequirement();

        $this->names = [];
        $this->translations = [];
        $this->descriptions = [];
        $this->admission_requirements = [];
        $this->details_in_langs = 1;
        $this->translations[] = 'en';


    }

    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }

    public function render()
    {
        return view('livewire.university-admissions.programs');
    }

    public function loadData()
    {
        $this->dataCollection = \Auth::user()->selected_university->admissionPrograms()
            ->with(['faculty', 'degree', 'program'])
            ->get();
    }

    protected function rules()
    {
        return [
            'names' => ['array', 'required', 'min:1'],
            'translations' => ['array', 'required', 'min:1'],
            'descriptions' => ['array', 'required', 'min:1'],
            'information' => ['array', 'required'],
            'information.degree_id' => ['required'],
            'information.faculty_id' => ['required'],
            'information.program_id' => ['required'],
            'information.duration_years' => ['present'],
            'information.duration_months' => ['present'],
            'information.fee_term_id' => ['required'],
            'information.fee' => ['required'],
            'information.is_online' => ['present'],
            'information.is_distance_learning' => ['present']
        ];
    }

    public function save()
    {
        $this->validate();
        $data = [
            'university_id' => \Auth::user()->selected_university->id,
            'currency_id' => \AppConst::CURRENCY_USD,
            'title' => $this->names[0], 'translated_name' => [],'admission_requirements'=>[],
            'created_by_id' => \Auth::id(), 'description' => [],
        ];
        foreach ($this->translations as $key => $lang) {
            $data['description'][$lang] = $this->descriptions[$key];
            $data['translated_name'][$lang] = $this->names[$key];
            if(!empty($this->admission_requirements[$key])){
            $data['admission_requirements'][$lang] = $this->admission_requirements[$key];
           }
        }

        $data = array_merge($data, $this->information);

        foreach (['is_distance_learning', 'is_online', 'duration_years', 'duration_months'] as $key) {
            if (!empty($data[$key])) continue;
            unset($data[$key]);
        }

        $gpa_requirements = [];
        $test_requirments = [];
        $app_requirments = [];
        foreach ($this->gpa_requirments as $requirement) {
            if (empty($requirement['grade_scale_id'])) continue;
            $gpa_requirements[$requirement['grade_scale_id']] = ['required_grades' => $requirement['required_grades']];
        }
        foreach ($this->testing_requirements as $requirement) {
            if (empty($requirement['test_id'])) continue;
            $test_requirments[$requirement['test_id']] = ['required_grades' => $requirement['required_grades']];
        }
        foreach ($this->application_requirements as $requirement) {
            if (empty($requirement['requirement_id'])) continue;
            $app_requirments[$requirement['requirement_id']] = ['notes' => $requirement['notes']];
        }

        $data ['created_by_id'] = \Auth::id();
        if (!empty($this->edit_item)) {
            $this->edit_item->update($data);
            $this->edit_item->gpaRequirments()->sync($gpa_requirements);
            $this->edit_item->testingRequirments()->sync($test_requirments);
            $this->edit_item->applicationRequirments()->sync($app_requirments);
        } else {
            $program = UniversityAdmissionProgram::create($data);
            $program->gpaRequirments()->sync($gpa_requirements);
            $program->testingRequirments()->sync($test_requirments);
            $program->applicationRequirments()->sync($app_requirments);
        }
        $this->edit_item = null;
        $this->edit_id = null;
        $this->initForm();
        $this->loadData();
        session()->flash('status', 'Operation Successful!');
    }

    public function loadTimePicker()
    {
        $this->dispatchBrowserEvent('add-picker');
    }


    public function edit($semester_id)
    {
        $this->edit_id = $semester_id;
        $this->setupEditForm();
    }

    public function setupEditForm(): void
    {
        $this->edit_item = UniversityAdmissionProgram::find($this->edit_id);
        $this->information = $this->edit_item->only([
            'degree_id', 'faculty_id', 'program_id', 'duration_years', 'duration_months', 'fee_term_id',
            'fee', 'is_online', 'is_distance_learning'
        ]);
        $this->loadPrograms();
        $this->testing_requirements = [];
        $this->gpa_requirments = [];
        $this->application_requirements = [];
        $gpa_reqs = UniversityAdmissionProgramGpaRequirement::whereProgramId($this->edit_id)->get();
        $test_reqs = UniversityAdmissionProgramTestRequirement::whereProgramId($this->edit_id)->get();
        $app_reqs = UniversityAdmissionProgramApplicationRequirement::whereProgramId($this->edit_id)->get();
        foreach ($gpa_reqs as $req){
            $this->gpa_requirments [] = $req->only(['grade_scale_id','required_grades']);
        }
        foreach ($test_reqs as $req){
            $this->testing_requirements [] = $req->only(['test_id','required_grades']);
        }
        foreach ($app_reqs as $req){
            $this->application_requirements [] = ['requirement_id'=>$req->application_requirement_id,'notes'=>$req->notes];
        }
        $this->addTestingRequirement();
        $this->addGpaRequirement();
        $this->addApplicationRequirement();
        $translations = $this->edit_item->getTranslations();
        $this->names = array_values($translations['translated_name']);
        $this->descriptions = array_values($translations['description']);
        $this->admission_requirements = array_values($translations['admission_requirements']);
        $this->translations = array_keys($translations['translated_name']);
        $this->details_in_langs = count($this->translations);
        $this->emit('goToTop');
    }

    public function delete(UniversityAdmissionProgram $admissionProgram): void
    {
        $admissionProgram->delete();
        $this->loadData();
    }
}
