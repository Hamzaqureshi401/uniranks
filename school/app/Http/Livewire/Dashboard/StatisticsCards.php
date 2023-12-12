<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\General\Countries;
use App\Models\General\Major;
use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class StatisticsCards extends Component
{
    public $statistics = [];
    public $students_total;

    public $school;

    public function mount()
    {
        $this->school = \Auth::user()->selected_school;
        $school_id = $this->school->id;
        $student_g_11 = intval($this->school->number_grade11);
        $student_g_12 = intval($this->school->number_grade12);
        $this->students_total = $this->school->total_students;
        $student_attended_fair = $this->userBaseQuery()->has('attendedFairs')->count();
        $registered_students = $this->userBaseQuery()->count();
        $student_g_11_count = $this->userBaseQuery()->whereRelation('userBio', 'study_level_id', \AppConst::GRADE_11)->count();
        $student_g_12_count = $this->userBaseQuery()->whereRelation('userBio', 'study_level_id', \AppConst::GRADE_12)->count();

        $this->statistics = [
            //row
            [
                [
                    'title' => 'Registrations',
                    'count' => $registered_students,
                    'students' => $registered_students,
                    'total_students'=>$this->students_total,
                    'url'=>route('admin.school.statistics.registrations.list'),
                ],
                [
                    'title' => 'Majors',
                    'count' => Major::whereRelation('students', 'campus_id', $school_id)->count(),
                    'students' => $this->userBaseQuery()->has('majors')->count(),
                    'total_students'=>$this->students_total,
                    'url'=>route('admin.school.statistics.majors.studentList'),
                ],
                [
                    'title' => 'Universities',
                    'count' => University::whereRelation('students', 'campus_id', $school_id)->count(),
                    'students' => $this->userBaseQuery()->has('preferredUniversities')->count(),
                    'total_students'=>$this->students_total,
                    'url'=>route('admin.school.statistics.universities.studentList'),
                ],
                [
                    'title' => 'Destinations',
                    'count' => Countries::whereRelation('students', 'campus_id', $school_id)->count(),
                    'students' => $this->userBaseQuery()->has('studyDestinations')->count(),
                    'total_students'=>$this->students_total,
                    'url'=>route('admin.school.statistics.destinations.studentList'),
                ],
                [
                    'title' => 'Applications',
                    'count' => 0,
                    'students' => 0,
                    'total_students'=>$this->students_total,
                    'url'=>'javascript:void(0)',
                ]
            ],
            //row
            [
                [
                    'title' => 'School Events',
                    'count' => $this->school->fairs()->count(),
                    'students' => $student_attended_fair,
                    'total_students'=>$this->students_total,
                    'url'=>route('admin.school.fair.list'),
                ],
                [
                    'title' => 'University Events',
                    'count' => $this->school->universityEvents()->count(),
                    'students' => $this->userBaseQuery()->has('attendedUniversityEvents')->count(),
                    'total_students'=>$this->students_total,
                    'url'=>'javascript:void(0)',
                ],
                [
                    'title' => 'Grade 11',
                    'count' => $student_g_11,
                    'students' => $student_g_11_count,
                    'total_students'=>$student_g_11,
                    'url'=>route('admin.school.students.list'),
                ],
                [
                    'title' => 'Grade 12',
                    'count' => $student_g_12,
                    'students' => $student_g_12_count,
                    'total_students'=> $student_g_12,
                    'url'=>route('admin.school.students.list'),
                ],
                [
                    'title' => 'Attendance',
                    'count' => $student_attended_fair,
                    'students' => $student_attended_fair,
                    'total_students'=>$this->students_total,
                    'url'=>'javascript:void(0)',
                ]
            ],
            //row
            [
                [
                    'title' => 'Total SM Credit',
                    'count' => $this->school->pointsHistory()->sum('points_in'),
                    'students' => 0,
                    'total_students'=>$this->students_total,
                    'url'=>route('admin.school.schoolPoints.creditDetail'),
                ],
                [
                    'title' => 'School Cr.',
                    'count' => $this->school->pointsHistory()
                        ->whereRelation('pointType', 'source_id', \AppConst::SM_POINT_TYPE_SCHOOL_EVENTS)
                        ->sum('points_in'),
                    'students' => 0,
                    'total_students'=>$this->students_total,
                    'url'=>route('admin.school.schoolPoints.schoolActivity'),
                ],
                [
                    'title' => 'University Cr.',
                    'count' => $this->school->pointsHistory()
                        ->whereRelation('pointType', 'source_id', \AppConst::SM_POINT_TYPE_UNIVERSITY_EVENTS)
                        ->sum('points_in'),
                    'students' => 0,
                    'total_students'=>$this->students_total,
                    'url'=>route('admin.school.schoolPoints.universityActivity'),
                ],
                [
                    'title' => 'Students Cr.',
                    'count' => $this->school->pointsHistory()
                        ->whereRelation('pointType', 'source_id', \AppConst::SM_POINT_TYPE_STUDENT_ACTIVITY)
                        ->sum('points_in'),
                    'students' => 0,
                    'total_students'=>$this->students_total,
                    'url'=>route('admin.school.schoolPoints.studentActivity'),
                ],
                [
                    'title' => 'Enrollment Cr.',
                    'count' => $this->school->pointsHistory()
                        ->whereRelation('pointType', 'source_id', \AppConst::SM_POINT_TYPE_ENROLLMENT_CREDIT)
                        ->sum('points_in'),
                    'students' => 0,
                    'total_students'=>$this->students_total,
                    'url'=>'javascript:void(0)',
                ]
            ],
        ];
    }

    /**
     * @return Builder|User
     */
    protected function userBaseQuery(): \Illuminate\Database\Eloquent\Builder|User
    {
        return User::whereSelectedSchoolStudents();
    }

    public function render()
    {
        return view('livewire.dashboard.statistics-cards');
    }
}
