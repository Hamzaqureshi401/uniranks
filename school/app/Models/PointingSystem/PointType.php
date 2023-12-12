<?php

namespace App\Models\PointingSystem;

use App\Models\Institutes\School;
use App\Models\School\SchoolPointHistory;
use App\Models\School\SchoolPointSource;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\PointingSystem\PointType
 *
 * @property int $id
 * @property int|null $source_id Point Source Id
 * @property string $title
 * @property float|null $points
 * @property array|null $translated_name json data: {"en":"...","ar":"..."}
 * @property string|null $short_description
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PointingSystem\PointTransaction[] $history
 * @property-read int|null $history_count
 * @property-read \App\Models\PointingSystem\PointSource|null $source
 * @method static \Illuminate\Database\Eloquent\Builder|PointType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PointType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointType wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointType whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointType whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PointType extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];

    protected $fillable = ['title', 'short_description', 'description', 'points','source_id'];

    public function history(): HasMany
    {
        return $this->hasMany(PointTransaction::class, 'point_type_id');
    }

    public function source(){
        return $this->belongsTo(PointSource::class,'source_id');
    }
}
