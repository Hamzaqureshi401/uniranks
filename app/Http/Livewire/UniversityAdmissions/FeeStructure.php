<?php

namespace App\Http\Livewire\UniversityAdmissions;

use App\Models\General\AdmissionFeeType;
use App\Models\General\Degree;
use App\Models\General\Faculty;
use App\Models\General\Language;
use App\Models\University\Admissions\UniversityAdmissionProgram;
use App\Models\University\Admissions\UniversityFeeStructure;
use Livewire\Component;

class FeeStructure extends Component
{
    public $dataCollection;
    public $notes = [];
    public $translations = [];
    public $details_in_langs = 1;
    public $languages;

    public $information;
    public $selected_programs;
    public $document;
    public $edit_id;
    public $edit_item;

    public $degrees = [];
    public $admissionPrograms = [];
    public $admissionFeeTypes = [];
    public $faculities = [];

//    protected $queryString = ['edit' => ['except' => '', 'as' => 'semester']];

    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
        $this->faculities = Faculty::orderBy('title')->get();
        $this->degrees = Degree::get();
        $this->admissionFeeTypes = AdmissionFeeType::orderBy('title')->get();
        $this->initForm();
        $this->loadData();
    }

    public function loadPrograms()
    {
        $this->admissionPrograms = UniversityAdmissionProgram::whereUniversityId(\Auth::user()->selected_university->id)->whereFacultyId($this->information['faculty_id'])->orderBy('title')->get();
    }


    public function initForm()
    {
        if (!empty($this->edit_id)) {
            $this->setupEditForm();
            return;
        }

        $this->information = [
            'degree_id' => '', 'faculty_id' => '', 'program_id' => '',
            'no_credit_hr' => '', 'offer_installments' => '',
            'cost_per_credit_hr' => '', 'application_fee' => '',
            'admission_fee' => '', 'other_fee_amount' => '', 'other_fee_type_id' => ''
        ];

        $this->notes = [];
        $this->translations = [];
        $this->details_in_langs = 1;
        $this->translations[] = 'en';

    }

    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }

    public function render()
    {
        return view('livewire.university-admissions.fee-structure');
    }

    public function loadData()
    {
        $this->dataCollection = \Auth::user()->selected_university->feeStructures()
            ->with(['otherFeeType', 'faculty', 'degree', 'program', 'createdBy'])
            ->get();
    }

    protected function rules()
    {
        return [
            'information' => ['array', 'required'],
            'information.degree_id' => ['required'],
            'information.faculty_id' => ['required'],
            'information.program_id' => ['required'],
            'information.no_credit_hr' => ['required'],
            'information.offer_installments' => [],
            'information.cost_per_credit_hr' => ['required'],
            'information.application_fee' => ['required'],
            'information.admission_fee' => ['required'],
            'information.other_fee_amount' => [],
            'information.other_fee_type_id' => [],
        ];
    }

    public function save()
    {
        $this->validate();
        $data = ['notes' => []];

        foreach ($this->translations as $key => $lang) {
            $data['notes'][$lang] = $this->notes[$key];
        }



        $data = array_merge($data, $this->information);
        foreach (['no_credit_hr', 'offer_installments', 'cost_per_credit_hr', 'application_fee', 'admission_fee', 'other_fee_amount','other_fee_type_id'] as $key) {
            if (!empty($data[$key])) continue;
            unset($data[$key]);
        }
        $data ['created_by_id'] = \Auth::id();
        if (!empty($this->edit_item)) {
            $this->edit_item->update($data);
            $this->emit('returnResponseModal',[
                'title'=>'Fee Structure Updated',
                'message'=>'Fee structure has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        } else {
            \Auth::user()->selected_university->feeStructures()->create($data);
            $this->emit('returnResponseModal',[
                'title'=>'Fee Structure Added',
                'message'=>'1 new fee structure record has been added.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        }
        $this->edit_item = null;
        $this->edit_id = null;
        $this->initForm();
        $this->loadData();
        //session()->flash('status', 'Operation Successful!');
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
        $this->edit_item = UniversityFeeStructure::find($this->edit_id);
        $this->information = $this->edit_item->only([
            'degree_id', 'faculty_id', 'program_id',
            'no_credit_hr', 'offer_installments',
            'cost_per_credit_hr', 'application_fee',
            'admission_fee', 'other_fee_amount', 'other_fee_type_id'
        ]);
        $this->loadPrograms();
        $translations = $this->edit_item->getTranslations();
        $this->notes = array_values($translations['notes']);
        $this->translations = array_keys($translations['notes']);
        $this->details_in_langs = count($this->translations);
        $this->emit('goToTop');
    }

    public function delete(UniversityFeeStructure $feeStructure): void
    {
        $feeStructure->delete();
        $this->loadData();
        $this->emit('returnResponseModal',[
                'title'=>'Record Deleted',
                'message'=>'1 Fee structure record has been deleted.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
    }
}
