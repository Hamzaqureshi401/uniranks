<?php

namespace App\Http\Livewire\Schools\Fairs;

use App\Models\Fairs\Fair;
use App\Models\Fairs\Invitation;
use Livewire\Component;

class FairDetails extends Component
{
    use ProcessFairInvitation;

    public Fair $fair;

    public function mount(){
        $this->fair->load([
            'school'=>['country','city','curriculum','g_12_fee_range'],
            'eventType','fairType'])->loadCount('confirmedUniversities');
        $this->loadEventsCredit();
    }
    public function render()
    {
        $this->fair->load(['invitation'=>fn($q)=>$q->where('university_id',\Auth::user()->selected_university->id)]);
        return view('livewire.schools.fairs.fair-details');
    }

/**
* Dear ,{{representative_name}}
{{school_name}} invited you to participate in their {{fair_type}} "{{fair_name}}", please find full detail below.
 * Fair Name: {{fair_name }}
Fair Date and Time: {{fair_date_time}}
Country: {{country}}
City: {{city}}
Location: {{location}}
Universities can attend this fair: {{number_universities}}
Fair Type: {{fair_type}}
Number of Grade 12 Students: {{grade_12_students}}
Number of Grade 11 Students: {{grade_11_students }}
Grade 12 Fee: {{grade_12_fee}}
School Curriculums: {{school_curriculums}}
Map Location: {{map_location}}
 *
 * or click use this URL :{{ insert button_url 'default=default' }}
 *
 * Template ID: d-c845941f4d994ee9bca1b52408718a50
 */


}
