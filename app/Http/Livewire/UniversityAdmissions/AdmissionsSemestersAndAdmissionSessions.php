<?php

namespace App\Http\Livewire\UniversityAdmissions;

use App\Models\General\Language;
use Livewire\Component;
use App\Rules\ValidateStartDate;
use App\Http\Controllers\Admin\University\Traits\Program\AdmissionsSessionsTrait;
use App\Http\Controllers\Admin\University\Traits\Shared\MustApproveUpdates;
use App\Models\University\Admissions\UpdateRequestsModals\UniversityAdmissionSessionUpdateRequest;
use App\Models\University\Admissions\SemesterAdmissionSessionUserReview;

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
    $review_request,
    $semesters;

    
    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }

    public function initForm(){
        $this->semesters = \Auth::user()->selected_university->admissionSessions()->get();
        $this->review_request = $this->getAdmissionSessions();
        //dd($this->review_request);

    }

   public function loadSemesterDetail()
{
    if (!empty($this->admission['university_semester_id'])) {
        $this->semester_details = \Auth::user()->selected_university->semesters()->where('id', $this->admission['university_semester_id'])->first(); 
        if ($this->semester_details) {
            $minDate = $this->semester_details->start_date;
            $maxDate = $this->semester_details->end_date;

            $this->admission['semester_start_date'] = $minDate;

            // Dispatch an event to notify Livewire about the date change
            $this->dispatchBrowserEvent('startDateChanged', [$minDate, $maxDate]);
        }
    } else {
        $this->resetForm();
    }
}


    public function resetForm(){

        $this->semester_details = null;
        $this->admission['semester_start_date'] = null;
        $this->admission['start_date'] = null;
        $this->admission['end_date'] = null;
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
        $inputs = $this->validate();

       $old_record = \Auth::user()->selected_university->admissionSessions()->where('university_semester_id' , $this->admission['university_semester_id'])->first();
       $data = [
            'university_id'     => \Auth::user()->campus_id,
            'type'              => \AppConst::ADD_RECORD,
            'requested_by_id'   => \Auth::id(),
            'related_record_id' => $old_record->id,
            'old_value'         => $old_record->start_date.','.$old_record->end_date,
            'what_changed'      => $this->admission['start_date'].','.$this->admission['end_date'],

        ];
        foreach ($this->translations as $key => $lang) {
            if (!empty($this->names[$key])) {
                $data['description'][$lang] = $this->names[$key];
            }
        }
        if (!empty($this->admission['c_description'])) {
            $data['description']['en'] = $this->admission['c_description'];
        }
        
        $final = array_merge($data, $this->admission);
        
        $request = Request::create('/dummy-route', 'POST', $final);

        $this->saveRequestForApprovalAndRedirect($request, new UniversityAdmissionSessionUpdateRequest, new UniversityAdmissionSession);

        // $request_record = UniversityAdmissionSessionUpdateRequest::latest('id')->first();

        // $review_record = [
        //     'university_admission_requirement_update_request_id' => $request_record->id,
        //     'user_id' => \Auth::id(),
        //     'reviewed_by'=> null,
        //     'remarks' => null,
        // ];
        // SemesterAdmissionSessionUserReview::create($review_record);

       // dd($final , $data , UniversityAdmissionSessionUpdateRequest::get());
        $this->initForm();
        $this->resetForm();
        $this->emit('returnResponseModal',[
                'title'=>'Admission Semester Reord Added',
                'message'=>'1 new admission semester record has been added.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
        ]);
        //session()->flash('status', 'Operation Successful!');
    }

    public function delete($id){
        
    $data = ['id' => $id];
    $request = Request::create('/dummy-route', 'POST', $data);
    $this->saveDeleteRecordRequestAndRedirect($request, new UniversityAdmissionSessionUpdateRequest, new UniversityAdmissionSession);
    $this->initForm();
    $this->resetForm();
    $this->emit('returnResponseModal',[
                'title'=>'Record Deleted',
                'message'=>'1 Admission semester record has been deleted.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
    //session()->flash('status', 'Operation Successful!');
    }

    public function deleteRecord($id){

    UniversityAdmissionSessionUpdateRequest::whereId($id)->delete();
    $this->initForm();
    $this->resetForm();
    $this->emit('returnResponseModal',[
                'title'=>'Record Deleted',
                'message'=>'1 Admission semester review record has been deleted.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        //session()->flash('status', 'Operation Successful!');
    }
}
