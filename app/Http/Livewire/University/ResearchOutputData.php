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
    public $editorialData = [];
    public $associateData = [];
    public $add_new_editor = 0; // Counter for new editor boards
    public $add_new_associate = 0; // Counter for new associate boards

    

    public function mount()
    {
        $this->editorialAndAssociate = $this->setEditorialData();
        $this->languages = Language::orderBy('name')->get();
    }
    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }
    public function addNewLocation()
    {
        ++$this->add_new_board_member;
    }
    public function render()
    {
        return view('livewire.university.research-output-data');
    } 
    public function setEditorialData()
    {
        return [
            'editoral' => 'Editorial',
            'editor' => 'Editor',
        ];
    }

    public function setAssociateData()
    {
        return [
            'editoral' => 'Associate',
            'editor' => 'Associate',
        ];
    }

    public function addEditorBoard()
    {
        $this->editorialData[] = $this->setEditorialData();
        ++$this->add_new_editor;
    }

    public function addAssociateBoard()
    {
        $this->associateData[] = $this->setAssociateData();
        ++$this->add_new_associate;
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
     public function rules()
    {
        return [
            'research'                         => ['array'],
            'research.*'                       => ['present'],
            'research.jol_type'       => ['required','min:1'],
            'research.jol_title'                   => ['required','min:1'],
            'research.en_fl_category'             => ['required','min:1'],
            'research.jol_url'                   => ['required','min:1'],
            'research.online_issn'            => ['required','min:1'],
            'research.print_issn'        => ['required','min:1'],
            'research.electronic_submission_url'      => ['required','min:1'],
            'research.jol_main_lang'     => ['required','min:1'],
            'research.first_published_year'            => ['required','min:1'],
            'research.access_open_reader'          => ['required','min:1'],
            'research.access_open_reader'           => ['required','min:1'],
            'research.fee_reader'                   => ['required','min:1'],
            'research.access_open_auther'                => ['required','min:1'],
            'research.access_open_auther'                  => ['required','min:1'],
            'research.fee_auther'                 => ['required','min:1'],
            'research.jol_fee_reader'              => ['required','min:1'],
            'research.jol_fee_auther'                   => ['required','min:1'],
            'research.call_for_prepare_start_date'                => ['required','min:1'],
            'research.call_for_prepare_end_date'                  => ['required','min:1'],
            'research.business_jol_list'                 => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            'research.department'              => ['required','min:1'],
            
            //'academic_name_eng' => ['required','min:1'],
            // 'quick_view.*' => ['present'],
            // 'quick_view.founded_year' => ['integer', 'max:' . date('Y')],
            // 'quick_view.no_alumni'=> ['integer','nullable'],
            // 'quick_view.no_students'=> ['integer','nullable'],
            // 'quick_view.no_schools'=> ['integer','nullable'],
            // 'quick_view.no_majors'=> ['integer','nullable'],
            // 'quick_view.no_research'=> ['integer','nullable'],
            // 'university_languages' => ['required', 'array', 'min:1'],
        ];
    }
}
