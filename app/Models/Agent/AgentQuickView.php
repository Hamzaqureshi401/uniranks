<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentQuickView
 *
 * @property int $id
 * @property int $agent_id
 * @property int|null $free_of_charges
 * @property int|null $requirements_support
 * @property int|null $application_submission
 * @property int|null $application_follow_up
 * @property int|null $education_counselling
 * @property int|null $free_online_assessment
 * @property int|null $career_counselling
 * @property int|null $language_coaching
 * @property int|null $scholarship support
 * @property int|null $student_visa_processing
 * @property int|null $pre-departure_support
 * @property int|null $on_arrival_support
 * @property int|null $accommodation_support
 * @property int|null $course_change
 * @property int|null $college_change
 * @property int|null $hostel_change
 * @property int|null $professional_year_program
 * @property int|null $internship_support
 * @property int|null $work_while_studying_support
 * @property int|null $since_year
 * @property int|null $no_offices Operate from number of offices
 * @property int|null $in_no_countries In Number of countries
 * @property int|null $no_employees By Number of employees
 * @property int|null $no_languages Speak Number of languages
 * @property int|null $no_students Helped Number of students
 * @property int|null $no_universities more then number of universities
 * @property int|null $across_no_countries across In Number of countries
 * @property int|null $no_courses Gain entry into  Number of courses
 * @property int|null $update_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereAccommodationSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereAcrossNoCountries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereApplicationFollowUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereApplicationSubmission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereCareerCounselling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereCollegeChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereCourseChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereEducationCounselling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereFreeOfCharges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereFreeOnlineAssessment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereHostelChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereInNoCountries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereInternshipSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereLanguageCoaching($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereNoCourses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereNoEmployees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereNoLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereNoOffices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereNoStudents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereNoUniversities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereOnArrivalSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView wherePreDepartureSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereProfessionalYearProgram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereRequirementsSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereScholarshipSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereSinceYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereStudentVisaProcessing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereUpdateById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuickView whereWorkWhileStudyingSupport($value)
 * @mixin \Eloquent
 * @property int|null $scholarship support
 * @property int|null $scholarship support
 * @property int|null $scholarship support
 * @property int|null $scholarship support
 * @property int|null $scholarship support
 * @property int|null $scholarship support
 * @property int|null $scholarship support
 * @property int|null $scholarship support
 * @property int|null $scholarship_support
 * @property int|null $pre_departure_support
 */
class AgentQuickView extends Model
{
    use HasFactory;
}
