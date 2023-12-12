<?php

namespace App\Http\Livewire\Fairs;

use App\Actions\Universities\SearchCallBack;
use App\Models\Fairs\Fair;
use App\Models\Fairs\Invitation;
use App\Models\Institutes\University;
use App\Models\Transactions\EventCreditTransaction;
use App\Models\Transactions\EventPackageClient;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class RegisteredUniversities extends Component
{
    use WithPagination;
    /**
     * @var \App\Models\General\Countries $country_data
     */
    protected string $paginationTheme = 'bootstrap';
    public ?string $country = null;
    public $country_data;
    public $status = '';
    public Fair $fair;

    protected $queryString = ['country' => ['except' => ''],'status' => ['except' => '']];
    protected $listeners = ['countryChanged','filterUniversitiesByInvitationStatus'];

    public function render()
    {
        $this->initData();
        $universities =  $this->loadUniversities();
        $this->dispatchEvents();
        return view('livewire.fairs.registered-universities',compact('universities'));
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

    public function filterUniversitiesByInvitationStatus($status){
        $this->resetPage();
        $this->status =  $status;
    }

    private function loadUniversities(): LengthAwarePaginator
    {
        $status = \AppConst::INVITATION_STATUSES_BY_KEY[$this->status] ?? "";
        $callback = SearchCallBack::run(country_id: $this->country_data?->id);
        $query = $this->fair->invitation();
        return $query->where('status', \AppConst::INVITATION_ACCEPTED)
            ->with(['university.country', 'university.rankingPositions','agent.country'])
            ->when(!empty($callback), fn(Builder $query) => $query->whereHas('university', $callback)->orWhereHas('agent',$callback))
            ->when($status != "", fn(Builder $query)=>$query->where('accepted_by_school',$status))
            ->paginate(30);

    }

    /**
     * @param Invitation $invitation
     * @return void
     */
    public function accepted(Invitation $invitation)
    {
        $invitation->accepted_by_school = \AppConst::REGISTARTION_ACCEPTED;
        $invitation->save();
//        if (!EventCreditTransaction::where([['event_id',$invitation->fair_id], ['credit_in',1],
//            ['agent_id',$invitation->agent_id], ['university_id',$invitation->university_id],])->exists()) {
//            return;
//        }
//
//        EventCreditTransaction::create([
//            'agent_id' => $invitation->agent_id,
//            'university_id' => $invitation->university_id,
//            'event_id' => $invitation->fair_id,
//            'credit_in' => 1,
//            'event_name' => 'Reverse Transaction after rejected by school']);
//        $institute = $invitation->university ?? $invitation->agent;
//        $institute->event_credit++;
//        $institute->save();
    }

    public function rejected(Invitation $invitation)
    {
        $invitation->accepted_by_school = \AppConst::REGISTARTION_REJECTED;
        $invitation->save();
        if (EventCreditTransaction::where([['event_id',$invitation->fair_id], ['credit_in',1],
            ['agent_id',$invitation->agent_id], ['university_id',$invitation->university_id],])->exists()) {
            return;
        }

        $institute = $invitation->university ?? $invitation->agent;
        $institute->event_credit++;
        $institute->save();

        $old_trans = EventCreditTransaction::where([['event_id',$invitation->fair_id], ['credit_out',1],
            ['agent_id',$invitation->agent_id], ['university_id',$invitation->university_id],])->latest()->first();

        EventCreditTransaction::create([
            'agent_id' => $invitation->agent_id,
            'university_id' => $invitation->university_id,
            'event_id' => $invitation->fair_id,
            'event_name' => 'Reverse Transaction after rejected by school',
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

    private function dispatchEvents()
    {
//        $this->emit('showRecords');
        $this->emit('goToTop');
    }
}
