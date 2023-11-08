<?php

namespace App\Http\Livewire\Schools;

use App\Models\General\Countries;
use App\Models\General\Curriculum;
use App\Models\General\FeeRange;
use App\Models\Institutes\School;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class SchoolsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $query = '';
    public $filter_by_country='';
    public $filter_by_curriculum='';
    public $filter_by_no_students='';
    public $filter_by_school_fee = '';

    public $fee_ranges = [];
    public $countries = [];
    public $curriculums =[];
    public $students = [];

    protected $queryString  = ['query'=>['except'=>''],'filter_by_country'=>['except'=>''],'filter_by_school_fee'=>['except'=>''],
        'filter_by_curriculum'=>['except'=>''],'filter_by_no_students'=>['except'=>'']];

    public function mount(){
        $this->fee_ranges = FeeRange::whereHas('schools')->orderBy('id')->get();
        $this->countries = Countries::whereHas('schools')->orderBy('country_name')->get();
        $this->curriculums = Curriculum::whereHas('schools')->orderBy('title')->get();
    }
    public function render()
    {
        $schools = $this->loadSchools();
        $this->emit('goToTop');
        return view('livewire.schools.schools-list',compact('schools'));
    }

    public function updatingQuery()
    {
        $this->resetPage();
    }

    public function loadSchools(): LengthAwarePaginator
    {
        return School::query()
            ->with(['country','city','curriculum','g_12_fee_range'])
            ->when(!empty($this->query),fn($q)=>$q->where('school_name', 'like', "%$this->query%"))
            ->when(!empty($this->filter_by_country), fn($q)=>$q->where('country_id',$this->filter_by_country))
            ->when(!empty($this->filter_by_curriculum), fn($q)=>$q->where('curriculum_id',$this->filter_by_curriculum))
            ->when(!empty($this->filter_by_school_fee), fn($q)=>$q->where('fees_grade12',$this->filter_by_school_fee))
            ->orderBy('id')->paginate(10);
    }

    public function loadFilteredData(){
        $this->resetPage();
    }
}
