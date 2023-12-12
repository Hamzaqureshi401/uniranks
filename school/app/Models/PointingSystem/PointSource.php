<?php

namespace App\Models\PointingSystem;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\PointingSystem\PointSource
 *
 * @property int $id
 * @property string $title
 * @property array|null $translated_name json data: {"en":"...","ar":"..."}
 * @property string|null $short_description
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PointingSystem\PointType[] $pointTypes
 * @property-read int|null $point_types_count
 * @method static \Illuminate\Database\Eloquent\Builder|PointSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|PointSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointSource whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointSource whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointSource whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointSource whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointSource whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PointSource extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['translated_name'];
    protected $fillable = ['title', 'short_description', 'description', 'translated_name'];

    /**
     * @return HasMany
     */
    public function pointTypes(): HasMany
    {
        return $this->hasMany(PointType::class, 'source_id');
    }
}
