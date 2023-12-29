<?php

namespace App\Http\Livewire\UniversityAdmissions;

use App\Models\General\Language;
use App\Models\General\ScholarshipType;
use App\Models\University\UniversityScholarship;
use Livewire\Component;

class Scholarships extends Component
{
    public $scholarship_types = [];

    public $dataCollection;
    public $descriptions = [];
    public $translations = [];
    public $details_in_langs = 1;
    public $languages;

    public $information;
    public $edit_id;
    public $edit_item;

    public function mount()
    {
        $this->scholarship_types = ScholarshipType::orderBy('title')->get();
        $this->languages = Language::orderBy('name')->get();
        $this->initForm();
        $this->loadData();
    }

    public function initForm($reset=false)
    {
        if (!empty($this->edit_id) && $reset) {
            $this->setupEditForm();
            return;
        }

        $this->information = ['scholarship_type_id' => null,
            'coverage' => null, 'international_acceptance' => null, 'local_acceptance' => null];
        $this->descriptions = [];
        $this->translations = [];
        $this->details_in_langs = 1;
        $this->translations[] = 'en';
        $this->edit_id = null;
        $this->edit_item = null;
    }

    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }

    public function loadData()
    {
        $this->dataCollection = \Auth::user()->selected_university->scholarships()->with(['scholarshipType', 'createdBy'])->get();
    }

    protected function rules()
    {
        return [
            'descriptions' => ['array', 'required', 'min:1'],
            'translations' => ['array', 'required', 'min:1'],
            'information' => ['array', 'required'],
            'information.coverage' => ['required', 'min:1'],
            'information.scholarship_type_id' => ['required'],
        ];
    }

    public function save()
    {
        $this->validate();
        $data = ['description' => []];

        foreach ($this->translations as $key => $lang) {
            $data['description'][$lang] = $this->descriptions[$key];
        }
        $data = array_merge($data, $this->information);
        if (!empty($this->edit_item)) {
            $this->edit_item->update($data);
            $this->emit('returnResponseModal',[
                'title'=>'Scholarship Updated',
                'message'=>'Scholarship has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        } else {
            \Auth::user()->selected_university->scholarships()->create($data);
            $this->emit('returnResponseModal',[
                'title'=>'Scholarship Added',
                'message'=>'1 new scholarship record has been added.',
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

    public function edit($semester_id)
    {
        $this->edit_id = $semester_id;
        $this->setupEditForm();
    }

    public function setupEditForm(): void
    {
        $this->edit_item = UniversityScholarship::find($this->edit_id);
        $this->information = $this->edit_item->only(['scholarship_type_id',
            'coverage', 'international_acceptance', 'local_acceptance']);
        $translations = $this->edit_item->getTranslations();
        $this->descriptions = array_values($translations['description']);
        $this->translations = array_keys($translations['description']);
        $this->details_in_langs = count($this->translations);
        $this->emit('goToTop');
    }

    public function delete(UniversityScholarship $scholarship): void
    {
        $scholarship->delete();
        $this->loadData();
        $this->emit('returnResponseModal',[
                'title'=>'Record Deleted',
                'message'=>'1 Scholarship record has been deleted.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
    }

    public function render()
    {
        return view('livewire.university-admissions.scholarships');
    }
}
