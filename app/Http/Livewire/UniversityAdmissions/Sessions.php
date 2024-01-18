<?php

namespace App\Http\Livewire\UniversityAdmissions;

use App\Models\General\Language;
use App\Models\University\Admissions\UniversityAdmissionSession;
use App\Models\University\Admissions\UniversitySemester;
use Carbon\Carbon;
use Livewire\Component;
use App\Http\Controllers\Admin\University\Traits\TraitCommonMediaPages;

class Sessions extends Component
{
    use TraitCommonMediaPages;
    public $dataCollection;
    public $descriptions = [];
    public $translations = [];
    public $details_in_langs = 1;
    public $languages;

    public $information;
    public $edit_id;
    public $edit_item;
    public $categories;

    public $isModalOpen = false;
    public $edit_details_in_langs;
    public $edit; 

//    protected $queryString = ['edit' => ['except' => '', 'as' => 'semester']];

    public function mount(){
        $this->languages = Language::orderBy('name')->get();
        $this->categories = \Auth::user()->selected_university->semesters()->get();
        $this->initForm();
        $this->loadData();
    }


    public function initForm()
    {
        if (!empty($this->edit_id)) {
            $this->setupEditForm();
            return;
        }

        $this->information = ['university_semester_id'=>null,'start_date'=>null,'end_date'=>null];
        $this->descriptions = [];
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
    public function loadData(){
        $this->dataCollection = \Auth::user()->selected_university->admissionSessions()->with('semester')->get();
    }

    protected function rules()
    {
        return [
            'descriptions' => ['array', 'required', 'min:1'],
            'translations' => ['array', 'required', 'min:1'],
            'information' => ['array', 'required'],
            'information.start_date'=>['required','date',"after_or_equal:".date('Y-m-d')],
            'information.end_date'=>['required','date',"after:start_date"],
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
                'title'=>'Session Record Updated',
                'message'=>'Session record has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        } else {
            \Auth::user()->selected_university->admissionSessions()->create($data);
            $this->emit('returnResponseModal',[
                'title'=>'Session Record Added',
                'message'=>'1 new session record has been added.',
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
        $this->edit_item = UniversityAdmissionSession::find($this->edit_id);
        $this->edit = $this->edit_item->only(['university_semester_id','start_date','end_date']);
        $this->edit['start_date'] = Carbon::parse($this->edit['start_date'])->format('Y-m-d');
        $this->edit['end_date'] = Carbon::parse($this->edit['end_date'])->format('Y-m-d');
        $translations = $this->edit_item->getTranslations();
        $this->descriptions = array_values($translations['description']);
        $this->translations = array_keys($translations['description']);
        $this->edit_details_in_langs = count($this->translations);
        $this->isModalOpen = true;
        $this->emit('setDate');
    }

    public function delete(UniversityAdmissionSession $semester): void
    {
        $semester->delete();
        $this->loadData();
        $this->emit('returnResponseModal',[
                'title'=>'Record Deleted',
                'message'=>'1 Session record has been deleted.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
    }
    public function render()
    {
        return view('livewire.university-admissions.sessions');
    }
}
