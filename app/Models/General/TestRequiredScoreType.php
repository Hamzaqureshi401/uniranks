<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\TestRequiredScoreType
 *
 * @property int $id
 * @property int $test_id
 * @property int $test_score_type_id
 * @property string|null $score_from
 * @property string|null $score_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $required_score
 * @method static \Illuminate\Database\Eloquent\Builder|TestRequiredScoreType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestRequiredScoreType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestRequiredScoreType query()
 * @method static \Illuminate\Database\Eloquent\Builder|TestRequiredScoreType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestRequiredScoreType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestRequiredScoreType whereScoreFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestRequiredScoreType whereScoreTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestRequiredScoreType whereTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestRequiredScoreType whereTestScoreTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestRequiredScoreType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TestRequiredScoreType extends Model
{
    use HasFactory;

    protected $fillable = ['test_id', 'test_score_type_id', 'score_from', 'score_to'];

    protected $appends = ['required_score'];

    public function getRequiredScoreAttribute()
    {
        return $this->score_from . "-" . $this->score_to;
    }

}
