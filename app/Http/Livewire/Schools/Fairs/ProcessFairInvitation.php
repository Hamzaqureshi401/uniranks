<?php

namespace App\Http\Livewire\Schools\Fairs;

use App\Models\Fairs\Fair;
use App\Models\Fairs\Invitation;
use App\Models\Institutes\University;
use App\Models\Transactions\EventCreditTransaction;
use NotificationChannels\SendGrid\Exceptions\CouldNotSendNotification;
use NotificationChannels\SendGrid\SendGridMessage;
use SendGrid;
use SendGrid\Mail\TypeException;

trait ProcessFairInvitation
{
    public $events_credit = 0;
    public $ev_cr;

    public function acceptFair($fair_id)
    {
        Invitation::updateOrCreate(['fair_id' => $fair_id, 'university_id' => \Auth::user()->selected_university?->id], ['status' => \AppConst::INVITATION_ACCEPTED]);
        $this->removeCredit($fair_id);
        $this->setCredit();
        $this->emit('returnResponseModal',[ 
        'title'=>'Joining Fair',
            'message'=>'Fair has been join.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
    }

    public function setCredit(){
        $campus = \Auth::user()->selected_university->fresh();
        $this->ev_cr = $campus->event_credit;
        $this->emit('creditsUpdated', $this->ev_cr);
       
    }

    private function removeCredit($fair_id=null,$description=null): void
    {
        $campus = \Auth::user()->selected_university;
        $this->events_credit--;
        $campus->event_credit = $this->events_credit;
        $campus->save();
        
        $this->refreshCredits();
        EventCreditTransaction::create(['university_id' => $campus->id, 'event_id' => $fair_id,'event_name'=>$description, 'credit_out' => 1, 'by_user_id' => \Auth::id()]);
        $this->emit('returnResponseModal',[
        'title'=>'Remove Credit',
            'message'=>'Credit has been removed.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
    }
    private function addCredit($fair_id=null,$description=null): void
    {
        $campus = \Auth::user()->selected_university;
        $this->events_credit++;
        $campus->event_credit = $this->events_credit;
        $campus->save();
        $this->refreshCredits();
        EventCreditTransaction::create(['university_id' => $campus->id, 'event_id' => $fair_id,'event_name'=>$description, 'credit_out' => 0, 'credit_in' => 1, 'by_user_id' => \Auth::id()]);
        $this->emit('returnResponseModal',[
        'title'=>'Credit Added',
            'message'=>'Credit has been added.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
    }

    public function rejectFair($fair_id)
    {
        $invitation = Invitation::whereFairId($fair_id)->whereUniversityId(\Auth::user()->selected_university->id)->first();
        if (!empty($invitation)){
            $invitation->update(['status' => \AppConst::INVITATION_REJECTED]);
            $this->addCredit($fair_id);;
        }else{
            Invitation::create(['fair_id' => $fair_id, 'university_id' => \Auth::user()->selected_university->id,'status' => \AppConst::INVITATION_REJECTED]);
        }
        $this->setCredit();
        $this->emit('returnResponseModal',[
        'title'=>'Fair Rejected',
            'message'=>'Fair has been rejected.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
    }

    public function loadEventsCredit()
    {
        $this->events_credit = \Auth::user()->selected_university->event_credit;
    }

    public function refreshCredits()
    {
        $this->emit('refresh-credits');
    }

    /**
     * @throws TypeException
     * @throws CouldNotSendNotification
     */
    public function sendMail($fair_id)
    {
        $fair = Fair::whereId($fair_id)
            ->with(['eventType', 'school.country', 'school.city', 'school.country', 'school.g_12_fee_range', 'school.curriculum'])
            ->first();
        $mail = new SendGrid\Mail\Mail();
        $mail->setTemplateId('d-24c1655975dc419b9f21f6bff4254b64');
        $mail->addDynamicTemplateDatas([
            'Invitation_body' => 'This mail From University side confrming the join fair',
            'event_name' => ($fair->fair_name ?? $fair->school->school_name) . $fair->eventType?->name,
            'event_date' => \Helpers::dayDateTimeFormat($fair->start_date),
            'country' => $fair->school->country?->country_name ?? 'N/A',
            'city' => $fair->school->city?->city_name ?? 'N/A',
            'location' => $fair->school->address1 ?? 'N/A',
            'fair_type' => $fair->fairType?->fair_type_name ?? 'In Campus',
            'grade_11_students' => $fair->school->number_grade11 ?? 'N/A',
            'grade_12_students' => $fair->school->number_grade12 ?? 'N/A',
            'grade_12_fee' => $fair->school->g_12_fee_range?->currency_range ?? 'N/A',
            'school_curriculums' => $fair->school->curriculum?->title ?? 'N/A',
            'map_location' => $fair->school->map_link ?? 'N/A',
            'button_url' => 'https://unirep.uniranks.com',
            'invited_contact_name' => 'Faizan Shakir',
            'invited_contact_email' => 'mr.shakir117@gmail.com',
            'invited_body' => 'Mazajnet'
        ]);
        $mail->addTo('mr.shakir117@gmail.com');
        $mail->setFrom(config('mail.from.address'));
        $sendGrid = new SendGrid(config('services.sendgrid.api_key'));
        $response = $sendGrid->send($mail);
        if ($response->statusCode() < 200 || $response->statusCode() >= 300) {
            throw CouldNotSendNotification::serviceRespondedWithAnError(
                $response->body()
            );
        }
    }

}
