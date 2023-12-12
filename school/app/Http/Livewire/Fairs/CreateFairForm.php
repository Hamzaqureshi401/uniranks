<?php

namespace App\Http\Livewire\Fairs;

use App\Http\Livewire\HasPoints;
use App\Models\Fairs\Fair;
use App\Models\Fairs\FairEditHistory;
use App\Models\Fairs\FairInvitedContact;
use App\Models\Fairs\FairType;
use App\Models\General\Gender;
use App\Models\Institutes\University;
use App\Notifications\Fair\InviteContactToFairNotification;
use Livewire\Component;

class CreateFairForm extends Component
{
    use HasPoints;

    public $fair_name;
    public $max;
    public $type;
    public $start_date;
    public $end_date;

    public $fair_types;
    public $school;
    public $genders;
    public ?Fair $fair;
    public $title;

    public function mount()
    {
        $this->fair_types = FairType::all();
        $this->school = \Auth::user()->selected_school;
        $this->school->load(['g_12_fee_range', 'curriculum']);
        $this->genders = Gender::all();
        $this->setData();
        $this->title = (!empty($this->fair) ? 'Edit' : 'Start New') . ' Fair - Fair Details';
    }

    public function render()
    {
        return view('livewire.fairs.create-fair-form');
    }

    protected function rules()
    {
        return [
            'fair_name' => [''],
            'type' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required', 'after_or_equal:start_date'],
            'max' => ['required'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function setData()
    {
        if (empty($this->fair)) {
            $this->fair = null;
        }
        $this->type = $this->fair?->type;
        $this->fair_name = $this->fair?->fair_name;
        $this->max = $this->fair?->max;
        $this->start_date = $this->fair?->start_date;
        $this->end_date = $this->fair?->end_date;
    }

    public function resetForm()
    {
        $this->redirect(route('admin.school.fair.list'));
    }

    /**
     * @param bool $close
     * @return void
     */
    public function save(bool $close = false): void
    {
        $validatedData = $this->validate();
        if (!empty($this->fair)) {
            $this->update($validatedData, $close);
            return;
        }
        $this->createNew($validatedData, $close);
    }

    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function createNew(array $validatedData, bool $close): void
    {
        $school = \Auth::user()->selected_school;
        $validatedData['school_id'] = $school->id;
        $validatedData['event_type_id'] = \AppConst::FAIR;
        $this->fair = Fair::create($validatedData);
        $this->fair->history()->create(['details' => $validatedData, 'operation_type' => FairEditHistory::OPERATION_ADD]);
        $this->addPointsInTransactionForSelectedSchool(\AppConst::PT_CREATE_UNIVERSITY_FAIR, \AppConst::PT_EARNED_FOR_EVENT, $this->fair->id);
        session()->flash('status', 'Fair Created Successfully!');
        $this->fair->refresh();
        $this->setData();
        $this->sendEmails();
        $this->emit('saved');
        if (!$close) {
            return;
        }
        $this->redirectAfterSuccess();
    }

    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function update(array $validatedData, bool $close): void
    {
        if ($this->fair->is_approved) {
            $this->createUpdateFairRequest($validatedData, $close);
            return;
        }

        $this->updateFairDetails($validatedData, $close);
    }


    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function updateFairDetails(array $validatedData, bool $close): void
    {
        $this->fair->update($validatedData);
        $history = $this->fair->history()->first();
        $history->update(['details' => $validatedData]);
        session()->flash('status', 'Fair Details Updated!');
        $this->emit('saved');
        $this->fair->refresh();
        if (!$close) {
            return;
        }
        $this->redirectAfterSuccess();
    }

    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function createUpdateFairRequest(array $validatedData, bool $close): void
    {
        $validatedData ['requested_by'] = \Auth::id();
        $this->fair->editRequests()->create(['details' => $validatedData]);
        session()->flash('status', 'Fair Update Request Added, Our Team will review it shortly!.');
        $this->emit('saved');
        if (!$close) return;
        $this->redirectAfterSuccess();
    }

    /**
     * @return void
     */
    private function redirectAfterSuccess(): void
    {
        $this->redirect(route('admin.school.fair.list'));
    }

    private function sendEmails()
    {
        //TODO REMOVE AFTER SENDGRID ISSUE RESLOVED
        return;
//        if (\App::isLocal()) return;
        $universities = University::whereCountryId(\Auth::user()->selected_school->country_id)
            ->with('admin', fn($q) => $q->whereIn('role_id', [\AppConst::UNIVERSITY_ADMINISTRATOR, \AppConst::UNIVERSITY_REPRESENTATIVE]))
            ->withCount(['admin' => fn($q) => $q->where('role_id', \AppConst::UNIVERSITY_ADMINISTRATOR)])
            ->where(fn($q) => $q->whereNotNull('email')->orWhereHas('admin', fn($q) => $q->whereIn('role_id', [\AppConst::UNIVERSITY_ADMINISTRATOR, \AppConst::UNIVERSITY_REPRESENTATIVE])))
            ->get();
        if (!$universities->isEmpty()) {
            $template_payload = $this->getTemplatePayload();
            $data = [];
            foreach ($universities as $university) {

                if (!$university?->admin_count) {
                    $template_payload['button_url'] = "https://uniadmin.uniranks.com/register";
                    $invitee['email'] = $university->email;
                } else {
                    $template_payload['button_url'] = "https://unirep.uniranks.com";
                    $invitee['email'] = $university->admin->first()->email;
                }

                if (empty($invitee['email'])) continue;
                $invitee['event_id'] = $this->fair->id;
                $invitee['user_id'] = \Auth::id();
                $invitee['name'] = $university->university_name;
                $template_payload['invited_contact_name'] = $invitee['name'];
                $template_payload['invited_contact_email'] = $invitee['email'];
                $template_payload['invited_body'] = $university->university_name;

                $data[] = $template_payload;
                $user = FairInvitedContact::create($invitee);
                $user->notify(new InviteContactToFairNotification($template_payload));
            }
        }
    }

    protected function getTemplatePayload(): array
    {
        $fair = Fair::whereId($this->fair->id)
            ->with(['eventType', 'school.country', 'school.city', 'school.country', 'school.g_12_fee_range', 'school.curriculum'])
            ->first();
        return [
            'Invitation_body' => '',
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
            'button_url' => url('/'),
        ];
    }

}
