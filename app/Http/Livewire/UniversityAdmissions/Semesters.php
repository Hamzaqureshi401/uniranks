<?php

namespace App\Http\Livewire\UniversityAdmissions;

use App\Models\General\Language;
use App\Models\University\Admissions\UniversitySemester;
use Livewire\Component;

class Semesters extends Component
{
    public $dataCollection;
    public $names = [];
    public $translations = [];
    public $details_in_langs = 1;
    public $languages;

    public $information;
    public $edit_id;
    public $edit_item;
    public $isModalOpen = false;
    public $edit_details_in_langs;
    public $edit;

//    protected $queryString = ['edit' => ['except' => '', 'as' => 'semester']];

    public function mount(){
        $this->languages = Language::orderBy('name')->get();
        $this->initForm();
        $this->loadData();
    }


    public function initForm()
    {
        if (!empty($this->edit_id)) {
            $this->setupEditForm();
            return;
        }

        $this->information = ['start_date'=>null,'end_date'=>null];
        $this->names = [];
        $this->translations = [];
        $this->details_in_langs = 1;
        $this->translations[] = 'en';
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
        return view('livewire.university-admissions.semesters');
    }

    public function loadData(){
        $this->dataCollection = \Auth::user()->selected_university->semesters()->get();
    }

    protected function rules()
    {
        return [
            'names' => ['array', 'required', 'min:1'],
            'translations' => ['array', 'required', 'min:1'],
            'information' => ['array', 'required'],
            'information.start_date'=>['required','date',"after_or_equal:".date('Y-m-d')],
            'information.end_date'=>['required','date',"after:start_date"],
        ];
    }

    public function save()
    {
        $this->validate();
        $data = ['name' => $this->names[0], 'translated_name' => []];

        foreach ($this->translations as $key => $lang) {
            $data['translated_name'][$lang] = $this->names[$key];
        }
        $data = array_merge($data, $this->information);
        if (!empty($this->edit_item)) {
            $this->edit_item->update($data);
            $this->emit('returnResponseModal',[
                'title'=>'Semester Record Updated',
                'message'=>'Semester record has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        } else {
            \Auth::user()->selected_university->semesters()->create($data);
            $this->emit('returnResponseModal',[
                'title'=>'Semester Record Added',
                'message'=>'1 new semester record has been added.',
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
        $this->edit_item = UniversitySemester::find($this->edit_id);
        $this->edit = $this->edit_item->only(['start_date','end_date']);
        $translations = $this->edit_item->getTranslations();
        $this->names = array_values($translations['translated_name']);
        $this->translations = array_keys($translations['translated_name']);
        $this->edit_details_in_langs = count($this->translations);
        $this->isModalOpen = true;

        //$this->emit('goToTop');
    }

    public function delete(UniversitySemester $semester): void
    {
        $semester->admissionSessions()->delete();
        $semester->delete();
        $this->loadData();
        $this->emit('returnResponseModal',[
                'title'=>'Record Deleted',
                'message'=>'1 semester record has been deleted.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
    }
}
