<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\General\Test
 *
 * @property int $id
 * @property int|null $type_id
 * @property string|null $title
 * @property string|null $score_from
 * @property string|null $score_to
 * @property string|null $description
 * @property string|null $short_description
 * @property array|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $required_score
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\TestScoreType[] $requiredScoreTypes
 * @property-read int|null $required_score_types_count
 * @property-read \App\Models\General\TestType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|Test newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test query()
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereScoreFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereScoreTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Test extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['translated_name'];
    protected $fillable = ['type_id', 'title', 'score_from', 'score_to', 'description', 'short_description', 'translated_name'];
    protected $appends = ['required_score'];

    public function getRequiredScoreAttribute()
    {
        return $this->score_from . "-" . $this->score_to;
    }

    public function type()
    {
        return $this->belongsTo(TestType::class, 'type_id');
    }

    public function requiredScoreTypes(): BelongsToMany
    {
        return $this->belongsToMany(TestScoreType::class, TestRequiredScoreType::class, 'test_id', 'test_score_type_id')->withPivot(['score_from', 'score_to']);
    }
}
