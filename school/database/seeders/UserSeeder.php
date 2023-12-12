<?php

namespace Database\Seeders;

use App\Imports\ImportDummyData;
use App\Models\Fairs\Fair;
use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\General\Curriculum;
use App\Models\General\FeeRange;
use App\Models\General\Major;
use App\Models\General\StudyLevel;
use App\Models\Institutes\University;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UserSeeder extends Seeder
{
    /*
   *
   * DELETE FROM user_bios where user_id in (SELECT id FROM users where remarks = 'Dummy Student')
   * DELETE FROM user_roles where user_id in (SELECT id FROM users where remarks = 'Dummy Student')
   * DELETE FROM user_majors where user_id in (SELECT id FROM users where remarks = 'Dummy Student')
   * DELETE FROM user_study_destinations where user_id in (SELECT id FROM users where remarks = 'Dummy Student')
   * DELETE FROM user_possible_universities where user_id in (SELECT id FROM users where remarks = 'Dummy Student')
   * DELETE FROM users where remarks = 'Dummy Student'
   * */

    protected function deleteOldDummyData(){
        $usersQ  = User::select('id')->whereRemarks('Dummy Student');
        User\UserBio::whereIn('user_id',$usersQ)->delete();
        User\UserMajor::whereIn('user_id',$usersQ)->delete();
        User\UserStudyDestination::whereIn('user_id',$usersQ)->delete();
        User\UserPossibleUniversity::whereIn('user_id',$usersQ)->delete();
        User::whereRemarks('Dummy Student')->delete();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->deleteOldDummyData();
        $schools = [682, 683, 1];
        $command = $this->command;
        $progress = $command->getOutput()->createProgressBar(3);
        $command->comment("Inserting Data!");
        $feeRanges = FeeRange::pluck('id');
        $curriculums = Curriculum::pluck('id');
        $destinations = ['16','15','117','122','160','87'];
        $countries = Countries::pluck('id');
        $grades = StudyLevel::pluck('id');
        $majors = Major::limit(10)->pluck('id');
        $fairs = Fair::pluck('id');
        foreach ($schools as $school) {
            $progress->advance();
            $progress2 = $command->getOutput()->createProgressBar(200);
            for ($i = 1; $i <= 200; $i++) {
                $progress2->advance();
                $select_data = \Arr::random(['All', 'uni', 'country', 'major']);
                $select_fee_range = \Arr::random([0, 1]);
                $select_curriculum = \Arr::random([0, 1]);
                $has_event = \Arr::random([0, 1]);
                $profile_completion_status = \Arr::random([0, 1, 2, 3, 4, 5, 6, 7, 8, 9]);
                $register_by_app = \Arr::random([1,0]);
                $user_universities = [];
                $user_majors = [];
                $user_countries = [];

                for ($j = 1; $j <= 5; $j++) {
                    if ($select_data == 'All' || $select_data == 'major') {
                        $user_majors[] = $majors->random();
                    }

                    if ($select_data == 'All' || $select_data == 'country') {
                        $user_countries[] = \Arr::random($destinations);
                    }
                }

                $universities = University::whereIn('country_id',$user_countries)->limit(20)->pluck('id')->toArray();
                for ($j = 1; $j <= 5; $j++) {
                    if (($select_data == 'All' || $select_data == 'uni') && !empty($universities)){
                        $user_universities[] = \Arr::random($universities);
                    }
                }

                $country_id = $countries->random();
                $nationality_id = $countries->random();
                $study_level_id = $grades->random();
                $cities = Cities::whereCountryId($country_id)->pluck('id')->toArray();
                $city_id = null;
                if (!empty($cities)) {
                    $city_id = \Arr::random($cities);
                }
                $faker = Factory::create();
                $student_name = $faker->name;

                $user = User::create([
                    'role_id' => \AppConst::STUDENT,
                    'campus_id' => $school,
                    'name' => $student_name ?? "No Name",
                    'profile_photo_path' => 'images/users-profile-photos/' . $i . '.png',
                    'email' => $faker->email,
                    'register_by_app' => $register_by_app,
                    'remarks' => 'Dummy Student'
                ]);
                if ($has_event) {
                    $user->attendedFairs()->attach([$fairs->random()]);
                }
                $user->userBio()->create([
                    'first_name' => $student_name,
                    'curriculum_id' => $select_curriculum == 1 ? $curriculums->random() : null,
                    'fee_range_id' => $select_fee_range == 1 ? $feeRanges->random() : null,
                    'country_id' => $country_id,
                    'city_id' => $city_id,
                    'nationality_id' => $nationality_id,
                    'study_level_id' => $study_level_id,
                    'profile_completion_status' => $profile_completion_status,
                ]);
                $user->majors()->attach($user_majors);
                $user->preferredUniversities()->attach($user_universities);
                $user->studyDestinations()->attach($user_countries);
            }
            $progress2->finish();
        }

        $progress->finish();
    }

}
