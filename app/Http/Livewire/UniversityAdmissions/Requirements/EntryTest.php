<?php

namespace App\Http\Livewire\UniversityAdmissions\Requirements;

use App\Models\General\Test;
use App\Models\General\TestScoreType;
use App\Models\University\UniversityTestingRequirement;
use Livewire\Component;

class EntryTest extends Component
{
    public $degree_id;
    public $tests = [];
    public $testing_requirements = [];
    public $unselected_id = [];
    public $record;
    public $showAdd = true;



    public function mount()
    {
        $this->tests = Test::whereTypeId(\AppConst::ENTRY_TEST)->orderBy('type_id')->get();
        $this->initForm();
    }

    public function initForm()
    {
        $uni = \Auth::user()->selected_university;
         $this->record = $uni->testingRequirments()->where('degree_id', $this->degree_id)
            ->whereRelation('requiredTest','type_id',\AppConst::ENTRY_TEST)->select('updated_at')->first();
        
        $this->testing_requirements = [];
        $test_reqs = $uni->testingRequirments()
            ->where('degree_id', $this->degree_id)
            ->whereRelation('requiredTest','type_id',\AppConst::ENTRY_TEST)
            ->with('requiredTest.requiredScoreTypes', 'requiredScoreTypes')->get();
        /* @var \Illuminate\Database\Eloquent\Collection<int, UniversityTestingRequirement> $test_reqs */
        foreach ($test_reqs as $index => $req) {
            $test = $req->requiredTest;
            $this->testing_requirements [$index] = [
                'test_id' => $test->id,
                'degree_id' => $req->degree_id,
                'title' => $test->title,
                'required_grades' => $req->required_grades,
                'required_score' => $test->required_score,
                'score_from' => $test->score_from,
                'score_to' => $test->score_to,
            ];

            if (!empty($test->requiredScoreTypes)) {
                $this->testing_requirements [$index]['sub_scores'] = $test->requiredScoreTypes->transform(function ($item) use ($req) {
                    /* @var TestScoreType $item */
                    return ['id' => $item->id, 'title' => $item->translated_name ?: $item->title,
                        'required_grades' => $req->requiredScoreTypes?->where('test_score_type_id', $item->id)?->value('required_score') ?? '',
                        'required_score' => $item->pivot->score_from . "-" . $item->pivot->score_to,
                        'score_from' => $item->pivot->score_from,
                        'score_to' => $item->pivot->score_to,
                    ];
                })->toArray();
            }
        }
        $this->unselected_id = array_column($this->testing_requirements, 'test_id');
        //array_pop($this->unselected_id);


        if (empty($this->testing_requirements)) {
            $this->addTestingRequirement();
        }
        if(count(array_column($this->testing_requirements, 'test_id')) != count($this->tests)){
            $this->showAdd = false;
        }

    }

    public function addGpaRequirement()
    {
        $this->gpa_requirments [] = ['grade_scale_id' => '', 'required_grades' => ''];
    }

    public function addTestingRequirement()
    {
        if(count(array_column($this->testing_requirements, 'test_id')) != count($this->tests)){
            $this->unselected_id = array_column($this->testing_requirements, 'test_id');
            $this->testing_requirements [] = [
                'test_id' => null,
                'degree_id' => $this->degree_id,
                'title' => '',
                'required_grades' => '',
                'required_score' => '',
                'score_from' => '',
                'score_to' => '',
            ];
            $this->setOption();
        }else{
            $this->mount();
        }
    }

    public function setOption(){

        $this->emit('setOption', ['count' => count($this->testing_requirements)]);
    }


    public function removeTestingRequirement($index)
    {
        unset($this->testing_requirements [$index]);
        sort($this->testing_requirements);
    }


    public function testTypeSelected($index)
    {
        $test_id = $this->testing_requirements[$index]['test_id'];
        if (!empty($test_id)) {
            $test = Test::whereId($test_id)->with('requiredScoreTypes')->first();
            if (!empty($test)) {
                $this->testing_requirements [$index] = [
                    'test_id' => $test_id,
                    'title' => $test->title,
                    'required_grades' => '',
                    'required_score' => $test->required_score,
                    'score_from' => $test->score_from,
                    'score_to' => $test->score_to,
                ];
                if (!empty($test->requiredScoreTypes)) {
                    $this->testing_requirements [$index]['sub_scores'] = $test->requiredScoreTypes->transform(function ($item) {
                        /* @var TestScoreType $item */
                        return ['id' => $item->id, 'title' => $item->translated_name ?: $item->title,
                            'required_grades' => '',
                            'required_score' => $item->pivot->score_from . "-" . $item->pivot->score_to,
                            'score_from' => $item->pivot->score_from,
                            'score_to' => $item->pivot->score_to,
                        ];
                    })->toArray();
                }
            }
        }
        $this->setOption();
    }


    protected function rules()
    {
        $rules = [];
        foreach ($this->testing_requirements as $key => $requirement) {
            if (empty($requirement['test_id'])) {
                continue;
            }

            $rules["testing_requirements.$key.required_grades"] = ['required', 'numeric', 'between:' . str_replace('-', ',', $requirement['required_score'])];

            if (!empty($requirement['sub_scores'])) {
                $rules["testing_requirements.$key.sub_scores"] = ['sometimes', 'array'];
                foreach ($requirement['sub_scores'] as $sub_key => $sub_score) {
                    $rules["testing_requirements.$key.sub_scores.$sub_key.required_grades"] = ['required', 'numeric', 'between:' . str_replace('-', ',', $sub_score['required_score'])];
                }
            }
        }
        return $rules;
    }

    protected function validationAttributes()
    {
        $rules = [];
        foreach ($this->testing_requirements as $key => $requirement) {
            if (empty($requirement['test_id'])) {
                continue;
            }

            $rules["testing_requirements.$key.required_grades"] = $requirement['title'] . ' required grades';

            if (!empty($requirement['sub_scores'])) {
                foreach ($requirement['sub_scores'] as $sub_key => $sub_score) {
                    $rules["testing_requirements.$key.sub_scores.$sub_key.required_grades"] = $requirement['title'] . "->" . $sub_score['title'] . " required grades";
                }
            }
        }
        return $rules;
    }

    public function save()
    {
        $this->setOption();
        $this->validate();
        $uni = \Auth::user()->selected_university;
        $uni->testingRequirments()->where('degree_id', $this->degree_id)
            ->whereRelation('requiredTest','type_id',\AppConst::ENTRY_TEST)
            ->delete();

        foreach ($this->testing_requirements as $requirement) {
            if (empty($requirement['test_id'])) continue;
            $test_requirement = UniversityTestingRequirement::create([
                'university_id' => $uni->id,
                'degree_id' => $this->degree_id,
                'test_id' => $requirement['test_id'],
                'required_grades' => $requirement['required_grades']
            ]);
            if (!empty($requirement['sub_scores'])) {
                $sub_scores_data = [];
                foreach ($requirement['sub_scores'] as $sub_key => $sub_score) {
                    $sub_scores_data [] = [
                        'test_score_type_id' => $sub_score['id'],
                        'required_score' => $sub_score['required_grades']
                    ];
                }
                $test_requirement->requiredScoreTypes()->createMany($sub_scores_data);
            }
        }
        $this->initForm();
        $this->emit('returnResponseModal',[
                'title'=>'Test Requirement Added',
                'message'=>'Test requirement has been added.',
                'btn'=>'Oky',
                'link'=>null,
                'viewTitle' => null
            ]);
        //session()->flash('status', 'Operation Successful!');
    }

    public function render()
    {
        return view('livewire.university-admissions.requirements.entry-test');
    }
}
