<?php

namespace App\Http\Livewire\UniversityFacilities;

use Livewire\Component;

class MainBuilding extends Component
{
    public $main_buildings = [];
    public $uni_main_buildings;


    public function mount()
    {
        $this->initForm();
    }

    public function initForm()
    {
        $university = \Auth::user()->selected_university;
        $this->uni_main_buildings = $university->mainBuilding()->firstOrCreate();
        $this->main_buildings = $this->uni_main_buildings->makeHidden(['id', 'description', 'university_id', 'created_at', 'updated_at', 'created_by_id'])->toArray();
    }

    public function rules()
    {
        return [
            'main_buildings' => ['array'],
            'main_buildings.*' => ['present'],
        ];
    }

    public function save()
    {
        $inputs = $this->validate()['main_buildings'];
        $inputs['created_by_id'] = \Auth::id();
        \Auth::user()->selected_university->mainBuilding()->update($inputs);
        $this->initForm();
        $this->emit('returnResponseModal',[
                'title'=>'Main Building Record Updated',
                'message'=>'Main building record has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        //session()->flash('status', 'Operation Successful!');
    }

    public function render()
    {
        return view('livewire.university-facilities.main-building');
    }
}
