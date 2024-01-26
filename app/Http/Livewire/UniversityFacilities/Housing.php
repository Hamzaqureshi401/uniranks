<?php

namespace App\Http\Livewire\UniversityFacilities;

use App\Models\General\Language;
use App\Models\Multimedia\Media;
use App\Models\University\Facility\UniversityFacilityHousing;
use App\Models\University\Facility\UniversityFacilityLab;
use App\Models\University\UniversityHousingCategory;
use App\Models\University\UniversityHousingLocationType;
use App\Models\University\UniversityHousingServices;
use App\Models\University\UniversityLabCategory;
use Livewire\Component;
use App\Http\Controllers\Admin\University\Traits\TraitCommonMediaPages;
use Livewire\WithFileUploads;

class Housing extends Component
{
    use TraitCommonMediaPages;
    use WithFileUploads;
    public $photos = [];
    public $housing_information = [];
 
    public $dataCollection;
    public $item_id;

    /**
     * @var UniversityFacilityHousing $selected_item
     */
    public $selected_item;
    public $selected_images = [];

    public $selected_services = [];
    public $names = [];
    public $descriptions = [];
    public $translations = [];
    public $languages;
    public $details_in_langs = 1;
    public $categories;
    public $services;
    public $location_types;

    public $update_details = 0;
    // protected $queryString = ['item_id' => ['except' => '', 'as' => 'housing'], 'update_details' => ['except' => 0]];

    public $lang_key;
    public $Info;
    public $houses;
    public $edit;
    public $edit_item;
    public $edit_details_in_langs;
    public $isModalOpen = false,
    $title = 'Houses Detail and Gallery
      ',
    $sub_title = 'House';





    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
        $this->categories = UniversityHousingCategory::orderBy('name')->get();
        $this->services = UniversityHousingServices::orderBy('name')->get();
        $this->location_types = UniversityHousingLocationType::all();
        $this->loadAlbumData();
        $this->loadAlbums();
        $this->initForm();
    }

    public function initForm()
    {
        if ($this->update_details == 1) {
            $this->edit();
            return;
        }

        $this->houses = UniversityFacilityHousing::get();

        //dd($this->houses);

        $this->housing_information = [
            'charges'=>'',
            'category_id'=>'',
            'location_type_id'=>'',
            'location_link'=>'',
            'number_of_rooms'=>'',
            'student_capacity'=>'',
            'charges_type'=>'',
            'video_url'=>'','panorama_url'=>'',
        ];
        $this->selected_services = [];
        $this->names = [];
        $this->translations = [];
        $this->descriptions = [];
        $this->details_in_langs = 1;
        $this->translations[] = 'en';
    }

    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }

    protected function rules()
    {
        return [
            'names' => ['array', 'required', 'min:1'],
            'translations' => ['array', 'required', 'min:1'],
            'descriptions' => ['array', 'required', 'min:1'],
            'housing_information' => ['array', 'required'],
            'housing_information.*' => ['present'],
            'selected_services' => ['array', 'required', 'min:1'],
        ];
    }

    public function save()
    {
        $this->validate();
        $data = ['university_id'=>\Auth::user()->selected_university->id,
            'name' => $this->names[0], 'translated_name' => [],
            'created_by_id' => \Auth::id(), 'description' => [],
            'currency_id'=>\Auth::user()->preferences->currency_id
        ];
        foreach ($this->translations as $key => $lang) {
            $data['description'][$lang] = $this->descriptions[$key];
            $data['translated_name'][$lang] = $this->names[$key];
        }
        $data = array_merge($data, $this->housing_information);
        if ($this->update_details == 1) {
            $this->selected_item->update($data);
            $this->selected_item->universityHousingServices()->sync($this->selected_services);
            $this->emit('returnResponseModal',[
                'title'=>'Housing Record Updated',
                'message'=>'Housing record has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
            $this->closeModal();
        } else {
            $housing = UniversityFacilityHousing::create($data);
            $housing->universityHousingServices()->sync($this->selected_services);
            $this->loadAlbums();
             $this->emit('returnResponseModal',[
                'title'=>'Housing Record Added',
                'message'=>'1 New housing record has been added.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        }
        $this->update_details = 0;
        $this->loadAlbumData();
        $this->mount();
        $this->emit('onAlbumCreated');
        //session()->flash('status', 'Operation Successful!');
    }

    public function edit()
    {
        if(!empty($this->selected_item)){
            $this->editHouse($this->selected_item->id);
        }
        
        // $this->update_details = 1;
        // $this->lab_information = $this->selected_item->only(['university_lab_category_id', 'student_capacity', 'size', 'created_date', 'no_labs','video_url','panorama_url']);
        // $translations = $this->selected_item->getTranslations();
        // $this->names = array_values($translations['translated_name']);
        // $this->descriptions = array_values($translations['description']);
        // $this->translations = array_keys($translations['translated_name']);
        // $this->details_in_langs = count($this->translations);
        // $this->emit('goToTop');
    }

    public function editHouse($id)
    {
        $this->resetValidation();
        $this->update_details = 1;
        $this->edit = $this->houses->where('id',$id)->first();
        
        $this->edit_item = $this->edit->only([
            'charges',
            'category_id',
            'location_type_id',
            'location_link',
            'number_of_rooms',
            'student_capacity',
            'charges_type',
            'video_url','panorama_url']);
        $translations = $this->edit->getTranslations();
        $this->names = array_values($translations['translated_name']);
        $this->descriptions = array_values($translations['description']);
        $this->translations = array_keys($translations['translated_name']);
        $this->edit_details_in_langs = count($this->translations);
        $this->selected_services = $this->edit->housingServices()->pluck('service_id')?->toArray() ?? [];
        $this->isModalOpen = true;

        //$this->emit('goToTop');
    }

    public function loadAlbums()
    {
        $this->dataCollection = \Auth::user()->selected_university->facilityHousings()->orderBy('name')->get();
    }


    public function loadAlbumData()
    {
        $this->selected_item = UniversityFacilityHousing::whereId($this->item_id)
            ->with('media', 'createdBy')->first();
        $this->getInfo();
    }

    public function deleteTemp($key)
    {

        $this->photos[$key] = null;
        unset($this->photos[$key]);
        sort($this->photos);
        $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
                'message'=>'Photo has been deleted.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
        ]);
    }

    public function savePhotos()
    {
        $images = [];
        foreach ($this->photos as $photo) {
            $path = $photo->storePublicly('images/university-photos', 's3');
            $images [] = ['media_type' => Media::TYPE_IMAGE, 'url' => $path, 'created_by' => \Auth::id()];
        }
        $this->selected_item->media()->createMany($images);
        $this->selected_item->refresh();
        $this->photos = [];
        $this->emit('returnResponseModal',[
                'title'=>'Photo Added',
                'message'=>'1 New photo has been added.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
        ]);
        $this->mount();
    }

    public function deleteSelected()
    {
        Media::whereIn('id', $this->selected_images)->delete();
        $this->selected_item->refresh();
        $this->selected_images = [];
        $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
            'message'=>'Selected record has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
    }

    public function disable()
    {
        $this->selected_item->update(['status' => \AppConst::DISABLED]);
        $this->selected_item->refresh();
        $this->emit('returnResponseModal',[
            'title'=>'Album Disabled',
            'message'=>'Album has been disabled.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
    }

    public function enable()
    {
        $this->selected_item->update(['status' => \AppConst::ENABLED]);
        $this->selected_item->refresh();
        $this->emit('returnResponseModal',[
            'title'=>'Album Enabled',
            'message'=>'Album has been enabled.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
    }

    public function deleteAlbum()
    {
        $this->delete($this->selected_item->id);
        // $this->selected_item->delete();
        // $this->selected_item = null;
        // $this->item_id = "";
        // $this->loadAlbums();
        // $this->emit('returnResponseModal',[
        //     'title'=>'Record Deleted',
        //     'message'=>'Album has been deleted.',
        //     'btn'=>'Oky',
        //     'link'=>null,
        //     'viewTitle' => null
        // ]);
    }
    public function render()
    {
        return view('livewire.university-facilities.housing');
    }

     public function update(){

        $this->housing_information = $this->edit_item;
        $this->selected_item = $this->edit;
        $this->save();

    }
    public function delete($id){

        $university = $this->houses->where('id',$id)->first();
        if ($university) {
            $university->delete();
            
        }
        $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
            'message'=>'House has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->mount();
        
    }
}
