<?php

namespace App\Http\Livewire\University;
use App\Models\General\Language;
use App\Models\General\Cities;
use App\Models\General\Countries;
use Auth;
use App\Models\University\UniversityLocationBranch;


use Livewire\Component;

class LocationAndBranches extends Component
{
    public $languages , 
    $details_in_langs = 1,
    $edit_details_in_langs = 1,
    $add_new_location = 1,
    $countries,
    $cities,
    $country_id,
    $city_id,
    $edit_item,
    $branch_name_other_lang = [],
    $branch_address_other_lang = [],
    $edit_branch_name_other_lang = [],
    $edit_branch_address_other_lang = [],
    $translations = [],
    $editTranslations = [],
    $lc_b = [],
    $edit,
    $edit_campus_country_id,
    $isModalOpen = false,
    $locationAndBranches;
    

    public function mount()
    {
        $this->countries = Countries::orderBy('country_name')->get(['id', 'country_name', 'translated_name']);
        $this->initForm();
        $this->loadCities();
        $this->languages = Language::orderBy('name')->get();
    }
    public function initForm()
    {
        $university = \Auth::user()->selected_university;
        $this->country_id = $university->country_id;
        $this->city_id = $university->city_id;
        $this->map_link = $university->map_link;
        $this->locationAndBranches = UniversityLocationBranch::where('user_id' , Auth::id())->get();
        $this->lc_b = [];
       // dd($this->locationAndBranches);
        $this->loadCities();
    } 
    public function loadCities()
    {
        $this->cities = [];
        if (empty($this->country_id)) return;
        $this->cities = Cities::whereCountryId($this->country_id)->orderBy('city_name')->get(['id', 'city_name', 'translated_name']);
    }

    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }
    public function addEditDetailsInOtherLanguage()
    {
        ++$this->edit_details_in_langs;
                
    }
    public function addNewLocation()
    {
        ++$this->add_new_location;
    }
    public function rules()
    {
        return [
            'lc_b'                         => ['array' , 'required'],
            'lc_b.*'                       => ['present'],
            'lc_b.campus_country_id'              => 'required',
            'lc_b.campus_city_id'                 => 'required',
            'lc_b.campus_name'             => 'required|max:255',
            'lc_b.campus_address_txt'      => 'required|max:255',
            'lc_b.campus_map_link'         => 'required|max:255',
           
        ];
    }
    public function save()
    {
       $this->validate();
       
       foreach ($this->lc_b['campus_country_id'] as $i => $countryId) {
        $final[$i] = [
            'user_id'            => Auth::id(),
            'university_id'      => \Auth::user()->selected_university->id,
            'country_id'  => $this->lc_b['campus_country_id'][$i] ?? null,
            'city_id'     => $this->lc_b['campus_city_id'][$i] ?? null,
            'campus_name'        => $this->lc_b['campus_name'][$i] ?? null,
            'campus_address_txt' => $this->lc_b['campus_address_txt'][$i] ?? null,
            'campus_map_link'    => $this->lc_b['campus_map_link'][$i] ?? null,
            'campus_type'        => $this->lc_b['campus_type'][$i] ?? 0,
            'branch_name_other_lang' => [],
            'branch_address_other_lang' => [],
        ];

            // Check if translation data exists and assign it to the final array
            foreach ($this->translations as $key => $lang) {
                if (!empty($this->branch_name_other_lang[$key])) {
                    $final[$i]['branch_name_other_lang'][$lang] = $this->branch_name_other_lang[$key];
                }
                if (!empty($this->branch_address_other_lang[$key])) {
                    $final[$i]['branch_address_other_lang'][$lang] = $this->branch_address_other_lang[$key];
                }
            }
        }

        foreach($final as $submit){
             $record = \Auth::user()->selected_university->universityLocationBranch()->create($submit);

             if(!empty($submit['campus_type'])){
                //dd($record->id , $submit['campus_type']);
                $rec = \Auth::user()->selected_university->first();
                $rec->main_campus_id = $record->id;
                $rec->save();
             }
        }
        $this->initForm();
        $this->emit('returnResponseModal',[
        'title'=>'Location And Branch Added',
            'message'=>'1 New location or branch has been added.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        //session()->flash('status', 'Operation Successful!');
    }
    public function render()
    {
        return view('livewire.university.location-and-branches');
    }
   

    public function updateLocation(){

         $this->validate([
            'edit_item'                         => ['array' , 'required'],
            'edit_item.*'                       => ['present'],
            'edit_item.country_id'              => 'required',
            'edit_item.city_id'                 => 'required',
            'edit_item.campus_name'             => 'required|max:255',
            'edit_item.campus_address_txt'      => 'required|max:255',
            'edit_item.campus_map_link'         => 'required|max:255',
            ]);

        foreach ($this->editTranslations as $key => $lang) {
            if (!empty($this->edit_branch_name_other_lang[$key])) {
                $data['branch_name_other_lang'][$lang] = $this->edit_branch_name_other_lang[$key];
            }
            if (!empty($this->edit_branch_address_other_lang[$key])) {
                $data['branch_address_other_lang'][$lang] = $this->edit_branch_address_other_lang[$key];
            }
        }
        if(!empty($data)){
            $final = array_merge($this->edit_item , $data);
        }else{
            $final = $this->edit_item;
        }
        $rec = \Auth::user()->selected_university->first();


        if(!empty($this->edit_item['campus_type'])){
            $rec->main_campus_id = $this->edit->id;
        }else if($rec->main_campus_id == $this->edit->id && $this->edit_item['campus_type'] == false) {
            $rec->main_campus_id = null;
        }
        $rec->save();
        
        $this->edit->update($final);
        $this->closeModal();
        $this->emit('returnResponseModal',[
        'title'=>'Location Or Branch Updated',
            'message'=>'Location or branch has been updated.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->initForm();


    }

    public function delete($branchId)
    {
        if(\Auth::user()->selected_university->first()?->branchId != $branchId){
            UniversityLocationBranch::where('id' , $branchId)->delete();
            $this->initForm();
            $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
                'message'=>'Location or branch has been deleted.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        }else{
            $this->initForm();
            $this->emit('returnResponseModal',[
            'title'=>'Record Not Deleted',
                'message'=>'Main branch can not be deleted.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);

        }
        //session()->flash('status', 'Operation Successful!');
    }

     public function edit($id)
    {
        

        $this->add_new_location = 1;
        $this->edit = $this->locationAndBranches->where('id',$id)->first();
        $this->edit_item = $this->edit->only([

            'country_id',
            'city_id',
            'campus_name',
            'campus_address_txt',
            'campus_map_link',
            'campus_type',
        ]);

        $translations = $this->edit->getTranslations();
         //dd($translations);
        $this->edit_branch_name_other_lang = array_values($translations['branch_name_other_lang']);
        $this->edit_branch_address_other_lang = array_values($translations['branch_address_other_lang']);
        $this->editTranslations = array_keys($translations['branch_name_other_lang']);
        $this->edit_details_in_langs = count($this->editTranslations);
        $this->isModalOpen = true;
        // $this->emit('showEditItem');

    }

    public function openModalConfirmModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }


}
