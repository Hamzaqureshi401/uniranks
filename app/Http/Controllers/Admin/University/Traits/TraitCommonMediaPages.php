<?php

namespace App\Http\Controllers\Admin\University\Traits;

trait TraitCommonMediaPages
{
    public function commonMediaMethod()
    {
        // Your trait method implementation
    }

    public function loaddescription()
    {
        if (!empty($this->lang_key)) {
            $translations = $this->selected_item->getTranslations();

            // Check if the 'description' key exists in the translations array
            if (isset($translations['description'][$this->lang_key])) {
                $this->translated_description = $translations['description'][$this->lang_key];
            } else {
                // Set a default value or handle the case where the key is not present
                $this->translated_description = 'Default Description';
            }
        } else {
            $this->translated_description = null;
        }
    

    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function addEditDetailsInOtherLanguage(){

        ++$this->edit_details_in_langs;
    }


    public function getInfo(){

    if(!empty($this->selected_item)){


    if($this->sub_title == 'House'){

        $this->Info = ('The') . ' ' . $this->selected_item['name'] . ' (' . ('Category') . ': ' . $this->selected_item->housingCategory->name . ') ' .
    ('consists of') . ' ' . $this->selected_item['number_of_rooms'] . ' ' . ('rooms, each with a capacity of') . ' ' . $this->selected_item['student_capacity'] . ' ' .
    ('students. The housing unit is located in') . ' ' . $this->selected_item->housingLocation->name .'.';
    }elseif ($this->sub_title == 'Sports') {
        $this->Info = ('The') . ' ' . $this->selected_item['title'] . 'is (' . ('Category') . ': ' . $this->selected_item->SportsName->name . ') '. 'and (' . ('Type') . ': ' . $this->selected_item->sportsType->name . ') ';
    }elseif ($this->sub_title == 'Student Life') {
        $this->Info = ('The') . ' ' . $this->selected_item['title'] . ' (' . ('Seleced Club ') . ': ' . $this->selected_item->universityClubType->name . ') ';
    }
    

    }

    // Add more methods as needed
}
}
