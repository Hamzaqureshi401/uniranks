<?php

namespace App\Http\Livewire\UniversityAdmissions;

use App\Models\General\Language;
use Livewire\Component;
use App\Rules\ValidateStartDate;
use App\Http\Controllers\Admin\University\Traits\Program\AdmissionsSessionsTrait;
use App\Http\Controllers\Admin\University\Traits\Shared\MustApproveUpdates;
use App\Models\University\Admissions\UpdateRequestsModals\UniversityAdmissionSessionUpdateRequest;
use App\Models\University\Admissions\UniversityAdmissionSession;
use Illuminate\Http\Request;




class AdmissionsSemestersAndAdmissionSessions extends Component
{
    use AdmissionsSessionsTrait;
        use MustApproveUpdates;


    public $languages , 
    $details_in_langs  = 1,
    $university_semester_id,
    $semester_details = null,
    $admission = [],
    $translations = [],
    $names = [],
    $semesters;

    
    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }

    public function initForm(){
        $this->semesters = \Auth::user()->selected_university->semesters()->get();
    }

    public function loadSemesterDetail(){

        if (!empty($this->admission['university_semester_id'])) {
            $this->semester_details = \Auth::user()->selected_university->semesters()->where('id' , $this->admission['university_semester_id'])->first();
            if ($this->semester_details) {
            $this->admission['semester_start_date'] = $this->semester_details->start_date;
            }
    }else{
        $this->semester_details = null;
        $this->admission['semester_start_date'] = null;
    }
    }

    public function mount(){
        $this->languages = Language::orderBy('name')->get();
        $this->initForm();
    }

    public function render()
    { 
        return view('livewire.university-admissions.admissions-semesters-and-admission-sessions');
    }


    public function rules()
    {
        $rules = [
            'admission'                         => ['array'],
            'admission.*'                       => ['present'],
            'admission.university_semester_id'  => ['required','min:1'],
        ];
        
    if ($this->semester_details) {
        $rules['admission.start_date'] = [
            'required',
            'date',
            'nullable',
            new ValidateStartDate($this->semester_details->start_date, $this->semester_details->end_date)
        ];

        $rules['admission.end_date'] = [
            'required',
            'date',
            'nullable',
            new ValidateStartDate($this->semester_details->start_date, $this->semester_details->end_date)
        ];
    }

    return $rules;
    }

    public function save()
    {
        //$inputs = $this->validate();
       $data = [
            'university_id'     => \Auth::user()->campus_id,
            'type'              => \AppConst::ADD_RECORD,
            'requested_by_id'   => \Auth::id()
        ];
        foreach ($this->translations as $key => $lang) {
            if (!empty($this->names[$key])) {
                $data['description'][$lang] = $this->names[$key];
            }
        }
        if (!empty($this->admission['c_description'])) {
            $data['description']['en'] = $this->admission['c_description'];
        }
        if (!empty($data['description'])) {
            $final = array_merge($data, $this->admission);
            $data = $final; // Update $data with the merged result
        } else {
            $final = $this->admission;
        }
        //$requestInstance = Request::create('/', 'POST', $final);
        // $result = $this->saveRequestForApprovalAndRedirect(
        //     $requestInstance, 
        //     new UniversityAdmissionSessionUpdateRequest, 
        //     new UniversityAdmissionSession);

        //dd($result);



        dd($this->saveRequestForApprovalAndRedirect(new Request($final), new UniversityAdmissionSessionUpdateRequest, new UniversityAdmissionSession));



        //dd($final, $data);


    
       // Auth::user()->academics()->create($final);
        $this->initForm();
        session()->flash('status', 'Operation Successful!');
    }
}
