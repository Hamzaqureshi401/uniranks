<?php

namespace App\Http\Livewire\University;

use App\Models\General\Language;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\University\UniversityConferenceType;
use App\Models\University\UniversityConferenceSubject;

use Auth;


class UniversityConferences extends Component
{
    use WithFileUploads;

    public $rectangle_logo_path;
    public $languages , 
    $details_in_langs       = 1,
    $university,
    $conference,
    $conf,
    $other_subjects,
    $addCenferenceDetailsInOtherLanguage = 1,
    $names = [],
    $subject_names_lang = [],
    $descriptions = [],
    $square_logo_path,
    $universityConferenceType;
    
    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }
    public function addCenferenceDetailsInOtherLanguage()
    {
        ++$this->addCenferenceDetailsInOtherLanguage;
    }
    public function rules()
    {
        return [
            'conference'                         => ['array'],
            'conference.*'                       => ['present'],
            'conference.university_conference_type_id'  => ['required'],
            'conference.title'                 => ['required','min:1'],
            'conference.start_date'                 => ['required','min:1'],
            'conference.end_date'              => ['required','min:1'],
            'conference.subjects-0'            => ['required','min:1'],
            'rectangle_logo_path'               => ['mimes:jpg,jpeg,png'],
            'square_logo_path'                  => ['mimes:jpg,jpeg,png'],
        ];
    }


    public function save()
    {
        $inputs = $this->validate();
        $data = ['created_by' => Auth::id()];

        if ($this->rectangle_logo_path && $this->square_logo_path) {
            $rectangleLogoPath = $this->rectangle_logo_path->store('logos', 'public');
            $squareLogoPath = $this->square_logo_path->store('logos', 'public');

            $data['rectangle_logo_path'] = $rectangleLogoPath;
            $data['square_logo_path'] = $squareLogoPath;
        }
        foreach ($this->translations as $key => $lang) {
            if (!empty($this->names[$key])) {
                $data['translated_name'][$lang] = $this->names[$key];
            }
        }
        $final = array_merge($data, $this->conference);
        $newConference = \Auth::user()->selected_university->conferences()->create($final);
        $this->handleSubjects($newConference);
        $latestConference = \Auth::user()->selected_university->conferences()->latest('id')->first();
        $this->initForm();
        session()->flash('status', 'Operation Successful!');
    }


    public function handleSubjects($newConference)
    {
        $finalSubjectsData = [];
        foreach ($this->subject_translations as $key => $lang) {
            $subjectData = []; // Initialize $subjectData here for each iteration
            if (!empty($this->subject_names_lang[$key])) {
                $subjectData['translated_name'][$lang] = $this->subject_names_lang[$key];
            } 
        }
        if(empty($subjectData['translated_name'])) {
                $subjectData['translated_name'] = null;
        }
        if (!empty($this->conference['subjects-0'])) {
                $finalSubjectsData[] = [
                    'title' => $this->conference['subjects-0'],
                    'translated_name' => $subjectData['translated_name'],
                ];
        }
        foreach (($this->other_subjects ?? []) as $subjects) {
            $finalSubjectsData[] = [
                'title' => $subjects,
            ];
        }
        $subject = [];
        foreach ($finalSubjectsData as $storeSubject) {
            $subject[] = $newConference->subjects()->create([
                'university_conference_id' => $newConference->id,
                'title' => $storeSubject['title'],
                'translated_name' => $storeSubject['translated_name'] ?? null,
            ]);
        }

        return $subject ?? '--';
    }




    public function mount(){
        $this->initForm();
    }

    public function delete($id){
        $record = UniversityConferenceSubject::whereId($id);
        $data = $record->first()->university_conference_id;
        $record->delete();
        if(UniversityConferenceSubject::where('university_conference_id' , $data)->exists()){

        }else{
            \Auth::user()->selected_university->conferences()->whereId($data)->delete();
        }
        $this->initForm();
        session()->flash('status', 'Operation Successful!');

    }

    public function initForm(){

        $this->languages = Language::orderBy('name')->get();
        $this->universityConferenceType = UniversityConferenceType::get();
        $this->translations   = [];
        $this->translations[] = 'en';
        $this->subject_translations = [];
        //dd($this->conf);
    }

    public function render()
    {
        $this->university = \Auth::user()->selected_university;
        return view('livewire.university.university-conferences');
    }
}
