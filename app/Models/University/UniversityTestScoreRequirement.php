<?php

namespace App\Models\University;

use App\Models\General\TestScoreType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\University\UniversityTestScoreRequirement
 *
 * @property int $id
 * @property int $test_requirement_id
 * @property int $test_score_type_id
 * @property string|null $required_score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read TestScoreType|null $testScoreType
 * @property-read \App\Models\University\UniversityTestingRequirement|null $universityTestRequirement
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestScoreRequirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestScoreRequirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestScoreRequirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestScoreRequirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestScoreRequirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestScoreRequirement whereRequiredScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestScoreRequirement whereTestRequirementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestScoreRequirement whereTestScoreTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTestScoreRequirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityTestScoreRequirement extends Model
{
    use HasFactory;

    protected $fillable = ['test_requirement_id','test_score_type_id','required_score'];

    function universityTestRequirement(): BelongsTo
    {
        return $this->belongsTo(UniversityTestingRequirement::class,'test_requirement_id');
    }
    function testScoreType(): BelongsTo
    {
        return $this->belongsTo(TestScoreType::class,'test_score_type_id');
    }
}
