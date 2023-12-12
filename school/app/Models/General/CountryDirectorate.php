<?php

namespace App\Models\General;

use App\Models\Institutes\School;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\CountryDirectorate
 *
 * @property int $id
 * @property int $country_id
 * @property string|null $code
 * @property string|null $short_name
 * @property string $name
 * @property array|null $translated_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\General\Countries|null $country
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\CountryDirectorateRegion[] $regions
 * @property-read int|null $regions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $schools
 * @property-read int|null $schools_count
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorate query()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorate whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorate whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorate whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorate whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorate whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDirectorate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CountryDirectorate extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['translated_name'];
    protected $fillable = ['country_id', 'name', 'description', 'translated_name'];

    public function country(){
        return $this->belongsTo(Countries::class,'country_id');
    }

    public function regions(){
        return $this->hasMany(CountryDirectorateRegion::class,'country_directorate_id');
    }

    public function schools(){
        return $this->hasMany(School::class,'directorate_id');
    }
}
