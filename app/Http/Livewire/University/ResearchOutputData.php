<?php

namespace App\Http\Livewire\University;
use App\Models\General\Language;


use Livewire\Component;

class ResearchOutputData extends Component
{
     public $languages , 
    $details_in_langs       = 1,
    $add_new_board_member   = 1,
    $add_new_location       = 1,
    $editorialAndAssociate,
    $addNewSubject          = 1,
    $addNewVolume           = 1,
    $journalDetailInNewLang = 1,
    $translations           = []; 
    

    public function mount()
    {
        $this->editorialAndAssociate = $this->setEditoralData();
        $this->languages = Language::orderBy('name')->get();
    }
    public function addDetailsInOtherLanguage()
    {
        //dd(1);
        ++$this->details_in_langs;
    }
    public function addNewLocation()
    {
        //dd(1);
        ++$this->add_new_board_member;
    }
    public function render()
    {
        return view('livewire.university.research-output-data');
    }
    public function setEditoralData(){

        return  [
            'editoral' => 'Editoral',
            'editor'   => 'Editor'
        ];
    }
    public function setAssosiateData(){

        return  [
            'editoral' => 'Assosiate',
            'editor'   => 'Assosiate'
        ];
    }
    public function addEditorBoard(){
        $this->editorialAndAssociate = $this->setEditoralData();
        ++$this->add_new_board_member;

    }
     public function addAssosiateBoard(){

        $this->editorialAndAssociate = $this->setAssosiateData();
        ++$this->add_new_board_member;

        
    }
    public function addNewSubject(){

        ++$this->addNewSubject;
    }
    public function addNewVolume(){

        ++$this->addNewVolume;
    }
     public function journalDetailInNewLang(){

        ++$this->journalDetailInNewLang;
    }
}
