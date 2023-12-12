<?php

namespace App\Models\General;

use App\Models\Institutes\School;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\General\CountryState
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $country_id
 * @property int|null $country_region_id
 * @property string|null $name
 * @property string|null $local_name
 * @property array|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\Cities[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\General\Countries|null $country
 * @property-read \App\Models\General\CountryDirectorateRegion|null $region
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $schools
 * @property-read int|null $schools_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\CountryStateZone[] $zones
 * @property-read int|null $zones_count
 * @method static \Illuminate\Database\Eloquent\Builder|CountryState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryState newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryState query()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryState whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryState whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryState whereCountryRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryState whereLocalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryState whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryState whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryState whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CountryState extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['translated_name'];
    protected $fillable = ['code','country_id','country_region_id','name','translated_name','local_name','country_region_id'];

    public function cities(): HasMany
    {
        return $this->hasMany(Cities::class,'state_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Countries::class,'country_id');
    }

    public function schools(): HasMany
    {
        return $this->hasMany(School::class,'state_id');
    }

    public function region(){
        return $this->belongsTo(CountryDirectorateRegion::class,'country_region_id');
    }

    public function zones(){
        return $this->hasMany(CountryStateZone::class,'stat_id');
    }
}
