<?php

namespace App\Models\University\Admissions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\Admissions\UniversityAdmissionProgramGpaRequirement
 *
 * @property int $id
 * @property int $program_id University Admission Program Id
 * @property int $grade_scale_id
 * @property string|null $required_grades
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramGpaRequirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramGpaRequirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramGpaRequirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramGpaRequirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramGpaRequirement whereGradeScaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramGpaRequirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramGpaRequirement whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramGpaRequirement whereRequiredGrades($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramGpaRequirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityAdmissionProgramGpaRequirement extends Model
{
    use HasFactory;
    protected $fillable = ['program_id','grade_scale_id','required_grades'];
}
