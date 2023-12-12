<?php

namespace App\Models\General;

use App\Models\Institutes\School;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\CountryDirectorateRegion
 *
 * @property int $id
 * @property int|null $country_id
 * @property int|null $country_directorate_id
 * @property string|null $code
 * @property string|null $short_name
 * @property string $name
 * @property array|null $translated_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\General\CountryDirectorate|null $directorate
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $region
 * @property-read int|null $region_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\CountryState[] $states
 * @property-read int|null $states_count
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion whereCountryDirectorateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorateRegion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CountryDirectorateRegion extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['translated_name'];
    protected $fillable = ['country_directorate_id', 'name', 'description', 'translated_name'];


    public function directorate()
    {
        return $this->belongsTo(CountryDirectorate::class, 'country_directorate_id');
    }

    public function states(){
        return $this->hasMany(CountryState::class,'country_region_id');
    }

    public function region(){
        return $this->hasMany(School::class,'region_id');
    }
}
