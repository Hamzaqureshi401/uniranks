<?php

namespace App\Http\Livewire\Media;

use App\Models\General\Language;
use App\Models\Multimedia\Media;
use App\Models\Multimedia\MediaAlbum;
use Livewire\Component;

class UniversityPanoramaAlbums extends Component
{
    public $languages;
    public $language_id;
    public $title;
    public $url;

    public $albums;
    public $album_id;

    /**
     * @var MediaAlbum $selected_album
     */
    public $selected_album;

    protected $queryString = ['album_id'=>['except'=>'']];
    protected $listeners = ['onAlbumCreated'=>'loadAlbums'];
    public function mount(){
        $this->languages = Language::orderBy('name')->get();
        $this->initForm();
        $this->loadAlbums();
        $this->loadAlbumData();
    }

    public function initForm(){
        $this->title = '';
        $this->language_id = Language::whereCode('en')->value('id');
        $this->url = '';
    }

    protected function rules(){
        return [
            'title'=>['required'],
            'language_id'=>['required'],
            'url'=>['required'],
        ];
    }
    public function save(){
        $inputs = $this->validate();
        $inputs['media_type']= Media::TYPE_PENORAMA;
        $inputs['created_by']= \Auth::id();
        $this->selected_album->media()->create($inputs);
        $this->selected_album->refresh();
        $this->initForm();
         $this->emit('returnResponseModal',[
        'title'=>'Panorama Added',
            'message'=>'Panorama has been Added.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        //session()->flash('status', 'Operation Successful!');
    }

    public function loadAlbums()
    {
        $this->albums = \Auth::user()->selected_university->mediaAlbums()->whereContentTypePanorama()->orderBy('title')->get();
    }

    public function loadAlbumData()
    {
        $this->selected_album = MediaAlbum::whereId($this->album_id)->with('media.language')->first();
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
    }
    public function deleteMedia(Media $media){
        $media->delete();
        $this->initForm();
        $this->emit('returnResponseModal',[
            'title'=>'Penorama Deleted',
            'message'=>'Penorama has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
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
    }
    public function render()
    {
        return view('livewire.media.university-panorama-albums');
    }
}
