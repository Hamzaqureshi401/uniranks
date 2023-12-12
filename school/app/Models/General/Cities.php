<?php

namespace App\Models\General;

use App\Models\Institutes\Institute;
use App\Models\Institutes\University;
use App\Models\Traits\HasTranslations;
use App\Models\University\UniversityEvent;
use App\Models\Counselor\CounselorEvent;
use App\Models\User\UserBio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\General\Cities
 *
 * @property int $id
 * @property int|null $country_id
 * @property int|null $zone_id
 * @property int|null $state_id
 * @property string|null $city_name
 * @property array|null $translated_name
 * @property string|null $local_name
 * @property string|null $administrative_region
 * @property float|null $latitude
 * @property float|null $longitude
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $Universities
 * @property-read int|null $universities_count
 * @property-read UserBio|null $UserBio
 * @property-read \App\Models\General\AverageCityWeather|null $averageCityWeather
 * @property-read \App\Models\General\AverageLivingCost|null $averageLivingCost
 * @property-read \Illuminate\Database\Eloquent\Collection|CounselorEvent[] $counselorEvents
 * @property-read int|null $counselor_events_count
 * @property-read Institute|null $institute
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityEvent[] $universityEvents
 * @property-read int|null $university_events_count
 * @property-read \App\Models\General\CountryStateZone|null $zone
 * @method static \Illuminate\Database\Eloquent\Builder|Cities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cities query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereAdministrativeRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereCityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereLocalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereZoneId($value)
 * @mixin \Eloquent
 */
class Cities extends Model
{
    use HasTranslations;
    public $timestamps = false;
    protected $fillable = [
        'country_id',
        'city_name',
        'local_name',
        'administrative_region_id',
        'latitude',
        'longitude',
        'zone_id',
    ];

    public $translatable = ['translated_name'];

    public function zone(){
        return $this->belongsTo(CountryStateZone::class,'zone_id');
    }
    public function getCityNameAttribute($value){
        return $this->translated_name ?: $value;
    }
    public function institute()
    {
        return $this->hasOne(Institute::class, 'city_id');
    }

    public function Universities(): HasMany
    {
        return $this->hasMany(University::class, 'city_id');
    }

    public function UserBio(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserBio::class);
    }

    public function averageCityWeather(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AverageCityWeather::class, 'city_id');
    }

    public function averageLivingCost(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AverageLivingCost::class, 'city_id');
    }

    public function universityEvents(): HasMany
    {
        return $this->hasMany(UniversityEvent::class,'city_id');
    }

    /**
     * @return HasMany
     */
    public function counselorEvents(): HasMany
    {
        return $this->hasMany(CounselorEvent::class,'city_id');
    }
}
