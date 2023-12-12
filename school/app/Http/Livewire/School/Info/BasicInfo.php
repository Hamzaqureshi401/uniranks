<?php

namespace App\Http\Livewire\School\Info;

use App\Models\General\Countries;
use App\Models\Institutes\School;
use App\Models\School\SchoolType;
use Illuminate\Validation\Rule;
use Livewire\Component;

class BasicInfo extends Component
{
    /**
     * @var \App\Models\Institutes\School $school ;
     * */
    public $school_name;
    public $national_id;
    public $school_type_id;
    public $dial_code;
    public $phone;
    public $email;
    public $facebook_url;
    public $website;
    public $linkedin_url;
    public $country_code;
    public $school_types;

    public $allowed_dial_codes;

    public function mount()
    {
        $this->school_types = SchoolType::all();
        $this->allowed_dial_codes = Countries::whereNotNull('country_code')->pluck('code')->toArray();
        if (!in_array('us', $this->allowed_dial_codes)) {
            $this->allowed_dial_codes[] = 'us';
        }
        $this->setData();

    }

    public function render()
    {
        return view('livewire.school.info.basic-info');
    }

    protected function rules()
    {
        return [
            'school_name' => ['required'],
            'dial_code' => ['required'],
            'phone' => ['required', 'numeric', 'digits:9'],
            'email' => ['email', 'email:rfc,filter', Rule::unique(School::class, 'email')->ignore(\Auth::user()->selected_school->id)],
            'website' => [''],
            'facebook_url' => [''],
            'linkedin_url' => [''],
            'national_id' => ['present', 'nullable'],
            'school_type_id' => [''],
        ];
    }

//    public function updated($propertyName)
//    {
//        $this->validateOnly($propertyName);
//    }


    public function setData()
    {
        $school = \Auth::user()->selected_school;
        $school->load('phoneNumberCountry');
        $this->school_name = $school->school_name;
        $this->email = $school->email;
        $this->dial_code = $school->phoneNumberCountry?->code ?? (session('country_info')['code'] ?? 'us');
        $this->phone = $school->phone;
        $this->website = $school->website;
        $this->facebook_url = $school->facebook_url;
        $this->linkedin_url = $school->linkedin_url;
        $this->country_code = $school->country->code;
        $this->national_id = $school->national_id;
        $this->school_type_id = $school->school_type_id;

        if (!in_array($this->dial_code, $this->allowed_dial_codes)) {
            $this->dial_code = 'us';
        }
    }

    public function save()
    {
        $validatedData = $this->validate();
        $school = \Auth::user()->selected_school;
        $school->update($validatedData);
        setUserSelectedSchool($school);
        session()->flash('status', 'School Information Updated!');
    }


}
