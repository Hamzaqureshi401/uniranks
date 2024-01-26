<?php

namespace App\Http\Livewire\UniversityFacilities;

use App\Models\General\Language;
use App\Models\General\VehicleType;
use App\Models\Multimedia\Media;
use App\Models\University\Facility\UniversityFacilityTransportation;
use App\Models\University\Facility\UniversityTransportStop;
use App\Models\University\UniversityTransportType;
use Livewire\Component;
use Livewire\WithFileUploads;

class Transport extends Component
{
    use WithFileUploads;

    public $photos = [];
    public $facility_information = [];

    public $dataCollection;
    public $item_id;

    /**
     * @var UniversityFacilityTransportation $selected_item
     */
    public $selected_item;
    public $selected_images = [];

    public $names = [];
    public $descriptions = [];
    public $translations = [];
    public $languages;
    public $details_in_langs = 1;
    public $categories;
    public $vehicle_types;
    public $update_details = 0;
    protected $queryString = ['item_id' => ['except' => '', 'as' => 'facility'], 'update_details' => ['except' => 0]];
    protected $listeners = ['stopUpdated'=>'loadAlbumData'];

    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
        $this->categories = UniversityTransportType::orderBy('name')->get();
        $this->vehicle_types = VehicleType::orderBy('name')->get();
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

        $this->facility_information = ['transport_type_id' => '', 'vehicle_type_id' => '', 'gender_based' => 0, 'wifi_available' => 0, 'video_url' => '', 'panorama_url' => ''];
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
            'facility_information' => ['array', 'required'],
            'facility_information.*' => ['present'],
            'facility_information.transport_type_id' => ['required'],
            'facility_information.vehicle_type_id' => ['required'],
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
            $this->emit('transport-updated');
            $this->emit('returnResponseModal',[
                'title'=>'Transport Record Updated',
                'message'=>'Transport record has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        } else {
            \Auth::user()->selected_university->facilityTransportations()->create($data);
            $this->loadAlbums();
            $this->emit('returnResponseModal',[
                'title'=>'Transport Record Added',
                'message'=>'1 New transport record has been added.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        }
        $this->update_details = 0;
        $this->loadAlbumData();
        $this->initForm();
        //session()->flash('status', 'Operation Successful!');
    }

    public function edit()
    {
        $this->update_details = 1;
        $this->facility_information = $this->selected_item->only(['transport_type_id', 'vehicle_type_id', 'gender_based', 'wifi_available', 'video_url', 'panorama_url']);
        $translations = $this->selected_item->getTranslations();
        $this->names = array_values($translations['translated_name']);
        $this->descriptions = array_values($translations['description']);
        $this->translations = array_keys($translations['translated_name']);
        $this->details_in_langs = count($this->translations);
        $this->emit('goToTop');
    }

    public function loadAlbums()
    {
        $this->dataCollection = \Auth::user()->selected_university->facilityTransportations()->orderBy('title')->get();
    }


    public function loadAlbumData()
    {
        $this->selected_item = UniversityFacilityTransportation::whereId($this->item_id)
            ->with('media','stops.times', 'createdBy')->first();
    }

    public function deleteStop(UniversityTransportStop $stop){
        $stop->times()?->delete();
        $stop->delete();
        $this->selected_item->refresh();
        $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
            'message'=>'Transport stop has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
    }

    public function editStop($stop_id){
        $this->emit('editStop',$stop_id);
        $this->emit('goToTop');
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
        $this->selected_item->delete();
        $this->selected_item = null;
        $this->item_id = "";
        $this->loadAlbums();
        $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
            'message'=>'Album has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
    }


    public function render()
    {
        return view('livewire.university-facilities.transport');
    }
}
