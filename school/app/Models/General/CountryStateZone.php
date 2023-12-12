<?php

namespace App\Models\General;

use App\Models\Institutes\School;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\CountryStateZone
 *
 * @property int $id
 * @property int|null $country_state_id
 * @property string|null $code
 * @property string|null $short_name
 * @property string $name
 * @property array|null $translated_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\Cities[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\General\Countries|null $country
 * @property-read array $translations
 * @property-read \App\Models\General\CountryState|null $state
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $zone
 * @property-read int|null $zone_count
 * @method static \Illuminate\Database\Eloquent\Builder|CountryStateZone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryStateZone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryStateZone query()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryStateZone whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryStateZone whereCountryStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryStateZone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryStateZone whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryStateZone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryStateZone whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryStateZone whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryStateZone whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryStateZone whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CountryStateZone extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['translated_name'];
    protected $fillable = ['country_id','country_state_id','name', 'description', 'translated_name'];

    public function country(){
        return $this->belongsTo(Countries::class,'country_id');
    }

    public function state(){
        return $this->belongsTo(CountryState::class,'country_state_id');
    }

    public function cities(){
        return $this->hasMany(Cities::class,'zone_id');
    }

    public function zone(){
        return $this->hasMany(School::class,'zone_id');
    }
}
