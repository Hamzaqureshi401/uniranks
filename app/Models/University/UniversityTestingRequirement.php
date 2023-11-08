<?php

namespace App\Models\University;

use App\Models\General\Degree;
use App\Models\General\Test;
use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\University\UniversityTestingRequirement
 *
 * @property int $id
 * @property int $university_id University Id
 * @property int|null $degree_id
 * @property int $test_id
 * @property string|null $required_grades
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Degree|null $degree
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\University\UniversityTestScoreRequirement[] $requiredScoreTypes
 * @property-read int|null $required_score_types_count
 * @property-read Test|null $requiredTest
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestingRequirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestingRequirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestingRequirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestingRequirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestingRequirement whereDegreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestingRequirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestingRequirement whereRequiredGrades($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestingRequirement whereTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestingRequirement whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestingRequirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityTestingRequirement extends Model
{
    use HasFactory;

    protected $fillable = ['university_id', 'test_id', 'required_grades','degree_id'];

    public function requiredTest()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    public function requiredScoreTypes(): HasMany
    {
        return $this->hasMany(UniversityTestScoreRequirement::class,'test_requirement_id');
    }

    public function degree(){
        return $this->belongsTo(Degree::class,'degree_id');
    }
}
