<?php

namespace Database\Seeders;

use App\Http\Livewire\HasPoints;
use App\Models\Fairs\Fair;
use App\Models\Institutes\School;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddPointsForFair extends Seeder
{
    use HasPoints;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = School::with('fairs', 'users.majors', 'users.studyDestinations', 'users.preferredUniversities')->get();
        foreach ($schools as $school) {
            /** @var School $school */
            $this->addPointsInTransactionForSchool($school, \AppConst::PT_SCHOOL_REGISTRATION_BONUS, 'school', $school->id);
            foreach ($school->fairs ?? [] as $fair) {
                /** @var Fair $fair */
                $type = $fair->event_type_id == 1 ? \AppConst::PT_CREATE_UNIVERSITY_FAIR : \AppConst::PT_CREATE_CAREER_TALK;
                $this->addPointsInTransactionForSchool($school, $type, \AppConst::PT_EARNED_FOR_EVENT, $fair->id);
            }

            foreach ($school->users ?? [] as $user) {
                /** @var User $user */

                if (studentProfileCompleted($user)) {
                    $points = [\AppConst::PT_STUDENT_REGISTRATION, \AppConst::PT_STUDENT_BUDGET, \AppConst::PT_STUDENT_MAJORS, \AppConst::PT_STUDENT_POSSIBLE_UNIVERSITIES, \AppConst::PT_STUDENT_DESTINATIONS];
                    $this->addPointsInTransactionForSchoolBulkSameEarnedFor($school, $points, \AppConst::PT_EARNED_FOR_STUDENT, $user->id);
                }
            }
        }
    }
}
