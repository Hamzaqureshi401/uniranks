<?php

namespace App\Http\Livewire\UniversityFacilities;

use App\Models\General\Language;
use App\Models\Multimedia\Media;
use App\Models\University\Facility\UniversityFacilityLab;
use App\Models\University\Facility\UniversityFacilityStudentSupport;
use App\Models\University\UniversityLabCategory;
use App\Models\University\UniversitySupportOfficeType;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentSupport extends Component
{
    use WithFileUploads;
    public $photos = [];
    public $support_information = [];

    public $dataCollection;
    public $item_id;

    /**
     * @var UniversityFacilityStudentSupport $selected_item
     */
    public $selected_item;
    public $selected_images = [];

    public $names = [];
    public $descriptions = [];
    public $contact_names = [];
    public $translations = [];
    public $languages;
    public $details_in_langs = 1;
    public $categories;
    public $update_details = 0;
    protected $queryString = ['item_id' => ['except' => '', 'as' => 'support'], 'update_details' => ['except' => 0]];

    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
        $this->categories = UniversitySupportOfficeType::orderBy('name')->get();
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

        $this->support_information = ['office_type_id','contact_email','video_url','panorama_url'];
        $this->names = [];
        $this->translations = [];
        $this->descriptions = [];
        $this->conatct_names = [];
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
            'contact_names' => ['array', 'required', 'min:1'],
            'translations' => ['array', 'required', 'min:1'],
            'descriptions' => ['array', 'required', 'min:1'],
            'support_information' => ['array', 'required'],
            'support_information.*' => ['present'],
            'support_information.contact_email' => ['required','email'],
            'support_information.office_type_id' => ['required'],
        ];
    }

    public function save()
    {
        $this->validate();
        $data = ['title' => $this->names[0],'contact_name' => $this->contact_names[0], 'translated_name' => [],'translated_contact_name'=>[],
            'created_by_id' => \Auth::id(), 'description' => []];
        foreach ($this->translations as $key => $lang) {
            $data['description'][$lang] = $this->descriptions[$key];
            $data['translated_name'][$lang] = $this->names[$key];
            $data['translated_contact_name'][$lang] = $this->contact_names[$key];
        }
        $data = array_merge($data, $this->support_information);
        if ($this->update_details == 1) {
            $this->selected_item->update($data);
            $this->emit('returnResponseModal',[
                'title'=>'Student Support Record Updated',
                'message'=>'Student Support record has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        } else {
            \Auth::user()->selected_university->facilityStudentSupports()->create($data);
            $this->emit('returnResponseModal',[
                'title'=>'Student Support Record Added',
                'message'=>'1 New Student Support record has been added.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
            $this->loadAlbums();
        }
        $this->update_details = 0;
        $this->loadAlbumData();
        $this->initForm();
        //session()->flash('status', 'Operation Successful!');
    }

    public function edit()
    {
        $this->update_details = 1;
        $this->support_information = $this->selected_item->only(['office_type_id','contact_email','video_url','panorama_url']);
        $translations = $this->selected_item->getTranslations();
        $this->names = array_values($translations['translated_name']);
        $this->descriptions = array_values($translations['description']);
        $this->contact_names = array_values($translations['translated_contact_name']);
        $this->translations = array_keys($translations['translated_name']);
        $this->details_in_langs = count($this->translations);
        $this->emit('goToTop');
    }

    public function loadAlbums()
    {
        $this->dataCollection = \Auth::user()->selected_university->facilityStudentSupports()->orderBy('title')->get();
    }


    public function loadAlbumData()
    {
        $this->selected_item = UniversityFacilityStudentSupport::whereId($this->item_id)
            ->with('media', 'createdBy')->first();
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
        return view('livewire.university-facilities.student-support');
    }
}
