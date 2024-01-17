<?php

namespace App\Http\Livewire\UniversityFacilities;

use Livewire\Component;

class MainBuilding extends Component
{
    public $main_buildings = [];
    public $uni_main_buildings;
    public $edit_item;
    public $isModalOpen = false;



    public function mount()
    {
        $this->initForm();
    }

    public function initForm()
    {
        $university = \Auth::user()->selected_university;
        $this->uni_main_buildings = $university->mainBuilding()->firstOrCreate();
        $this->edit_item = $this->uni_main_buildings->makeHidden(['description', 'university_id', 'created_at', 'updated_at', 'created_by_id'])->toArray();
        $this->main_buildings = $this->edit_item;
    }

    public function rules()
    {
        return [
            'main_buildings' => ['array'],
            'main_buildings.*' => ['present'],
            // 'main_buildings.no_building' => ['required'],
            // 'main_buildings.no_collage_buildings' => ['required'],
            // 'main_buildings.total_land_area' => ['required'],
            // 'main_buildings.no_schools' => ['required'],
            // 'main_buildings.no_campuses' => ['required'],
            // 'main_buildings.no_libraries' => ['required'],
            // 'main_buildings.no_labs' => ['required'],
            // 'main_buildings.no_classrooms' => ['required'],
            // 'main_buildings.no_auditoriums' => ['required'],
        ];
    }

   public function save()
{
    $inputs = $this->validate()['main_buildings'];

      foreach (['no_building', 'no_collage_buildings', 'no_campuses', 'no_schools', 'no_libraries', 'total_land_area', 'area_unit_id', 'no_labs', 'no_classrooms' , 'no_auditoriums'] as $field) {
        $inputs[$field] = $inputs[$field] ?? 0;

        // If the field is empty, set it to null (assuming it's nullable)
        if ($inputs[$field] === '') {
            $inputs[$field] = 0;
        }
    }

    $inputs['created_by_id'] = \Auth::id();
    \Auth::user()->selected_university->mainBuilding()->update($inputs);
    $this->initForm();
    $this->emit('returnResponseModal', [
        'title' => 'Main Building Record Updated',
        'message' => 'Main building record has been updated.',
        'btn' => 'Oky',
        'link' => null,
        'viewTitle' => null
    ]);
    $this->isModalOpen = false;
}


    public function edit(){
        $this->resetValidation();
        $this->isModalOpen = true;
    }

    public function render()
    {
        return view('livewire.university-facilities.main-building');
    }

     public function update(){

        $this->main_buildings = $this->edit_item;
        $this->save();
        $this->main_buildings = '';

    }
}
