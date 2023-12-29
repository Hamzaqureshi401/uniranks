<?php

namespace App\Http\Livewire\Media;

use App\Models\General\Language;
use App\Models\Multimedia\Media;
use Livewire\Component;

class CreateMediaAlbumForm extends Component
{

    public $names = [];
    public $details = [];
    public $translations = [];
    public $languages;
    public $details_in_langs = 1;
    public $contentType;


    public function mount(){
        $this->languages = Language::orderBy('name')->get();
        $this->initForm();
    }

    public function initForm(){
        
        $this->names = [];
        $this->translations = [];
        $this->details = [];
        $this->details_in_langs = 1;
        $this->translations[] = 'en';
    }

    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }

    protected function rules(){
        return [
            'names'=>['array','required', 'min:1'],
            'translations'=>['array','required', 'min:1'],
            'details'=>[],
        ];
    }

    public function save(){
        $this->validate();
        $data = ['title'=>[],'created_by'=>\Auth::id(),'description'=>[],'content_type'=>$this->contentType];
        foreach ($this->translations as $key=>$lang){
            if (!empty($this->details[$key])) {
                $data['description'][$lang] = $this->details[$key];
            }
            $data['title'][$lang] = $this->names[$key];
        }
        \Auth::user()->selected_university->mediaAlbums()->create($data);
        $this->initForm();
        $this->emit('onAlbumCreated');
        $this->emit('returnResponseModal',[
        'title'=>'Add Media Album',
            'message'=>'1 New Media Album has been added.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        //session()->flash('status', 'Operation Successful!');
    }


    public function render()
    {
        return view('livewire.media.create-media-album-form');
    }
}
