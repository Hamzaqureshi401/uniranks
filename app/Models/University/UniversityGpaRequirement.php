<?php

namespace App\Models\University;

use App\Models\General\Degree;
use App\Models\General\GradeScale;
use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityGpaRequirement
 *
 * @property int $id
 * @property int $university_id University Id
 * @property int|null $degree_id
 * @property int $grade_scale_id
 * @property string|null $required_grades
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Degree|null $degree
 * @property-read GradeScale|null $gradeScale
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityGpaRequirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityGpaRequirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityGpaRequirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityGpaRequirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityGpaRequirement whereDegreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityGpaRequirement whereGradeScaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityGpaRequirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityGpaRequirement whereRequiredGrades($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityGpaRequirement whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityGpaRequirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityGpaRequirement extends Model
{
    use HasFactory;

    protected $fillable = ['university_id','grade_scale_id','required_grades','degree_id'];

    public function gradeScale(){
        return $this->belongsTo(GradeScale::class,'grade_scale_id');
    }
    public function university(){
        return $this->belongsTo(University::class,'university_id');
    }
    public function degree(){
        return $this->belongsTo(Degree::class,'degree_id');
    }

}
