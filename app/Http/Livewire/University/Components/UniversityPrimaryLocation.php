<?php

namespace App\Http\Livewire\University\Components;

use App\Models\General\Cities;
use App\Models\General\Countries;
use Livewire\Component;

class UniversityPrimaryLocation extends Component
{
    public $countries;
    public $cities;
    public $country_id;
    public $city_id;
    public $map_link;

    public function mount()
    {
        $this->countries = Countries::orderBy('country_name')->get(['id', 'country_name', 'translated_name']);
        $this->initForm();
        $this->loadCities();
    }

    public function initForm()
    {
        $university = \Auth::user()->selected_university;
        $this->country_id = $university->country_id;
        $this->city_id = $university->city_id;
        $this->map_link = $university->map_link;
        $this->loadCities();
    }

    public function loadCities()
    {
        $this->cities = [];
        if (empty($this->country_id)) return;
        $this->cities = Cities::whereCountryId($this->country_id)->orderBy('city_name')->get(['id', 'city_name', 'translated_name']);
    }

    public function rules()
    {
        return [
            'country_id' => ['required'],
            'city_id' => ['present'],
            'map_link' => ['present', 'string']
        ];
    }

    public function save()
    {
        $inputs = $this->validate();
        \Auth::user()->selected_university->update($inputs);
        session()->flash('status', 'Operation Successful!');
    }

    public function render()
    {
        return view('livewire.university.components.university-primary-location');
    }
}
