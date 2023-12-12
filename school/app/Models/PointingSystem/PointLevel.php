<?php

namespace App\Models\PointingSystem;

use App\Models\General\Countries;
use App\Models\Institutes\School;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\PointingSystem\PointLevel
 *
 * @property int $id
 * @property string $title
 * @property array|null $translated_name
 * @property float|null $rate_per_point
 * @property string|null $short_description
 * @property string|null $description
 * @property string|null $min_cash_out_amount
 * @property string|null $max_cash_out_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Countries[] $countries
 * @property-read int|null $countries_count
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $schools
 * @property-read int|null $schools_count
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel whereMaxCashOutAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel whereMinCashOutAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel whereRatePerPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PointLevel extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];
    protected $fillable = ['title','rate_per_point','min_cash_out_amount','max_cash_out_amount','short_description','description','translated_name'];

    public function schools(): HasMany
    {
        return $this->hasMany(School::class,'point_level_id');
    }

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Countries::class,PointLevelCountry::class,'point_level_id','country_id')->withPivot(['rate_per_point','country_id','point_level_id']);
    }
}
