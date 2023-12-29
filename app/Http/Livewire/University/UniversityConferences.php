<?php

namespace App\Http\Livewire\University;

use App\Models\General\Language;
use App\Models\Multimedia\Media;
use App\Models\Multimedia\MediaAlbum;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\University\UniversityConferenceType;
use App\Models\University\UniversityConferenceSubject;

use Auth;


class UniversityConferences extends Component
{
    use WithFileUploads;

    public $rectangle_logo_path;
    public $languages , 
    $file,
    $details_in_langs       = 1,
    $university,
    $conference,
    $conf,
    $subjects,
    $edit_item,
    $other_subjects,
    $addCenferenceDetailsInOtherLanguage = 1,
    $names                               = [],
    $subject_names_lang                  = [],
    $descriptions                        = [],
    $square_logo_path,
    $universityConferenceType,
    $album_id,
    $edit_id,
    $selected_album;

    
    public function addDetailsInOtherLanguage()
    {
        ++$this->details_in_langs;
    }
    public function addCenferenceDetailsInOtherLanguage()
    {
        ++$this->addCenferenceDetailsInOtherLanguage;
    }
    public function rules()
    {
        return [
            'conference'                         => ['array'],
            'conference.*'                       => ['present'],
            'conference.university_conference_type_id'  => ['required'],
            'conference.title'                 => ['required','min:1'],
            'conference.start_date'                 => ['required','min:1'],
            'conference.end_date'              => ['required','min:1'],
            'conference.subjects-0'            => ['required','min:1'],
            // 'rectangle_logo_path'               => ['mimes:jpg,jpeg,png'],
            // 'square_logo_path'                  => ['mimes:jpg,jpeg,png'],
        ];
    }
   

    public function loadAlbumData()
    {
        $this->selected_album = MediaAlbum::firstOrCreate(
            ['title->en' => 'University Conference'],
            [
                'title' => ['en' => 'University Conference'],
                'description' => [],
                'content_type' => 1,
                'created_by'   => Auth::id(),
                'university_id' => \Auth::user()->selected_university->id
            
            ]
        )->load('media');
    }

    public function save()
    {
        $inputs = $this->validate();
        $data = ['created_by' => Auth::id()];
        $imgs = $this->handleImages();
         $data['rectangle_logo_path'] = $imgs[0];
         $data['square_logo_path'] = $imgs[1];
        foreach ($this->translations as $key => $lang) {
            if (!empty($this->names[$key])) {
                $data['translated_name'][$lang] = $this->names[$key];
            }
        }
        $final = array_merge($data, $this->conference);
        if (!empty($this->edit_item)) {
            $newConference = $this->edit_item->update($final);
            $this->emit('returnResponseModal',[
                'title'=>'Conference Record Updated',
                'message'=>'Conference record has been updated.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);

        } else {
          $newConference = \Auth::user()->selected_university->conferences()->create($final);
          
            $this->emit('returnResponseModal',[
                'title'=>'Conference Record Added',
                'message'=>'1 New conference record has been added.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
        ]);
        }
        $this->handleSubjects($newConference);
        $this->edit_item = null;
        $this->edit_id = null;
        //$latestConference = \Auth::user()->selected_university->conferences()->latest('id')->first();
        $this->initForm();
        //session()->flash('status', 'Operation Successful!');
    }

    public function handleImages(){

        if($this->file){
            $images = [];
             $file     = $this->file[0]->storePublicly('images/university-photos', 's3');
            $images []            = [ 'media_type'=>Media::TYPE_IMAGE, 'url'=>$file, 'created_by'=>\Auth::id()];
           $this->selected_album->media()->createMany($images);
           $this->selected_album->refresh();
        }
         if (($this->rectangle_logo_path == false) && ($this->square_logo_path == false)) {
            $images = [];
            $rectangle_logo_path  = $this->rectangle_logo_path->storePublicly('images/university-photos', 's3');
            $square_logo_path     = $this->square_logo_path->storePublicly('images/university-photos', 's3');
            $images []            = [ 'media_type'=>Media::TYPE_IMAGE, 'url'=>$rectangle_logo_path, 'created_by'=>\Auth::id()];
            $images []            = [ 'media_type'=>Media::TYPE_IMAGE, 'url'=>$square_logo_path, 'created_by'=>\Auth::id()];
           $this->selected_album->media()->createMany($images);
           $this->selected_album->refresh();

           return [$rectangle_logo_path , $square_logo_path];
        }else{
            return [$this->rectangle_logo_path , $this->square_logo_path];
        }

    }


    public function handleSubjects($newConference)
    {
        $finalSubjectsData = [];
        foreach ($this->subject_translations as $key => $lang) {
            $subjectData = []; // Initialize $subjectData here for each iteration
            if (!empty($this->subject_names_lang[$key])) {
                $subjectData['translated_name'][$lang] = $this->subject_names_lang[$key];
            } 
        }
        if(empty($subjectData['translated_name'])) {
                $subjectData['translated_name'] = null;
        }
        if (!empty($this->conference['subjects-0'])) {
                $finalSubjectsData[] = [
                    'title' => $this->conference['subjects-0'],
                    'translated_name' => $subjectData['translated_name'],
                ];
        }
        foreach (($this->other_subjects ?? []) as $subjects) {
            $finalSubjectsData[] = [
                'title' => $subjects,
            ];
        }
        $subject = [];
        if(!empty($this->edit_id)){
            $newConference = \Auth::user()->selected_university->conferences()->whereId($this->edit_id)->first(
        );
            $newConference->subjects()->delete();
        }
        foreach ($finalSubjectsData as $storeSubject) {
            $subject[] = $newConference->subjects()->create([
                'university_conference_id' => $newConference->id,
                'title' => $storeSubject['title'],
                'translated_name' => $storeSubject['translated_name'] ?? null,
            ]);
        }

        return $subject ?? '--';
    }

    public function mount(){
        $this->loadAlbumData();
        $this->initForm();
    }

    public function delete($id){
        $record = UniversityConferenceSubject::whereId($id);
        $data = $record->first()->university_conference_id;
        $record->delete();
        if(UniversityConferenceSubject::where('university_conference_id' , $data)->exists()){

        }else{
            \Auth::user()->selected_university->conferences()->whereId($data)->delete();
        }
        $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
                'message'=>'Conference record has been deleted.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
        ]);
        $this->initForm();
        //session()->flash('status', 'Operation Successful!');

    }

    public function initForm($reset = false){

        if (!empty($this->edit_id) && $reset) {
            $this->setupEditForm();
            return;
        }
        $this->subjects = [
                 'Name of the Subjects 1',
                 'Name of the Subjects 2',
                 'Name of the Subjects 3',
                 'Name of the Subjects 4'
        ];
        $this->languages = Language::orderBy('name')->get();
        $this->universityConferenceType = UniversityConferenceType::get();
        $this->translations   = [];
        $this->translations[] = 'en';
        $this->subject_translations = [];
    }

    public function render()
    {
        $this->university = \Auth::user()->selected_university;
        return view('livewire.university.university-conferences');
    }
     public function edit($id)
    { 
        $this->edit_id = $id;
        $this->setupEditForm();
    }
     public function setupEditForm(): void
    {
        $this->edit_item = \Auth::user()->selected_university->conferences()->whereId($this->edit_id)->first(
        );
        $this->conference = $this->edit_item->only([
            'university_conference_type_id',
            'title',
            'intro_about_conference',
            'start_date',
            'end_date',
            'url',
            'subjects-0',
            'introduction',
            'rectangle_logo_path',
            'square_logo_path',
            ]);
        $translations = $this->edit_item->getTranslations();
        $this->names = array_values($translations['translated_name']);
        $this->translations = array_keys($translations['translated_name']);
        $this->addCenferenceDetailsInOtherLanguage = count($this->translations);
        $this->rectangle_logo_path = 'https://d73ojsnoesnuw.cloudfront.net/'.$this->conference['rectangle_logo_path'];
        $this->square_logo_path = 'https://d73ojsnoesnuw.cloudfront.net/'.$this->conference['square_logo_path'];
        $this->other_subjects = $this->edit_item->subjects()->pluck('title')->toArray();
        $this->conference['subjects-0'] = $this->other_subjects[0];
        if (!empty($this->other_subjects)) {
            array_shift($this->other_subjects);
        }
        $this->emit('goToTop');
    }
}
