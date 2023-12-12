<?php

namespace App\Actions\Fortify;

use App\Http\Livewire\HasPoints;
use App\Models\Institutes\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    use HasPoints;


    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     * @throws ValidationException
     */
    public function create(array $input)
    {
        $input = Validator::make($input, [
            //'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,filter', 'max:255', 'unique:users'],
            'country_id' => ['required'],
            'directorate_id' => ['sometimes'],
            'region_id' => ['sometimes'],
            'state_id' => ['sometimes'],
            'zone_id' => ['sometimes'],
            'city_id' => ['sometimes'],
            'address' => ['sometimes'],
            'school_id' => ['sometimes',Rule::requiredIf(fn()=>empty($input['school_id_searched']))],
            'national_id' => ['sometimes', 'nullable'],
            'school_type_id'=>['sometimes'],
            'school_id_searched'=>['sometimes',Rule::requiredIf(fn()=>empty($input['school_id']))],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->after(function ($validator) use ($input) {
            $school_id = $input['school_id'] ?: $input['school_id_searched'];

            if (empty($school_id)) {
                return;
            }

            $school = School::find($school_id);
            if (empty($school)) {
                return;
            }
            $school = School::whereId($school_id)->with('schoolAdmins.userBio')
                ->with(['schoolAdmins' => fn($q) =>
                $q->whereRelation('userRoles', 'role_id', \AppConst::SCHOOL_ADMINISTRATOR)
                    ->orWhereRelation('userRoles', 'role_id', \AppConst::SCHOOL_COUNSELOR)->with('userBio')
                ])
                ->first();
            if (empty($school)) return;
            $admin = $school->schoolAdmins?->first();
            /* @var User $admin*/
            if (!empty($admin)) {

                $name = $admin->name ?: $admin?->userBio?->full_name;
                $email = $admin?->email;
                $validator->errors()->add(
                    'school_id', '<span class="text-danger mt-2">' . __('School is already claimed by') . ' ' . $name . ' ' . __('and') . ' ' . $email . '.<span>
                        <a href="https://schoolsmaster.com/" target="_blank" class="btn btn-primary btn-sm custom-btn" style="background: #2c2f57 !important;" >' . __('Report this school to reclaim the profile') . '</a></span></span>'
                );
            }
        })->validate();

        $school_id = $input['school_id'] ?? $input['school_id_searched'];
        $school = School::find($school_id);
        $school_created = false;
        if (empty($school)) {
            $school = School::create([
                'institute_id' => 1,
                'school_name' => $school_id,
                'country_id' => $input['country_id'],
                'directorate_id' => $input['directorate_id'] ?? null,
                'region_id' => $input['region_id'] ?? null,
                'state_id' => $input['state_id'] ?? null,
                'zone_id' => $input['zone_id'] ?? null,
                'city_id' => $input['city_id'] ?? null,
                'address1' => $input['address'] ?? null,
                'national_id' => $input['national_id'] ?? null,
                'school_type_id' => $input['school_type_id'] ?? null,
            ]);
            $school_created = true;
        }
        $this->addPointsInTransactionForSchool($school, \AppConst::PT_SCHOOL_REGISTRATION_BONUS, 'school', $school->id);


        $userData = [
            'name' => '',
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => \AppConst::SCHOOL_ADMINISTRATOR,
            'campus_id' => $school->id,
        ];

        return DB::transaction(function () use ($input, $userData, $school, $school_created) {
            return tap(User::create($userData), function (User $user) use ($input, $school, $school_created) {
                $user->userBio()->create([
                    'user_id' => $user->id,
                    'country_id' => $input['country_id'],
                ]);
                $user->roles()->attach(\AppConst::SCHOOL_ADMINISTRATOR);
                $user->schools()->attach($school->id);
                if ($school_created) {
                    $school->update(['created_by' => $user->id]);
                }
            });
        });
    }
}
