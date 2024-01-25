<?php

namespace App\Http\Livewire\University;

use App\Models\General\Language;
use App\Models\University\UniversityCategories;
use App\Models\University\UniversityType;
use App\Rules\NumberOREmpty;
use Livewire\Component;

class QuickView extends Component
{
    public $yesNo = [1 => "Yes", 0 => "No"];
    public $languages;
    public $university_languages;
    public $categories;
    public $types;
    public $quick_view = [];


    public function mount()
    {
        $this->languages = Language::all();
        $this->types = UniversityType::orderBy('name')->get();
        $this->categories = UniversityCategories::orderBy('name')->get();
        $this->initForm();
    }

    public function initForm()
    {
        $university = \Auth::user()->selected_university;
        $this->quick_view = $university->quickView()->firstOrCreate()->makeHidden([])->toArray();
        $this->university_languages = $university->languages()->pluck('languages.id')->toArray();
    }

    public function rules()
    {
        return [
            'quick_view' => ['array'],
            'quick_view.*' => ['present'],
            'quick_view.founded_year' => ['integer', 'max:' . date('Y')],
            'quick_view.no_alumni'=> ['integer','nullable'],
            'quick_view.no_students'=> ['integer','nullable'],
            'quick_view.no_schools'=> ['integer','nullable'],
            //'quick_view.no_majors'=> ['integer','nullable', 'max:11'],
            'quick_view.no_academics'=> ['integer','nullable'],
            'university_languages' => ['required', 'array', 'min:1'],
            'quick_view.avg_annual_cost' => ['integer','nullable'],
            // 'quick_view.no_programs' => ['integer' , 'nullable' , 'max:11'],
            // 'quick_view.acceptance_rate' => ['integer' , 'nullable' , 'max:11'],
            'quick_view.no_majors' => ['integer', 'nullable', function ($attribute, $value, $fail) {
            if ($value !== null && strlen((string)$value) > 11) {
                $fail("The $attribute must not exceed 11 digits.");
            }
            }],
            'quick_view.no_programs' => ['integer', 'nullable', function ($attribute, $value, $fail) {
                if ($value !== null && strlen((string)$value) > 11) {
                    $fail("The $attribute must not exceed 11 digits.");
                }
            }],
            'quick_view.acceptance_rate' => ['integer', 'nullable', function ($attribute, $value, $fail) {
                if ($value !== null && strlen((string)$value) > 11) {
                    $fail("The $attribute must not exceed 11 digits.");
                }
            }],

        ];
    }

    public function save()
    {
        $inputs = $this->validate();
        $qv_data = [];
        foreach ($inputs['quick_view'] as $key => $value){
            $qv_data[$key] = (!empty($value) || $value == 0 ? $value:null);
        }
        $languages_data = $inputs['university_languages'];
        $university = \Auth::user()->selected_university;
        $university->quickView()->update($qv_data);
        $university->languages()->sync($languages_data);
        $this->emit('returnResponseModal',[
        'title'=>'Quick View Updated',
            'message'=>'Quick view been updated',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        //session()->flash('status', 'Operation Successful!');
    }

    public function delete(){

        $university = \Auth::user()->selected_university;
        $university->quickView()->delete();
        $this->emit('returnResponseModal',[
        'title'=>'Record Deleted',
            'message'=>'Quick view has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        session()->flash('status', 'Operation Successful!');
    }


    public function render()
    {
        return view('livewire.university.quick-view');
    }
}
