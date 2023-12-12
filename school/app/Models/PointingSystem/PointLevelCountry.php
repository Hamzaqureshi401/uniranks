<?php

namespace App\Models\PointingSystem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PointingSystem\PointLevelCountry
 *
 * @property int $id
 * @property int $country_id
 * @property int $point_level_id
 * @property float|null $rate_per_point
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevelCountry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevelCountry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevelCountry query()
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevelCountry whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevelCountry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevelCountry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevelCountry wherePointLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevelCountry whereRatePerPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointLevelCountry whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PointLevelCountry extends Model
{
    use HasFactory;

    protected $fillable = ['country_id','rate_per_point','point_level_id'];
}
