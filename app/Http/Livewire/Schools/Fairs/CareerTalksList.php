<?php

namespace App\Http\Livewire\Schools\Fairs;

use App\Models\Fairs\Fair;
use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\General\Curriculum;
use App\Models\General\FeeRange;
use App\Models\Institutes\School;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\HigherOrderWhenProxy;
use Livewire\Component;
use Livewire\WithPagination;

class CareerTalksList extends Component
{
    use WithPagination;
    use ProcessFairInvitation;

    protected $paginationTheme = 'bootstrap';

    public $query = '';
    public $filter_by_country = '';
    public $filter_by_city = '';
    public $filter_by_curriculum = '';
    public $filter_by_no_students = '';
    public $filter_by_school_fee = '';

    public $period = '';

    public $fee_ranges = [];
    public $countries = [];
    public $cities = [];
    public $curriculums = [];
    public $students = [];

    protected $queryString = ['query' => ['except' => ''], 'filter_by_country' => ['except' => ''], 'filter_by_school_fee' => ['except' => ''],
        'filter_by_curriculum' => ['except' => ''], 'filter_by_no_students' => ['except' => ''], 'period' => ['except' => '']];

    public function mount()
    {
        $this->loadFilteredData();
        $this->loadEventsCredit();
    }

    public function loadFairs(): LengthAwarePaginator
    {
        $period = explode(' to ', $this->period);
        return Fair::careerTalk()->upcoming()->with(['school' => ['country', 'city', 'curriculum', 'g_12_fee_range']])
            ->withCount(['sessions', 'sessions as confirmed_universities_count'=>fn($q)=>$q->whereNotNull('university_id')->orWhereNotNull('agent_id'),             ])
            ->whereIn('school_id',$this->schoolsBaseQuery()->select('id'))
            ->when(count($period) > 1, fn($q) => $q->whereBetween('start_date', $period))
            ->paginate(30);
    }

    private function loadCities()
    {
        $this->cities = Cities::whereHas('fairs')
            ->when(!empty($this->filter_by_country), fn($q) => $q->where('country_id', $this->filter_by_country))
            ->orderBy('city_name')->get();
    }

    /**
     * @return School|Builder|HigherOrderWhenProxy
     */
    private function schoolsBaseQuery(): School|Builder|HigherOrderWhenProxy
    {
        //whereRelation('fairInvitations', 'university_id', \Auth::user()->selected_university->id)
        return School::query()
            ->whereIn('id',Fair::careerTalk()->upcoming()->select('school_id'))
            ->when(!empty($this->filter_by_country), fn($q) => $q->where('country_id', $this->filter_by_country))
            ->when(!empty($this->filter_by_city), fn($q) => $q->where('city_id', $this->filter_by_city))
            ->when(!empty($this->filter_by_curriculum), fn($q) => $q->where('curriculum_id', $this->filter_by_curriculum))
            ->when(!empty($this->filter_by_school_fee), fn($q) => $q->where('fees_grade12', $this->filter_by_school_fee));

    }


    public function loadData()
    {
        $this->loadCities();
        $this->loadFilteredData();
    }

    public function loadFilteredData($without = "")
    {
        if (empty($this->filter_by_school_fee)) {
            $this->fee_ranges = FeeRange::whereIn('id', $this->schoolsBaseQuery()->select('fees_grade12'))->orderBy('id')->get();
        }
        if (empty($this->filter_by_country)) {
            $this->countries = Countries::whereIn('id', $this->schoolsBaseQuery()->select('country_id'))->orderBy('country_name')->get();
        }
        if (empty($this->filter_by_curriculum)) {
            $this->curriculums = Curriculum::whereIn('id', $this->schoolsBaseQuery()->select('curriculum_id'))->orderBy('title')->get();
        }
        if (empty($this->filter_by_city)) {
            $this->cities = Cities::whereIn('id', $this->schoolsBaseQuery()->select('city_id'))
                ->when(!empty($this->filter_by_country), fn($q) => $q->where('country_id', $this->filter_by_country))
                ->orderBy('city_name')->get();
        }
        $this->resetPage();
    }


    public function render()
    {
        $fairs = $this->loadFairs();
        $this->emit('goToTop');
        return view('livewire.schools.fairs.career-talks-list', compact('fairs'));
    }
}
