<?php

namespace App\Http\Livewire\Schools\Fairs;

use App\Models\Fairs\Fair;
use App\Models\Fairs\FairReserveSessionRequest;
use App\Models\Fairs\FairSession;
use Livewire\Component;

class CareerTalkDetails extends Component
{

    use ProcessFairInvitation;
    public Fair $fair;
    public $no_majors;

    public $sessions;
    public function mount(){
        $this->fair
            ->load(['school'=>['country','city','curriculum','g_12_fee_range'], 'eventType','fairType'])
            ->loadCount(['sessions']);
        $this->no_majors = FairSession::whereFairId($this->fair->id)->distinct()->count('major_id');
        $this->loadEventsCredit();
    }
    public function render()
    {
        $uni_id = \Auth::user()->selected_university->id;
        $this->sessions = $this->fair->sessions()
            ->with('major')
            ->with('reservationRequests',fn($q)=>$q->where('university_id',$uni_id))
            ->get();
        return view('livewire.schools.fairs.career-talk-details');
    }

    public function requestBooking(FairSession $session){
        $session->reservationRequests()->create([
            'university_id'=>\Auth::user()->selected_university?->id,
            'requested_by'=>\Auth::id()
        ]);
        $title = $session->fair->fair_name;
        $description = "$title Slot booking in career talk for ".$session->major?->title;
        $this->removeCredit(description: $description);
    }
    public function withdrawBookingRequest(FairReserveSessionRequest $request){
        $session = $request->session()->with(['major','fair'])->first();
        $title = $session->fair->fair_name;
        $description = "Revers Credit From: $title Slot booking in career talk for ".$session->major?->title;
        $this->addCredit(description: $description);
        $request->delete();
    }

    public function cancelBooking(FairSession $session){
        $title = $session->fair->fair_name;
        $description = "Revers Credit From: $title Slot booking in career talk for ".$session->major?->title;
        $this->addCredit(description: $description);
        $session->university_id = null;
        $session->save();
    }
}
