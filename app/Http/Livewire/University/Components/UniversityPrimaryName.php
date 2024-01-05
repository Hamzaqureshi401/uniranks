<?php

namespace App\Http\Livewire\University\Components;
use App\Models\General\Language;
use App\Models\Library\OriginalUniversity;

use Livewire\Component;

class UniversityPrimaryName extends Component
{
    public $university_name,
    $translations = [],
    $descriptions = [],
    $secondry_translations = [],
    $details_in_langs = 1,
    $languages,
    $type,
    $edit,
    $edit_name,
    $edit_type,
    $edit_name_type,
    $other_val,
    $setVal = [],
    $name = [],
    $name_language = [],
    $name_type = [],
    $translated_name = [],
    $langues_with_primery_names = [],
    $show_name_type=[];
    


    public function initForm(){
        
        $this->loadLangauesWithPrimeryName();
        $this->university_name = \Auth::user()->selected_university->university_name;
        $uni = \Auth::user()->selected_university;
        $uni->refresh();
        $secondry = \Auth::user()->selected_university->originalUniversity()->get();
        $this->secondry_translations = $secondry;
        $this->translations[] ='en'; 
        $this->details_in_langs = 1;
        $this->type = [];
        $this->setPrimaryAndSecondry(null);
        $this->langSelected(0);
        // $this->translations = empty($this->about_translations) ? ['en'] : array_keys($this->about_translations);
        // $this->translated_name = array_values($this->about_translations);
        // $this->details_in_langs = count($this->translations) ?: 1;
        
    }
    public function langSelected($index){
        $lan = $this->translations[$index];
        $this->show_name_type[$index] = in_array($lan,$this->langues_with_primery_names);
    }
    public function mount(){
        $this->languages = Language::orderBy('name')->get();
        $this->initForm();
    }
    
    public function loadLangauesWithPrimeryName(){
        $this->langues_with_primery_names =\Auth::user()->selected_university->originalUniversity()->where('name_type',1)
        ->whereNotNull('name_language')
        ->groupBy('name_language')
        ->pluck('name_language')
        ->toArray();
    }

    public function rules(){
        return [
          'university_name'=>['required','string'],
        ];
    }
   

    public function save(){

        $inputs = $this->validate();
        \Auth::user()->selected_university->update($inputs);
        $this->emit('returnResponseModal',[
        'title'=>'University Primary Name Update',
            'message'=>'Your University name has been updated.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->initForm();
        //session()->flash('status', 'Operation Successful!');
    }

    public function setPrimaryAndSecondry($i = null){  

    
            $this->type = ['1' => 'Primary' ,'2' => 'Secondary'];
    
    }
    public function addDetailsInOtherLanguage()
    { 
        ++$this->details_in_langs;
        
    }

    public function edit($id){

        $this->edit = \Auth::user()->selected_university->originalUniversity()->get()->where('id' , $id)->first();
        $this->edit_name = $this->edit->name;
        $this->edit_type =  ['1' => 'Primary' ,'2' => 'Secondary'];
        $this->emit('showSlotsModal');
        //dd($this->eidt , $id);

    }

    public function updateSecondryName($id){

        //dd($this->edit_name , $this->edit_name_type);
        $university = \Auth::user()->selected_university->originalUniversity()->find($id);

        if ($university) {
            $university->update([
                'name' => $this->edit_name,
                'name_type' => $this->edit_name_type ?? $this->edit->name_type,
            ]);
        }
        $this->emit('closeModal');

        $this->emit('returnResponseModal',[
        'title'=>'University Name Update',
            'message'=>'Your University name has been updated.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->initForm();


    }
    public function addPrimaryAndSecondry($i = null){

        $this->type[$i] = ['1' => 'Primary' ,'2' => 'Secondary'];
    }
    public function saveSecondryName(){
        //$inputs = $this->validate();
         $this->validate([
        'name' => ['array', 'required', 'min:1'],
            ]);
        $uni = \Auth::user()->selected_university->first();

        $otherData = [
            'website' => $uni->website,
            'country' => $uni->country->country_name,
            'status'  => $uni->status 
        ];
        
        
        foreach ($this->name as $key => $name) {

            $data[] = [
            'name_language' => $this->translations[$key] ?? 'en',
            'name_type'     => $this->name_type[$key] ?? '2',
            'name'          => $name,
            'website'       => $uni->website,
            'country'       => $uni->country->country_name,
            'status'        => $uni->status,
            ];
        }

        //dd($data , \Auth::user()->selected_university->originalUniversity()->get());
        \Auth::user()->selected_university->originalUniversity()->createMany($data);
        $this->emit('returnResponseModal',[
        'title'=>'University Secondry Name Added',
            'message'=>'University secondry name has been added.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->initForm();
        
        //session()->flash('status', 'Operation Successful!');
    }

    public function deleteName($id){
        $university = \Auth::user()->selected_university->originalUniversity()->where('id', $id)->first();

        if ($university) {
            $university->delete();
        }
        $this->emit('returnResponseModal',[
        'title'=>'Record Deleted',
            'message'=>'Your University name has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->initForm();

    }
     public function delete(){
        \Auth::user()->selected_university->update(['university_name' => null]);
         $this->initForm();
         $this->emit('returnResponseModal',[
        'title'=>'Record Deleted',
            'message'=>'Your University name has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        // session()->flash('status', 'Operation Successful!');
    }
     public function deleteTranslation($key)
    {
        $uni = \Auth::user()->selected_university;

        if ($uni->hasTranslation('translated_name', $key)) {
            $uni->forgetTranslation('translated_name', $key);
            $uni->save();
            $this->initForm();
            $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
                'message'=>'University name in different languages has been deleted.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
            //session()->flash('status', 'Operation Successful!');
        }
    }

    public function render()
    {
        return view('livewire.university.components.university-primary-name');
    }
}