<?php

namespace App\Http\Livewire\Sponsored;

use App\Models\School\SchoolSponsoredEvent;
use App\Models\School\SchoolSponsoredEventOffer;
use Livewire\Component;

class SponsoredEventDetails extends Component
{
    public SchoolSponsoredEvent $event;
    public ?SchoolSponsoredEventOffer $university_offer = null;
    public $openOffersModel=false;
    public $offer_amount;
    protected $listeners = ['onModelClose'];

    protected function rules(){
        return [
            'offer_amount'=>['required','numeric','min:1', 'max:'.$this->event->amount]
        ];
    }


    public function mount(){
        $this->event->load(['school.g_12_fee_range','school.curriculum','createdByUser'])
            ->loadMax('offers as max_offer','amount')->loadCount('offers');
    }
    public function render()
    {
        $this->university_offer = $this->event->offers()->where('university_id',\Auth::user()->selected_university->id)->first();
        return view('livewire.sponsored.sponsored-event-details');
    }

    public function onModelClose(){
        $this->closeOfferModel();
    }
    public function makeAnOffer(){
        $this->resetErrorBag();
        $this->offer_amount = $this->university_offer?->amount;
        $this->openOffersModel=true;
    }

    public function closeOfferModel(){
        $this->offer_amount = null;
        $this->openOffersModel = false;
    }

    public function saveOffer(){
        $this->validate();
        if (!empty($this->university_offer)){
            $this->updateOffer();
            $this->closeOfferModel();
            return;
        }
        $this->createNewOffer();
        $this->closeOfferModel();
        return;
    }

    private function createNewOffer(){
        $this->event->offers()->create([
            'university_id'=>\Auth::user()->selected_university->id,
            'amount'=>$this->offer_amount,
            'offered_by'=>\Auth::id()
        ]);
    }

    private function updateOffer(){
        $this->university_offer->update(['amount'=>$this->offer_amount,'status'=>\AppConst::PENDING]);
    }


}
