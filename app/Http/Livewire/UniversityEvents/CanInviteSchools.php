<?php

namespace App\Http\Livewire\UniversityEvents;

use App\Models\Institutes\School;
use App\Models\University\UniversityEvent;

trait CanInviteSchools
{
    public function getSchoolsCount(){
        return School::whereFeesGrade12($this->fee_range)->whereIn('curriculum_id',$this->curriculums)->count();
    }

    public function inviteSchools(UniversityEvent $event): void
    {
        //TODO FOR UPDATES DONT CREATE NEW RECORDS
        $schools = School::whereFeesGrade12($this->fee_range)
            ->whereIn('curriculum_id',$this->curriculums)
            ->pluck('id')
            ->toArray();
        $event->invitedSchool()->sync($schools);
    }
}
