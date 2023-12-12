<?php

namespace App\Http\Livewire\Students;

use App\Imports\ImportDummyData;
use App\Imports\Students\ImportStudents;
use App\Models\General\Countries;
use App\Models\General\Curriculum;
use App\Models\General\CurriculumBranch;
use App\Models\General\Grade;
use App\Models\General\StudyLevel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

use Livewire\WithPagination;

class AddBulkStudents extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public $file;
    public $newStudent_count = 0;
    public $existStudent_count = 0;
    public $invalidStudent_count = 0;

    public $exist_students = [];
    public $invalid_students = [];

    public $students_added_ids = [];

    public $fileName = '';

    protected function rules()
    {
        return [
            'file' => 'mimes:xlsx,xls',
        ];
    }

    public function updatedFile()
    {
        $this->fileName = $this->file->getClientOriginalName();
        $this->validate();
        $this->importData();
    }

    public function importData()
    {
        $this->resetCount();
        $this->validate();
        $nationalities = Countries::selectRaw('id,LOWER(country_name) as country_name')->pluck('id', 'country_name');
        $curriculums = Curriculum::selectRaw('id,LOWER(title) as title')->pluck('id', 'title');
        $grades = StudyLevel::selectRaw('id,LOWER(title) as title')->pluck('id', 'title');
        $curriculum_branches = CurriculumBranch::selectRaw('id,LOWER(title) as title')->pluck('id', 'title');

        $file_path = $this->file->path();
        $data = Excel::toCollection(new ImportDummyData, $file_path)[0];
        foreach ($data as $key => $student) {
            $student = $student->toArray();

            if (empty($student['student_email_address']) || empty($student['first_name'])) {
                $this->invalidStudent_count++;
                $this->invalid_students[] = $student;
                continue;
            }

            if (User::where('email', '=', trim($student['student_email_address']))->exists()) {
                $this->existStudent_count++;
                $this->exist_students[] = $student;
                continue;
            }
            $this->newStudent_count++;
            $password = '12345678';
            $user = User::create([
                'name' => $student['first_name'],
                'role_id' => \AppConst::STUDENT,
                'campus_id' => \Auth::user()->selected_school->id,
                'email' => trim($student['student_email_address']),
                'password' => Hash::make($password)
            ]);
            $nationality_id = null;
            $grade_id = null;
            $curriculum_id = null;
            $curriculum_branch_id = null;

            if (!empty($student['nationality'])) {
                $nationality_id = $nationalities[trim(\Str::lower($student['nationality']))] ?? null;
            }
            if (!empty($student['grade'])) {
                $grade_id = $grades[trim(\Str::lower($student['grade']))] ?? null;
            }
            if (!empty($student['curriculum'])) {
                $curriculum_id = $curriculums[trim(\Str::lower($student['curriculum']))] ?? null;
            }
            if (!empty($student['focus'])) {
                $curriculum_branch_id = $curriculum_branches[trim(\Str::lower($student['focus']))] ?? null;
            }
            $user->userBio()->create([
                'first_name' => $student['first_name'],
                'last_name' => $student['last_name'] ?? "",
                'mobile' => trim($student['phone_number']),
                'study_level_id' => $grade_id,
                'curriculum_id' => $curriculum_id,
                'curriculum_branch_id' => $curriculum_branch_id,
                'nationality_id' => $nationality_id,
                'national_id'=>trim($student['national_id'] ?? "")
            ]);
            if (!empty($student['parent_email_address']) || !empty($student['parent_phone_number'])) {
                $user->guardian()->create([
                    'email' => trim($student['parent_email_address']),
                    'mobile_number' => trim($student['parent_phone_number']),
                ]);
            }
            $user->roles()->attach(\AppConst::STUDENT);
            $this->students_added_ids [] = $user->id;
        }
        $this->file = null;
        unset($this->file);
        $this->fileName = '';
        session()->flash('status', 'Students uploaded Successfully!');

    }

    public function render()
    {
        $students = User::whereSelectedSchoolStudents()
            ->whereIn('id', $this->students_added_ids)
            ->with(['guardian', 'userBio.curriculum', 'userBio.studyLevel'])
            ->paginate(10);
        return view('livewire.students.add-bulk-students', compact('students'));
    }

    public function resetCount()
    {
        $this->newStudent_count = 0;
        $this->existStudent_count = 0;
        $this->exist_students = [];
        $this->invalid_students = [];
        $this->students_added_ids = [];
    }
}
