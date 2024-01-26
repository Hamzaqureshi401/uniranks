<?php

namespace App\Http\Livewire\Media;

use App\Models\General\Language;
use App\Models\Multimedia\Media;
use App\Models\Multimedia\MediaAlbum;
use Livewire\Component;
use App\Http\Controllers\Admin\University\Traits\TraitCommonMediaPages;
use Livewire\WithFileUploads;

class UniversityPhotoAlbums extends Component
{
    use TraitCommonMediaPages;
    use WithFileUploads;
    public $photos = [];

    public $albums;
    public $album_id;

    /**
     * @var MediaAlbum $selected_album
     */
    public $selected_album;
    public $selected_images = [];

    // protected $queryString = ['album_id'=>['except'=>'']];
    // protected $listeners = ['onAlbumCreated'=>'loadAlbums'];

    public $names = [];
    public $description = [];
    public $translations = [];
    public $details_in_langs = 1;
    public $contentType;

    public $languages;
    public $selected_item;
    public $item_id;
    public $dataCollection;
    public $lang_key;
    public $Info;
    public $labs;
    public $edit;
    public $edit_item;
    public $edit_details_in_langs;
    public $isModalOpen = false,
    $title = 'Upload Materials to Albums
      ',
    $sub_title = 'Photos';



    public function mount()
    {
        $this->languages = Language::orderBy('name')->get();
        $this->loadAlbums();
        $this->loadAlbumData();
    }

    public function initForm(){
        
    }

    public function render()
    {
        return view('livewire.media.university-photo-albums');
    }

    public function loadAlbums()
    {
        $this->albums = \Auth::user()->selected_university->mediaAlbums()->whereContentTypeImages()->orderBy('title')->get();
        $this->dataCollection = $this->albums;
    }

    public function loadAlbumData()
    {
        
        $this->selected_album = MediaAlbum::whereId($this->item_id)->with('media')->first();
        $this->selected_item = $this->selected_album;

        //dd($this->selected_item);


    }

    public function deleteTemp($key){

        $this->photos[$key] = null;
       unset($this->photos[$key]);
        sort($this->photos);
    }

    public function savePhotos(){
        $images = [];
        foreach ($this->photos as $photo){
           $path=$photo->storePublicly('images/university-photos', 's3');
           $images [] = [ 'media_type'=>Media::TYPE_IMAGE, 'url'=>$path, 'created_by'=>\Auth::id()];
        }
        $this->selected_album->media()->createMany($images);
        $this->selected_album->refresh();
        $this->photos = [];
        $this->emit('returnResponseModal',[
        'title'=>'Photo Added',
            'message'=>'Photos has been Added.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->mount();

    }

    public function deleteSelected(){
        Media::whereIn('id',$this->selected_images)->get()->each(fn(Media $media)=>$media->delete());
        $this->selected_album->refresh();
        $this->selected_images= [];
        $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
            'message'=>'Selected record has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->mount();

    }

    public function disable(){
        $this->selected_album->update(['status'=>\AppConst::DISABLED]);
        $this->selected_album->refresh();
        $this->emit('returnResponseModal',[
            'title'=>'Album Disabled',
            'message'=>'Album has been disabled.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->mount();
    }
    public function enable(){
        $this->selected_album->update(['status'=>\AppConst::ENABLED]);
        $this->selected_album->refresh();
        $this->emit('returnResponseModal',[
            'title'=>'Album Enabled',
            'message'=>'Album has been enabled.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->mount();

    }

    public function deleteAlbum(){
        $this->selected_album->delete();
        $this->selected_album = null;
        $this->album_id = "";
        $this->loadAlbums();
        $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
            'message'=>'Album has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->mount();

    }

    public function edit()
    {
        if(!empty($this->selected_item)){
            $this->editGallery($this->selected_item->id);
        }
    }

    public function editGallery($id){

        $this->resetValidation();
        $this->update_details = 1;
        $this->edit = $this->albums->where('id',$id)->first();
        // $this->edit_item = $this->edit->only(['university_lab_category_id', 'student_capacity', 'size', 'created_date', 'no_labs','video_url','panorama_url']);
        // $this->edit_item['created_date'] = Carbon::parse($this->edit_item['created_date'])->format('Y-m-d');
        $translations = $this->edit->getTranslations();
        $this->names = array_values($translations['title']);
        $this->description = array_values($translations['description']);
        $this->translations = array_keys($translations['title']);
        $this->details_in_langs = count($this->translations);
        $this->isModalOpen = true;
        //$this->emit('goToTop');

    }
    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }
    protected function rules(){
        return [
            'names'=>['array','required', 'min:1'],
            'names.*' => 'required|string', // Validate each name in the array
            'translations'=>['array','required', 'min:1'],
            'description'=>[],
        ];
    }

    public function updateGallery()
    {
        $this->validate(); // You can reuse the validation rules defined in the `rules` method

        $gallery = $this->edit;

        // $data = [
        //     'title' => [],
        //     'created_by' => \Auth::id(),
        //     'description' => [],
        //     'content_type' => $this->contentType,
        // ];

        foreach ($this->translations as $key => $lang) {
            if (!empty($this->description[$key])) {
                $data['description'][$lang] = $this->description[$key];
            }
            $data['title'][$lang] = $this->names[$key];
        }

        $gallery->update($data);

        $this->mount();
        $this->emit('onAlbumUpdated');
        $this->closeModal();
        $this->emit('returnResponseModal', [
            'title' => 'Update Media Album',
            'message' => 'Media Album has been updated successfully.',
            'btn' => 'Okay',
            'link' => null,
            'viewTitle' => null,
        ]);
    }

    public function delete($id){

        $university = $this->albums->where('id',$id)->first();
        if ($university) {
            $university->delete();
            
        }
        $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
            'message'=>'Album has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->selected_item = '';
        $this->mount();
        
    }

}
