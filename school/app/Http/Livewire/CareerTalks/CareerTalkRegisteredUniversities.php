<?php

namespace App\Http\Livewire\CareerTalks;

use App\Actions\Universities\SearchCallBack;
use App\Models\Fairs\Fair;
use App\Models\Fairs\FairReserveSessionRequest;
use App\Models\Fairs\FairSession;
use App\Models\Transactions\EventCreditTransaction;
use App\Models\Transactions\EventPackageClient;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CareerTalkRegisteredUniversities extends Component
{
    use WithPagination;


    use WithPagination;
    /**
     * @var \App\Models\General\Countries $country_data
     */
    protected string $paginationTheme = 'bootstrap';
    public ?string $country = null;
    public $country_data;
    public $status = '';
    public Fair $fair;
    public $major_id;
    public $session_id;

    protected $queryString = [
        'country' => ['except' => ''],
        'status' => ['except' => ''],
        'major_id' => ['except' => '','as'=>'major'],
        'session_id' => ['except' => '','as'=>'session']];

    protected $listeners = ['countryChanged'];

    public function render()
    {
        $this->initData();
        $universities =  $this->loadUniversities();
        $this->dispatchEvents();
        return view('livewire.career-talks.career-talk-registered-universities',compact('universities'));
    }

    private function initData()
    {
        $this->country_data = \Helpers::findCountryUsingName($this->country);
    }

    public function countryChanged($country): void
    {
        $this->resetPage();
        $this->country = $country;
    }

    private function loadUniversities(): LengthAwarePaginator
    {
        $callback = SearchCallBack::run(country_id: $this->country_data?->id);
        $query = $this->fair->reservationRequests();
        return $query
            ->with(['university.country', 'university.rankingPositions','agent.country','session.major'])
            ->when(!empty($this->session_id),fn(Builder $query)=>$query->where('fair_session_id',$this->session_id))
            ->when(!empty($this->major_id),fn(Builder $query)=>$query->whereIn('fair_session_id',FairSession::select('id')->where('major_id',$this->major_id)))
            ->when(!empty($callback), fn(Builder $query) => $query->whereHas('university', $callback)->orWhereHas('agent',$callback))
            ->paginate(30);
    }

    /**
     * @param FairReserveSessionRequest $request
     * @return void
     */
    public function accepted(FairReserveSessionRequest $request):void
    {
        $request->session()->update(['university_id'=>$request->university_id,'agent_id'=>$request->agent_id]);
        $request->status = \AppConst::REGISTARTION_ACCEPTED;
        $this->emit('registeredUniversitiesListUpdated');
        $request->save();
    }

    public function rejected(FairReserveSessionRequest $request):void
    {
        $request->status = \AppConst::REGISTARTION_REJECTED;
        $request->save();
        $request->load(['session.major','session.fair']);
        $session = $request->session;
        $title = $session->fair->fair_name ?: \Auth::user()->selected_school?->school_name;
        $description = "Revers Credit From: $title Slot booking in career talk for ".$session->major?->title;
        $institute_col = 'university_id';
        if (!empty($request->agent_id)){
            $institute_col = 'agent_id';
        }

        $institute = $request->university ?? $request->agent;
        $institute->event_credit++;
        $institute->save();

        $old_trans = EventCreditTransaction::where([['event_id',$session?->fair_id], ['credit_out',1],
            [$institute_col,$request->{$institute_col}]])->latest()->first();

        EventCreditTransaction::create([
            $institute_col => $request->{$institute_col},
            'event_id' => $session?->fair_id,
            'event_name' => $description,
            'credit_out' => 0,
            'credit_in' => 1,
            'event_package_client_id'=>$old_trans?->event_package_client_id,
            'event_type'=>$old_trans?->event_type,
            'by_user_id' => \Auth::id()
        ]);
        if (!empty($old_trans)) {
            $package = EventPackageClient::find($old_trans->event_package_client_id);
            ++$package->{$old_trans->event_type};
            $package->save();
        }
    }

    public function revoke(FairReserveSessionRequest $request):void
    {
        $request->session()->update(['university_id'=>null,'agent_id'=>null]);
        $request->status = \AppConst::REGISTARTION_PENDING;
        $this->emit('registeredUniversitiesListUpdated');
        $request->save();
    }

    private function dispatchEvents()
    {
//        $this->emit('showRecords');
        $this->emit('goToTop');
    }

}
