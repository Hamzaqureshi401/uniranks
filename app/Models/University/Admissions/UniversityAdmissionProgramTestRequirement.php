<?php

namespace App\Models\University\Admissions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\Admissions\UniversityAdmissionProgramTestRequirement
 *
 * @property int $id
 * @property int $program_id University Admission Program Id
 * @property int $test_id
 * @property string|null $required_grades
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramTestRequirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramTestRequirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramTestRequirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramTestRequirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramTestRequirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramTestRequirement whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramTestRequirement whereRequiredGrades($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramTestRequirement whereTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramTestRequirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityAdmissionProgramTestRequirement extends Model
{
    use HasFactory;

    protected $fillable = ['program_id','test_id','required_grades'];

}
