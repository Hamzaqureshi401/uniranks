<?php

namespace App\Http\Livewire\School;

use App\Helpers\Helpers;
use App\Models\Fairs\Fair;
use App\Models\Fairs\FairInvitedContact;
use App\Models\Institutes\University;
use App\Models\Notifications\Notification;
use App\Notifications\Fair\InviteContactToFairNotification;
use Illuminate\Validation\Rule;
use Livewire\Component;
use NotificationChannels\SendGrid\Exceptions\CouldNotSendNotification;
use SendGrid;
use SendGrid\Mail\TypeException;
class SendEventInvitation extends Component
{
    public $fairs;
    public $selected_fair_id;
    public $intro = '';
    public $contacts;
    public $invitiees = [];

    public function mount()
    {
        $this->fairs = \Auth::user()->selected_school->fairs()->upcoming()->with(['eventType', 'school'])->get();
        $this->addInvitee();
    }

    public function addInvitee()
    {
        $this->invitiees[] = ['name' => '', 'email' => ''];
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function rules()
    {
        return [
            'selected_fair_id' => ['required'],
            'intro' => ['required'],
            'invitiees' => ['present', 'array'],
            'invitiees.*' => ['required'],
            'invitiees.*.email' => ['required', 'email'],
            'contacts' => ['present', Rule::requiredIf(empty($this->invitiees))]
        ];
    }

    protected function validationAttributes()
    {
        return [
            'selected_fair_id' => "Fair Name",
            'invitiees.*.name' => "Contact Name",
            'invitiees.*.email' => "Contact Email",
        ];
    }

    protected function messages()
    {
        return [
            'selected_fair_id.required' => "Please select a :attribute",
        ];
    }

    public function sendInvitation()
    {
        $this->resetErrorBag();
        $validated = $this->validate();
        $this->extractContactsFromTest();
        $template_payload = $this->getTemplatePayload();
        $data = [];
        foreach ($this->invitiees as $invitee) {
            if (empty($invitee['email']) || FairInvitedContact::whereEmail($invitee['email'])->whereEventId($this->selected_fair_id)->exists()) {
                continue;
            }

            $university = University::where('university_name', $invitee['name'])
                ->with('admin', fn($q) => $q->where('email', $invitee['email'])->where('role_id', \AppConst::UNIVERSITY_REPRESENTATIVE)
                )->withCount(['admin' => fn($q) => $q->where('role_id', \AppConst::UNIVERSITY_ADMINISTRATOR)])->first();
            if (empty($university)) {
                $template_payload['button_url'] = "https://uniadmin.uniranks.com/register-university";
            } else if (!$university->admin_count) {
                $template_payload['button_url'] = "https://uniadmin.uniranks.com/register";
            } else if ($university->admin->isEmpty()) {
                $template_payload['button_url'] = \URL::signedRoute('getLoginInfo', ['university' => $university->id]);
            } else {
                $template_payload['button_url'] = "https://unirep.uniranks.com";
            }


            $invitee['event_id'] = $this->selected_fair_id;
            $invitee['user_id'] = \Auth::id();
            $user = FairInvitedContact::create($invitee);
            $template_payload['invited_contact_name'] = $invitee['name'];
            $template_payload['invited_contact_email'] = $invitee['email'];
            $template_payload['invited_body'] = $university?->university_name;
            $data [] = $template_payload;
            $this->sendMail($invitee['email'],$template_payload);
        }
        $this->resetForm();
        session()->flash('status', 'Invitation Sent Successfully!');
    }

    /**
     * @throws TypeException
     * @throws CouldNotSendNotification
     */
    public function sendMail($to, $template_data){
        //TODO REMOVE AFTER SENDGRID ISSUE RESLOVED
        return;
        $mail = new SendGrid\Mail\Mail();
        $mail->setTemplateId('d-24c1655975dc419b9f21f6bff4254b64');//d-24c1655975dc419b9f21f6bff4254b64
        $mail->addDynamicTemplateDatas($template_data);
        $mail->addTo($to);
        $mail->setFrom('admin@uniranks.com');
        $sendGrid =  new SendGrid(config('services.sendgrid.api_key'));
        $response =  $sendGrid->send($mail);
        if ($response->statusCode() < 200 || $response->statusCode() >= 300) {
            throw CouldNotSendNotification::serviceRespondedWithAnError(
                $response->body()
            );
        }
    }

    public function resetForm()
    {
        $this->invitiees = [];
        $this->intro = '';
        $this->selected_fair_id = '';
        $this->contacts = '';
        $this->addInvitee();
    }

    protected function extractContactsFromTest()
    {
        if (!empty($this->contacts)) {
            $invitees = collect(\Str::of($this->contacts)->trim()->explode(';')->toArray());
            $invitees->filter(fn($item) => !empty($item))->transform(function ($item) {
                $contact = \Str::of($item)->trim()->squish()->explode('-')->toArray();
                return ['name' => trim($contact[0]), 'email' => trim($contact[1])];
            })->each(fn($item) => $this->invitiees[] = $item);
        }
    }

    protected function getTemplatePayload(): array
    {
        $fair = Fair::whereId($this->selected_fair_id)
            ->with(['eventType', 'school.country', 'school.city', 'school.country', 'school.g_12_fee_range', 'school.curriculum'])
            ->first();
        return [
            'Invitation_body' => $this->intro,
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
        ];
    }

    public function render()
    {
        return view('livewire.school.send-event-invitation');
    }
}
