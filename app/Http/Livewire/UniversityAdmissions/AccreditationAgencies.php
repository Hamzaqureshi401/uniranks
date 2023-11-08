<?php

namespace App\Http\Livewire\UniversityAdmissions;

use App\Models\General\AccreditationAgency;
use App\Models\General\AccreditationAgencyType;
use App\Models\General\Degree;
use App\Models\General\Language;
use App\Models\University\Admissions\UniversityAccreditationAgency;
use App\Models\University\Admissions\UniversityAccreditationAgencyPrograms;
use App\Models\University\Admissions\UniversityAdmissionProgram;
use App\Models\University\Admissions\UniversitySemester;
use Livewire\Component;
use Livewire\WithFileUploads;

class AccreditationAgencies extends Component
{
    use WithFileUploads;
    public $dataCollection;
    public $names = [];
    public $translations = [];
    public $details_in_langs = 1;
    public $languages;

    public $information;
    public $selected_programs;
    public $document;
    public $edit_id;
    public $edit_item;

    public $main_agencies;
    public $agency_types;
    public $degrees;
    public $admissionPrograms;
//    protected $queryString = ['edit' => ['except' => '', 'as' => 'semester']];

    public function mount(){
        $this->languages = Language::orderBy('name')->get();
        $this->main_agencies = AccreditationAgency::orderBy('title')->get();
        $this->agency_types = AccreditationAgencyType::orderBy('title')->get();
        $this->degrees = Degree::get();
        $this->admissionPrograms = UniversityAdmissionProgram::whereUniversityId(\Auth::user()->selected_university->id)->orderBy('title')->get();
        $this->initForm();
        $this->loadData();
    }


    public function initForm()
    {
        if (!empty($this->edit_id)) {
            $this->setupEditForm();
            return;
        }

        $this->information = ['join_date'=>null,'accreditation_agencies_id'=>null,'accredited_date'=>null,'agency_type_id'=>null
            ,'degree_id'=>null,'listing_url'=>''];
        $this->selected_programs = [];
        $this->emit('add-select2');
        $this->loadTimePicker();
    }

    public function addDetailsInOtherLanguage()
    {
        $this->loadTimePicker();
        ++$this->details_in_langs;
    }
    public function render()
    {
        $this->loadTimePicker();
        return view('livewire.university-admissions.accreditation-agencies');
    }

    public function loadData(){
        $this->dataCollection = \Auth::user()->selected_university->accreditationAgencies()
            ->with(['accreditingAgency','agencyType','degree','programs'])
            ->get();
    }

    protected function rules()
    {
        return [
            'information' => ['array', 'required'],
            'information.join_date'=>['required','date'],
            'information.accreditation_agencies_id'=>['required'],
            'information.accredited_date'=>['required','date'],
            'information.agency_type_id'=>['required'],
            'information.degree_id'=>['required'],
            'information.listing_url'=>['required'],
            'selected_programs' => ['required','array'],
            'document'=>[],
        ];
    }

    public function save()
    {
        $this->validate();
        $data = $this->information;
//        $data = ['name' => $this->names[0], 'translated_name' => []];
//
//        foreach ($this->translations as $key => $lang) {
//            $data['translated_name'][$lang] = $this->names[$key];
//        }
//        $data = array_merge($data, $this->information);
        if (!empty($this->edit_item)) {
            $this->edit_item->update($data);
            if(!empty($this->document)) {
                $path = $this->document->storePublicly('images/universities-agencies', 's3');
                $this->edit_item->update(['document_path'=>$path]);
            }
            $this->edit_item->programs()->attach($this->selected_programs);
        } else {
            $agency = \Auth::user()->selected_university->accreditationAgencies()->create($data);
            if(!empty($this->document)) {
                $path = $this->document->storePublicly('images/universities-agencies', 's3');
                $agency->update(['document_path'=>$path]);
            }
            $agency->programs()->attach($this->selected_programs);
        }
        $this->edit_item = null;
        $this->edit_id = null;
        $this->initForm();
        $this->loadData();
        session()->flash('status', 'Operation Successful!');
    }

    public function loadTimePicker(){
        $this->dispatchBrowserEvent('add-picker');
    }


    public function edit($semester_id)
    {
        $this->edit_id = $semester_id;
        $this->setupEditForm();
    }

    public function setupEditForm(): void
    {
        $this->edit_item = UniversityAccreditationAgency::find($this->edit_id);
        $this->information = $this->edit_item->only(['join_date','accreditation_agencies_id','accredited_date','agency_type_id'
            ,'degree_id','listing_url']);
        $this->selected_programs = UniversityAccreditationAgencyPrograms::whereUniAccAgencyId($this->edit_id)->pluck('program_id')->toArray();
        $this->emit('add-select2');
        $this->emit('goToTop');

    }

    public function delete(UniversityAccreditationAgency $semester): void
    {
        $semester->attachedPrograms()->delete();
        $semester->delete();
        $this->loadData();
    }

}
