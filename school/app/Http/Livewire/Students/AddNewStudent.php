<?php

namespace App\Http\Livewire\Students;

use App\Http\Livewire\HasPoints;
use App\Models\General\Countries;
use App\Models\General\Curriculum;
use App\Models\General\FeeRange;
use App\Models\General\StudyFunding;
use App\Models\Institutes\School;
use App\Models\Institutes\University;
use App\Models\User;
use App\Models\General\Major;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class AddNewStudent extends Component
{
    use WithPagination;
    use HasPoints;

    public $all_majors;
    public $all_destinations;
    public $all_universities;
    public $all_fundings;
    public $all_fee_rages;

    public $first_name;
    public $last_name;
    public $birthday;
    public $fee_range;
    public $country_code;
    public $mobile;
    public $email;
    public $study_fundings;

    public $user_destinations = [];
    public $user_majors = [];
    public $user_universities = [];


    public function mount()
    {
        $this->all_majors = Major::orderBy('title')->get();
        $this->all_destinations = Countries::whereHas('Universities')->orderBy('country_name')->get();
        $this->all_fundings = StudyFunding::orderBy('funding_source')->get();
        $this->school = \Auth::user()->selected_school;
        $this->all_fee_rages = FeeRange::all();
        $this->setData();
        $this->loadUniversities();
    }

    public function setData()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->birthday = '';
        $this->fee_range = '';
        $this->country_code = '';
        $this->mobile = '';
        $this->email = '';
        $this->study_fundings = '';
        $this->user_destinations = [];
        $this->user_majors = [];
        $this->user_universities = [];
    }

    public function render()
    {
        return view('livewire.students.add-new-student');
    }

    /**
     * @param bool $close
     * @return void
     */
    public function save(bool $close = false): void
    {
        $today = Carbon::now()->toDateString();
        $this->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'birthday' => ['required', "before:{$today}"],
            'fee_range' => ['required'],
            'country_code' => ['required'],
            'mobile' => ['required', 'numeric', 'digits:9'],
            'email' => ['required', 'string', 'email:rfc,filter', 'max:255', 'unique:users'],
            'study_fundings' => ['required'],
            'user_majors' => ['required', 'array', 'between:1,5'],
            'user_universities' => ['array'],
            'user_destinations' => ['array'],
        ]);
        $this->createNew($close);
    }

    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function createNew(bool $close): void
    {
        $password = '12345678';
        $create_user = [
            'name' => $this->first_name . ' ' . $this->last_name,
            'email' => $this->email,
            'campus_id' => \Auth::user()->selected_school->id,
            'role_id' => \AppConst::STUDENT,
            'password' => Hash::make($password)
        ];

        $create_user_bio = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birthday' => $this->birthday,
            'mobile' => $this->mobile,
            'mobile_country_id' => $this->country_code,
            'study_fundings' => $this->study_fundings,
            'fee_range_id' => $this->fee_range
        ];
        $user = User::create($create_user);
        $points = [\AppConst::PT_STUDENT_REGISTRATION];

        $user->userBio()->create($create_user_bio);
        if (!empty($this->fee_range)) {
            $points[]=\AppConst::PT_STUDENT_BUDGET;
        }
        if (count($this->user_majors)) {
            $points[]=\AppConst::PT_STUDENT_MAJORS;
            $user->majors()->sync($this->user_majors);
        }

        if (count($this->user_universities)) {
            $points[]=\AppConst::PT_STUDENT_POSSIBLE_UNIVERSITIES;
            $user->preferredUniversities()->sync($this->user_universities);
        }

        if (count($this->user_destinations)) {
            $points[]=\AppConst::PT_STUDENT_DESTINATIONS;
            $user->studyDestinations()->sync($this->user_destinations);
        }

        $this->addPointsInTransactionForSelectedSchoolBulkSameEarnedFor($points,\AppConst::PT_EARNED_FOR_STUDENT, $user->id);
        $user->roles()->attach(\AppConst::STUDENT);


        $this->setData();

        session()->flash('status', 'Student Created Successfully!');
        $this->emit('saved');
        if ($close) {
            $this->redirectStudentList();
        }
    }

    public function redirectStudentList(): void
    {
        $this->redirect(route('admin.school.students.list'));
    }

    public function loadUniversities()
    {
        $this->all_universities = University::whereIn('country_id', $this->user_destinations)->orderBy('university_name')->get();
    }
}
