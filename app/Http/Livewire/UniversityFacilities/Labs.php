<?php

namespace App\Http\Livewire\UniversityFacilities;

use App\Models\General\Language;
use App\Models\Multimedia\Media;
use App\Models\University\Facility\UniversityFacilityLab;
use App\Models\University\UniversityLabCategory;
use Carbon\Carbon;
use Livewire\Component;
use App\Http\Controllers\Admin\University\Traits\TraitCommonMediaPages;
use Livewire\WithFileUploads;

class Labs extends Component
{
    use TraitCommonMediaPages;
    use WithFileUploads;
    public $photos = [];
    public $lab_information = [];
    public $labs;

    public $dataCollection;
    public $item_id;
    public $lang_key;
    public $edit;
    public $edit_item;
    public $edit_details_in_langs;
    public $isModalOpen = false;


    /**
     * @var UniversityFacilityLab $selected_item
     */
    public $selected_item;
    public $selected_images = [];
    public $translated_description;

    public $names = [];
    public $descriptions = [];
    public $translations = [];
    public $languages;
    public $details_in_langs = 1;
    public $categories;
    public $update_details = 0;
    // protected $queryString = ['item_id' => ['except' => '', 'as' => 'lab'], 'update_details' => ['except' => 0]];

    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
        $this->categories = UniversityLabCategory::orderBy('name')->get();
        $this->loadAlbumData();
        $this->loadAlbums();
        $this->initForm();
    }

    public function initForm()
    {
        $this->labs = \Auth::user()->selected_university->facilityLabs()->get();

        if ($this->update_details == 1) {
            $this->edit();
            return;
        }
        if(empty($this->lab_information)){
             $this->lab_information = ['university_lab_category_id' => '', 'student_capacity' => '', 'size' => '',
            'created_date' => '', 'no_labs' => '','video_url'=>'','panorama_url'=>''];
        }
        $this->names = [];
        $this->translations = [];
        $this->descriptions = [];
        $this->details_in_langs = 1;
        $this->translations[] = 'en';
        
        //dd($this->labs);
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
            'lab_information' => ['array', 'required'],
            'lab_information.*' => ['present'],
            'lab_information.student_capacity' => ['required'],
            'lab_information.size' => ['required'],
            'lab_information.created_date' => ['required'],
        ];
    }

    public function save()
    {
        $this->validate();
        $data = ['name' => $this->names[0], 'translated_name' => [], 'created_by_id' => \Auth::id(), 'description' => []];

        //dd($data , $this->translations , $this->selected_item , $this->edit_item);

       foreach ($this->translations as $key => $lang) {
            // Check if the key exists in $this->descriptions and $this->names
            if(isset($this->descriptions[$key])){
                $data['description'][$lang] = $this->descriptions[$key];
            }
            if(isset($this->names[$key])){
                $data['translated_name'][$lang] = $this->names[$key];
            }
        }
        if(!empty($this->lab_information['image_s'][0])){
            $data['image'] = $this->lab_information['image_s'][0]->storePublicly('images/university-photos', 's3');   
        }
        if(!empty($data)){
            $data = array_merge($data, $this->lab_information);
        }else{
            $data = $this->lab_information;
        }
        
        //dd($data);
        if (!empty($this->edit_item)  || !empty($this->selected_item)) {
            if(!empty($this->selected_item)){
                $this->selected_item->update($data);
            }else{
                $this->edit->update($data);
            }
            $this->edit_item = null;
            $this->edit = null;
            $this->edit_item = null;
            $this->lab_information = null;
            $this->closeModal();

            $this->emit('returnResponseModal',[
                'title'=>'Lab Record Updated',
                'message'=>'Lab record has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        } else {
            //dd($data);
            \Auth::user()->selected_university->facilityLabs()->create($data);
            $this->emit('returnResponseModal',[
                'title'=>'Lab Record Added',
                'message'=>'1 New Lab record has been added.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        }
        $this->update_details = 0;
        //$this->loadAlbumData();
        $this->initForm();
        //$this->emit('onAlbumCreated');
        //session()->flash('status', 'Operation Successful!');
    }

    public function edit()
    {
        if(!empty($this->selected_item)){
            $this->editLab($this->selected_item->id);
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

    public function editLab($id)
    {
     
        $this->update_details = 1;
        //dd($this->selected_item->getTranslations()['translated_name']);
        if(!empty($id) && !empty($this->labs)){

            $this->edit = $this->labs->where('id',$id)->first();
        $this->edit_item = $this->edit->only(['university_lab_category_id', 'student_capacity', 'size', 'created_date', 'no_labs','video_url','panorama_url']);
        $this->edit_item['created_date'] = Carbon::parse($this->edit_item['created_date'])->toDateString();

        $translations = $this->edit->getTranslations();
        $this->names = array_values($translations['translated_name']);
        $this->descriptions = array_values($translations['description']);
        $this->translations = array_keys($translations['translated_name']);
        $this->edit_details_in_langs = count($this->translations);
        $this->isModalOpen = true;
        $this->emit('setDate');
        }
        

        //$this->emit('goToTop');
    }

    

    public function openModalConfirmModal()
    {
        $this->isModalOpen = true;
    }

    public function loadAlbums()
    {
        $this->dataCollection = \Auth::user()->selected_university->facilityLabs()->orderBy('name')->get();
    }


    public function loadAlbumData()
    {
        $this->selected_item = UniversityFacilityLab::whereId($this->item_id)
            ->with('media', 'createdBy')->first();
        //     if(!empty($this->selected_item)){
        // $this->update_details = 1;
        // $this->lab_information = $this->selected_item->only(['university_lab_category_id', 'student_capacity', 'size', 'created_date', 'no_labs','video_url','panorama_url']);
        // $translations = $this->selected_item->getTranslations();
        // $this->names = array_values($translations['translated_name']);
        // $this->descriptions = array_values($translations['description']);
        // $this->translations = array_keys($translations['translated_name']);
        // $this->details_in_langs = count($this->translations);
        // $this->emit('goToTop');
        //     }
            
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

    public function delete($id){

        $university = $this->labs->where('id',$id)->first();
        if ($university) {
            $university->delete();
            
        }
        $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
            'message'=>'Lab has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->initForm();
        
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
    public function update(){

        $this->lab_information = $this->edit_item;
        $old = $this->selected_item;
        $this->selected_item = null;
        $this->save();
        //$this->selected_item = $old;
        

    }
    public function render()
    {
        return view('livewire.university-facilities.labs');
    }
}
