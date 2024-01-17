<?php

namespace App\Http\Livewire\UniversityFacilities;

use App\Models\General\Language;
use App\Models\General\SportsName;
use App\Models\General\SportsType;
use App\Models\Multimedia\Media;
use App\Models\University\Facility\UniversityFacilityAthletic;
use Livewire\Component;
use App\Http\Controllers\Admin\University\Traits\TraitCommonMediaPages;
use Livewire\WithFileUploads;

class Sports extends Component 
{
    use TraitCommonMediaPages;
    use WithFileUploads;
    public $photos = [];
    public $facility_information = [];

    public $dataCollection;
    public $item_id;

    /**
     * @var UniversityFacilityAthletic $selected_item
     */
    public $selected_item;
    public $selected_images = [];

    public $names = [];
    public $descriptions = [];
    public $translations = [];
    public $languages;
    public $details_in_langs = 1;
    public $categories;
    public $sports;
    public $update_details = 0;
   // protected $queryString = ['item_id' => ['except' => '', 'as' => 'facility'], 'update_details' => ['except' => 0]];

    public $lang_key;
    public $Info;
    public $allSports;
    public $edit;
    public $edit_item;
    public $edit_details_in_langs;
    public $isModalOpen = false,
    $title = 'Sports Detail and Gallery
      ',
    $sub_title = 'Sports';
    

    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
        $this->categories = SportsType::orderBy('name')->get();
        $this->sports = SportsName::orderBy('name')->get();
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

        $this->facility_information = ['sports_type_id'=>'', 'sports_name_id'=>'','video_url'=>'','panorama_url'=>''];
        $this->names = [];
        $this->translations = [];
        $this->descriptions = [];
        $this->conatct_names = [];
        $this->details_in_langs = 1;
        $this->translations[] = 'en';
        $this->allSports = \Auth::user()->selected_university->facilityAthletics()->get();

        //dd($this->allSports);
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
            'facility_information' => ['array', 'required'],
            'facility_information.*' => ['present'],
            'facility_information.sports_type_id' => ['required'],
            'facility_information.sports_name_id' => ['required'],
        ];
    }

    public function save()
    {
        $this->validate();
        $data = ['title' => $this->names[0], 'translated_name' => [],
            'created_by_id' => \Auth::id(), 'description' => []];
        foreach ($this->translations as $key => $lang) {
            $data['description'][$lang] = $this->descriptions[$key];
            $data['translated_name'][$lang] = $this->names[$key];
        }
        $data = array_merge($data, $this->facility_information);
        if ($this->update_details == 1) {
            $this->selected_item->update($data);
             $this->emit('returnResponseModal',[
                'title'=>'Sport Record Updated',
                'message'=>'Sport record has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
            $this->closeModal();
        } else {
            \Auth::user()->selected_university->facilityAthletics()->create($data);
            $this->loadAlbums();
            $this->emit('returnResponseModal',[
                'title'=>'Sport Record Added',
                'message'=>'1 New Sport record has been added.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        }
        $this->update_details = 0;
        $this->loadAlbumData();
        $this->mount();
        //session()->flash('status', 'Operation Successful!');
    }

    public function edit()
    {
        if(!empty($this->selected_item)){
            $this->editSport($this->selected_item->id);
        }
        
    }
    public function editSport($id){

        $this->resetValidation();
        $this->update_details = 1;
        $this->edit = $this->allSports->where('id',$id)->first();
        $this->edit_item = $this->edit->only(['sports_type_id','sports_name_id','video_url','panorama_url']);
        $translations = $this->edit->getTranslations();
        $this->names = array_values($translations['translated_name']);
        $this->descriptions = array_values($translations['description']);
        $this->translations = array_keys($translations['translated_name']);
        $this->edit_details_in_langs = count($this->translations);
        $this->isModalOpen = true;
        //$this->emit('goToTop');

    }

    public function loadAlbums()
    {
        $this->dataCollection = \Auth::user()->selected_university->facilityAthletics()->orderBy('title')->get();
    }


    public function loadAlbumData()
    {
        $this->selected_item = UniversityFacilityAthletic::whereId($this->item_id)
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
        return view('livewire.university-facilities.sports');
    }

    public function update(){

        $this->facility_information = $this->edit_item;
        $this->selected_item = $this->edit;
        $this->save();

    }
    public function delete($id){

        $university = $this->allSports->where('id',$id)->first();
        if ($university) {
            $university->delete();
            
        }
        $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
            'message'=>'Sport has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->mount();
        
    }
}
