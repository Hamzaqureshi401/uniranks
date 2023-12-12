<?php

namespace App\Http\Livewire\Auth;

use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\General\CountryDirectorate;
use App\Models\General\CountryDirectorateRegion;
use App\Models\General\CountryState;
use App\Models\General\CountryStateZone;
use App\Models\Institutes\School;
use App\Models\School\SchoolType;
use Illuminate\Validation\Rule;
use Livewire\Component;

class SchoolRegistartionForm extends Component
{
    public $c_country;
    public $countries;

    public $country_id = "";
    public $directorate_id = "";
    public $region_id = "";

    public $state_id = "";
    public $zone_id = "";
    public $city_id = "";

    public $directorates = [];
    public $regions = [];

    public $states = [];

    public $zones = [];
    public $cities = [];
    public $school_types = [];
    public $school_type_id = '';
    public $national_id = '';
    public $address = '';
    public $school_id = '';
    public $email;

    /* @var School $selected_school*/
    public $selected_school = null;

    protected function rules(){
        return [
            'country_id'=>['required'],
            'school_type_id'=>['sometimes','required'],
            'state_id'=>['sometimes','required'],
            'city_id'=>['sometimes','required'],
            'national_id'=>[],
            'school_id'=>['required'],
            'email'=>['required', 'string', 'email:rfc,filter', 'max:255', 'unique:users'],
        ];
    }

    protected function validationAttributes()
    {
        return [
            'country_id'=>__('Country'),
            'school_type_id'=>__('School Type'),
            'state_id'=>__('Province'),
            'city_id'=>__('City'),
            'school_id'=>__('School')
        ];
    }
    protected function messages()
    {
        return [
            'country_id.required'=>__('Please select a country'),
            'school_type_id.required'=>__('Please select school type'),
            'state_id.required'=>__('Please select province'),
            'city_id.required'=>__('Please select city'),
            'school_id.required'=>__('Please select a school'),
            'national_id.required'=>__("Please Enter School's National ID"),
            'email.required'=>__('Please enter email'),
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->countries = Countries::orderBy('country_name')->get();
        $this->school_types = SchoolType::all();
        $this->loadStates();
        $this->loadSchoolByNationalId();
    }


    public function loadDirectorates()
    {
        $this->directorate_id = '';
        $this->region_id = '';
        $this->state_id = '';
        $this->zone_id = '';
        $this->city_id = '';
        $this->directorates = [];
        $this->regions = [];
        $this->states = [];
        $this->zones = [];
        $this->cities = [];
        if (!in_array($this->country_id, \AppConst::COUNTRY_REQUIRED_EXTRA_DATA)) return;
        $this->region_id = '';
        $this->directorates = CountryDirectorate::whereCountryId($this->country_id)->orderBy('name')->get();
    }

    public function loadRegions()
    {
        if (!in_array($this->country_id, \AppConst::COUNTRY_REQUIRED_EXTRA_DATA)) return;
        $this->state_id = '';
        $this->regions = CountryDirectorateRegion::whereCountryDirectorateId($this->directorate_id)->orderBy('name')->get();
    }

    public function loadStates()
    {
        if (!in_array($this->country_id, \AppConst::COUNTRY_REQUIRED_EXTRA_DATA)) return;
        $this->city_id = '';
        $this->states = CountryState::whereCountryId($this->country_id)->orderBy('name')->get();
    }

    public function loadZones()
    {
        if (!in_array($this->country_id, \AppConst::COUNTRY_REQUIRED_EXTRA_DATA)) return;
        $this->city_id = '';
        $this->zones = CountryStateZone::whereCountryStateId($this->state_id)->orderBy('name')->get();
    }

    public function loadCities()
    {
        if (!in_array($this->country_id, \AppConst::COUNTRY_REQUIRED_EXTRA_DATA)) return;
        $this->cities = Cities::whereStateId($this->state_id)->orderBy('city_name')->get();
    }

    public function cityChanged(){
//        $this->national_id = null;
//        $this->selected_school = null;
    }
    public function typeChanged(){
//        if (!empty($this->selected_school)) return;
//        $this->national_id = null;
//        $this->school_id = null;
//        $this->selected_school = null;
    }
    public function stateChanged(){
        $this->city_id = null;
//        $this->national_id = null;
//        $this->selected_school = null;
        $this->loadCities();
    }

    public function countryChanged(){
        $this->selected_school = null;
        $this->national_id = '';
        $this->state_id = '';
        $this->city_id  = '';
        $this->school_type_id = '';
        $this->loadStates();
        $this->dispatchBrowserEvent('reset-select2');
    }

    public function loadSchoolByNationalId(){
        $option_data = [
            'id' => null,
            'text' => null,
            'admin_exits' => false,
            'admin_data' => [],
        ];

        if (empty($this->national_id)) {
            if (!empty($this->selected_school)) {
                $this->dispatchBrowserEvent('load-options', $option_data);
                $this->school_id = '';
            }
            $this->selected_school = null;
            $this->dispatchBrowserEvent('show-select2');
            return;
        }
        $this->school_id =   School::whereNationalId($this->national_id)->whereCountryId($this->country_id)?->value('id');
        $this->loadSchool();

        if (!empty($this->selected_school)) {
            $admin = $this->selected_school?->schoolAdmins?->first();
            $option_data = [
                'id' => $this->selected_school?->id,
                'text' => $this->selected_school?->translated_name ?: $this->selected_school?->school_name,
                'admin_exits' => false,
                'admin_data' => [],
            ];
            if (!empty($admin)) {
                $option_data['admin_exits'] = true;
                $option_data['admin_data'] = [
                    'name' => $admin->name ?: $admin->userBio?->first_name,
                    'email' => $admin->email,
                ];

            }
            $this->dispatchBrowserEvent('load-options', $option_data);
            $this->dispatchBrowserEvent('hide-select2', $option_data);
        }else{
            $this->dispatchBrowserEvent('load-options', $option_data);
            $this->dispatchBrowserEvent('show-select2');
        }
    }



    public function render()
    {
//        $this->loadSchoolByNationalId();
        return view('livewire.auth.school-registartion-form');
    }

    public function loadSchooData($school_id){
        if (!empty($this->selected_school) && $school_id == $this->selected_school->id) {
            return;
        }
        $this->school_id = $school_id;
        $nid = School::whereId($this->school_id)?->value('national_id');
        if (!empty($nid)) {
            $this->national_id = $nid;
        }
    }

    public function loadSchool(){
        $this->selected_school = School::whereId($this->school_id)
            ->with(['schoolAdmins' => fn($q) =>
            $q->whereRelation('userRoles', 'role_id', \AppConst::SCHOOL_ADMINISTRATOR)
                ->orWhereRelation('userRoles', 'role_id', \AppConst::SCHOOL_COUNSELOR)->with('userBio')])
            ->first();
        $this->setSelectSchoolData();
    }

    public function setSelectSchoolData(){
        if (empty($this->selected_school)) {
//            $this->national_id = '';
            return;
        };
        if ($this->selected_school->country_id != $this->country_id){
            $this->country_id = $this->selected_school->country_id;
            $this->loadStates();
        }

        $this->state_id = $this->selected_school?->state_id;
        if (!empty($this->state_id)) {
            $this->loadCities();
        }
        $this->city_id = $this->selected_school?->city_id;
        $this->school_type_id = $this->selected_school?->school_type_id;
        $this->national_id = $this->selected_school?->national_id;
    }
}
