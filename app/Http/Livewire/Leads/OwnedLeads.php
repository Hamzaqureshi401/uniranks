<?php

namespace App\Http\Livewire\Leads;

use App\Exports\ExportLeads;
use App\Models\General\Countries;
use App\Models\General\LeadSource;
use App\Models\General\Major;
use App\Models\Institutes\University;
use App\Models\University\UniversityLead;
use App\Models\User;
use App\Models\User\UserBio;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class OwnedLeads extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public $per_page = '10';

    public $query = '';
    public $filter_by_country = '';
    public $filter_by_major = '';
    public $filter_by_university = '';
    public $filter_by_destination = '';
    public $filter_by_school = '';
    public $filter_by_fee_range = '';
    public $filter_by_created_date = '';
    public $filter_by_close_date = '';

    public $group_by_source = false;
    public $group_by_created_date = false;

    public $group_by_country = false;

    public $filter_by_source = '';

    public $fee_ranges = [];
    public $countries = [];
    public $destinations = [];
    public $majors = [];
    public $schools = [];
    public $universities = [];
    public $sources = [];

    public $selected_all = false;
    public $selectedStudents = [];

    public $tags = [];

    public $uni_majors = [];
    public $uni_city;

    public $uni_country;

    public $filter_by_matching;

    protected $queryString = [
        'query' => ['except' => ''],
        'filter_by_country' => ['except' => ''], 'filter_by_fee_range' => ['except' => ''],
        'filter_by_major' => ['except' => ''], 'filter_by_school' => ['except' => ''],
        'filter_by_destination' => ['except' => ''],
        'filter_by_university' => ['except' => ''],
        'filter_by_source' => ['except' => ''],
        'filter_by_created_date' => ['except' => ''],
        'filter_by_close_date' => ['except' => ''],
        'filter_by_matching'=>['except'=>''],
        'per_page' => ['except' => '10']
    ];

    protected $listeners = ['openModal', 'onModelClose'];
    public $isModalOpen = false;

    public function openModalConfirmModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function onModelClose()
    {
        $this->closeModal();
    }
    public function render()
    {
        $students = $this->loadStudents();
        return view('livewire.leads.owned-leads', compact('students'));
    }

    public function mount()
    {
        $university  = \Auth::user()->selected_university;
        $this->uni_majors = $university->universityMajorPreferences()->pluck('major_id')->toArray();
        $this->uni_city = $university->city_id;
        $this->uni_country = $university->country_id;
        $this->loadFilteredData();
    }

    public function selectAll()
    {
        if ($this->selected_all) {
            $this->selectedStudents = $this->baseQuery()->pluck('id')->toArray();
        } else {
            $this->selectedStudents = [];
        }
    }

    public function selectLead()
    {
        if ($this->baseQuery()->count() == count($this->selectedStudents)) {
            $this->selected_all = true;
        } else {
            $this->selected_all = false;
        }
    }

    public function applyFilters($filter_by, $filter_by_value)
    {
        $this->{$filter_by} = $filter_by_value;

        if (empty($filter_by_value) && isset($this->tags['filter'])) {
            unset($this->tags['filter'][$filter_by]);
            $this->emptyFliters();
        }

        $this->loadFilteredData();
    }

    public function applyGroupBy($group_by)
    {
        $this->{$group_by} = true;
        $this->tags['group'][$group_by] = \Str::title(\Str::replace('_', ' ', $group_by));
    }

    public function remove_filter(){
        $last_key = array_key_last($this->tags['filter']);
        $this->{$last_key} = '';
        array_pop($this->tags['filter']);
        $this->emptyFliters();
    }
    public function remove_group(){
        $last_key = array_key_last($this->tags['group']);
        $this->{$last_key} = false;
        array_pop($this->tags['group']);
        $this->emptyGroups();
    }

    private function emptyFliters(){
        if (!empty($this->tags['filter'])) return;
        unset($this->tags['filter']);
    }
    private function emptyGroups(){
        if (!empty($this->tags['group'])) return;
        unset($this->tags['group']);
    }

    public function loadStudents(): LengthAwarePaginator
    {
        $query = $this->baseQuery();
        return $query->with(['userBio' => ['country', 'city', 'curriculum', 'feeRange', 'studyLevel'],
            'majors','leadSource', 'studyDestinations', 'preferredUniversities'])
            ->when($this->group_by_source, fn($q) => $q->orderBy('lead_source_id'))
            ->when($this->group_by_country, fn($q) => $q->orderBy(UserBio::select('country_id')->whereColumn('user_bios.user_id', 'users.id')->take(1)))
            ->when($this->group_by_created_date, fn($q) => $q->orderBy('created_at'), fn($q) => $q->orderBy('id'))
//            ->orderBy('id')
            ->paginate($this->per_page);
    }

    private function baseQuery(): \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
    {
        $university = \Auth::user()->selected_university;
        $user_majors_sq = fn($sq)=>$sq->whereIn('majors.id',$university->universityMajorPreferences()->select('major_id'));
        $matching_sq_10 = fn ($q) => $q->whereIn('users.id',UserBio::select('user_id')->where([['country_id',$this->uni_country],['city_id',$this->uni_city]]))->whereHas('majors',$user_majors_sq);
        $matching_sq_7 = fn ($q) => $q->whereIn('users.id',UserBio::select('user_id')->where([['country_id',$this->uni_country],['city_id','!=',$this->uni_city]]))->whereHas('majors',$user_majors_sq);
        $matching_sq_5 = fn ($q) => $q->whereNotIn('users.id',UserBio::select('user_id')->where('country_id',$this->uni_country))->whereDoesntHave('majors',$user_majors_sq);
        $uni_id = $university->id;
        $created_dates = explode(' to ', $this->filter_by_created_date);
        $close_dates = explode(' to ', $this->filter_by_close_date);
        return User::whereIn('users.id', UniversityLead::whereUniversityId($uni_id)->where('archived','!=',1)->select('student_id'))
            ->when($this->filter_by_matching == 10, $matching_sq_10)
            ->when($this->filter_by_matching == 7, $matching_sq_7)
            ->when($this->filter_by_matching == 5, $matching_sq_5)
            ->when(!empty($this->filter_by_school), fn($q) => $q->where('campus_id', $this->filter_by_school))
            ->when(!empty($this->filter_by_major), fn($q) => $q->whereRelation('majors', 'majors.id', $this->filter_by_major))
            ->when(!empty($this->filter_by_destination), fn($q) => $q->whereRelation('studyDestinations', 'countries.id', $this->filter_by_destination))
            ->when(!empty($this->filter_by_university), fn($q) => $q->whereRelation('preferredUniversities', 'universities.id', $this->filter_by_university))
            ->when(!empty($this->filter_by_country), fn($q) => $q->whereRelation('userBio', 'country_id', $this->filter_by_country))
            ->when(!empty($this->filter_by_fee_range), fn($q) => $q->whereRelation('userBio', 'fee_range_id', $this->filter_by_fee_range))
            ->when(!empty($this->filter_by_source), fn($q) => $q->where('lead_source_id', $this->filter_by_source))
            ->when(!empty($this->query), fn($q) => $q->where('name', 'like', "%$this->query%"))
            ->when(count($created_dates) > 1, fn($q) => $q->whereBetween('created_at', $created_dates));
    }

    public function loadFilteredData()
    {
        $this->resetPage();
        $subQry = $this->baseQuery()->select('users.id');
        if (empty($this->filter_by_country)) {
            $this->countries = Countries::whereHas('users', fn($q) => $q->whereIn('users.id', $subQry))->orderBy('country_name')->get(['id', 'country_name', 'translated_name']);
        } else {
            $this->tags['filter']['filter_by_country'] = Countries::whereId($this->filter_by_country)->value('country_name');
        }

        if (empty($this->filter_by_destination)) {
            $this->destinations = Countries::whereHas('students', fn($q) => $q->whereIn('users.id', $subQry))->orderBy('country_name')->get(['countries.id', 'countries.country_name', 'countries.translated_name']);
        } else {
            $this->tags['filter']['filter_by_destination'] = Countries::whereId($this->filter_by_destination)?->value('country_name');
        }

        if (empty($this->filter_by_major)) {
            $this->majors = Major::whereHas('students', fn($q) => $q->whereIn('users.id', $subQry))->orderBy('title')->get(['id', 'title', 'translated_name']);
        } else {
            $this->tags['filter']['filter_by_major'] = Major::whereId($this->filter_by_major)?->value('title');
        }

        if (empty($this->filter_by_university)) {
            $this->universities = University::whereHas('students', fn($q) => $q->whereIn('users.id', $subQry))->orderBy('university_name')->get(['id', 'university_name', 'translated_name']);
        } else {
            $this->tags['filter']['filter_by_university'] = University::whereId($this->filter_by_university)?->value('university_name');
        }

//        if (empty($this->filter_by_fee_range)) {
//            $this->fee_ranges = FeeRange::whereHas('students', fn($q) => $q->whereIn('users.id', $subQry))->get();
//        }else{
//            $this->tags['filter']['filter_by_fee_range'] = $this->filter_by_fee_range;
//        }
//
//        if (empty($this->filter_by_school)) {
//            $this->schools = School::whereIn('id',$this->baseQuery()->select('users.campus_id'))->get(['id', 'school_name', 'translated_name']);
//        }else{
//            $this->tags['filter']['filter_by_school'] = $this->filter_by_school;
//        }

        if (empty($this->filter_by_source)) {
            $this->sources = LeadSource::whereIn('id', $this->baseQuery()->select('users.lead_source_id'))->get(['id', 'title', 'translated_name']);
        } else {
            $this->tags['filter']['filter_by_source'] = LeadSource::whereId($this->filter_by_source)?->value('title');
        }

        if (!empty($this->filter_by_matching)){
            $this->tags['filter']['filter_by_matching'] = 'Matching Status '.$this->filter_by_matching;

        }

    }

    public function exportLeads(){
        $eport_file_name = "ur_leads_" . Carbon::now()->timestamp . ".xlsx";
        $q = $this->baseQuery()->when(!empty($this->selectedStudents), fn($q)=>$q->whereIn('id',$this->selectedStudents));
        return \Excel::download(new ExportLeads($q),$eport_file_name);
    }

    public function archiveLeads(){
        if (empty($this->selectedStudents)) return;
        \Auth::user()->selected_university->leads()->syncWithPivotValues($this->selectedStudents,['archived'=>1],false);
        $this->selectedStudents = [];
    }
    public function deleteLeads(){
        if (empty($this->selectedStudents)) return;
        \Auth::user()->selected_university->leads()->detach($this->selectedStudents);
        $this->selectedStudents = [];
        $this->closeModal();
        $this->emit('returnResponseModal',[
            'title'=>'Record Deleted',
            'message'=>'Selected Record has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
    }
    /**
     * TODO:FEED LEADS FOR UNIVERSITY
     *UniversityLead::truncate();
     * foreach ([682, 683, 1] as $school_id){
     * $leas = User::whereStudents()->whereCampusId($school_id)->orderBy('id','desc')->limit(33)->pluck('id')->toArray();
     * \Auth::user()->selected_university->leads()->attach($leas);
     * }
     */
}
