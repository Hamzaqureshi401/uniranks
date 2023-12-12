<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\General\CurriculumBranch
 *
 * @property int $id
 * @property int|null $curriculum_id
 * @property string $title
 * @property string|null $short_description
 * @property string|null $description
 * @property string|null $translated_name translations in json
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\General\Curriculum|null $curriculum
 * @method static \Illuminate\Database\Eloquent\Builder|CurriculumBranch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CurriculumBranch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CurriculumBranch query()
 * @method static \Illuminate\Database\Eloquent\Builder|CurriculumBranch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurriculumBranch whereCurriculumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurriculumBranch whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurriculumBranch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurriculumBranch whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurriculumBranch whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurriculumBranch whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurriculumBranch whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CurriculumBranch extends Model
{
    use HasFactory;

    protected $fillable = ['curriculum_id','title','description','short_description','translated_name'];

    public function curriculum(): BelongsTo
    {
        return $this->belongsTo(Curriculum::class,'curriculum_id');
    }
}
