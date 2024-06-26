<?php

namespace App\Models\General;

use App\Models\Fairs\Fair;
use App\Models\Institutes\University;
use App\Models\Traits\HasTranslations;
use App\Models\University\UniversityEvent;
use App\Models\User;
use App\Models\Counselor\CounselorEvent;
use App\Models\User\UserStudyDestination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Institutes\School;

/**
 * App\Models\General\Countries
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $continent_id_1
 * @property int|null $continent_id_2
 * @property int|null $continent_id_3
 * @property int|null $subcontinent_id_1
 * @property int|null $subcontinent_id_2
 * @property int|null $subcontinent_id_3
 * @property string|null $country_code
 * @property string|null $country_name
 * @property array|null $translated_name
 * @property string|null $local_name
 * @property string|null $url
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $flag
 * @property string|null $map
 * @property string|null $language
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $Universities
 * @property-read int|null $universities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\Cities[] $cities
 * @property-read int|null $cities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|CounselorEvent[] $counselorEvents
 * @property-read int|null $counselor_events_count
 * @property-read mixed $flag_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\Language[] $languages
 * @property-read int|null $languages_count
 * @property-read \App\Models\General\Continents|null $region
 * @property-read \App\Models\General\Continents|null $region_2
 * @property-read \App\Models\General\Continents|null $region_3
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $schools
 * @property-read int|null $schools_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\CountryState[] $states
 * @property-read int|null $states_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $students
 * @property-read int|null $students_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityEvent[] $universityEvents
 * @property-read int|null $university_events_count
 * @method static \Illuminate\Database\Eloquent\Builder|Countries newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Countries newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Countries query()
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereContinentId1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereContinentId2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereContinentId3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereLocalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereSubcontinentId1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereSubcontinentId2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereSubcontinentId3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereUrl($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User\UserBio> $userBios
 * @property-read int|null $user_bios_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $users
 * @property-read int|null $users_count
 * @mixin \Eloquent
 */
class Countries extends Model
{
    use HasTranslations;
    public $timestamps = false;
    protected $fillable = [
        'code',
        'continent_id_1',
        'continent_id_2',
        'continent_id_3',
        'subcontinent_id_1',
        'subcontinent_id_2',
        'subcontinent_id_3',
        'country_code',
        'country_name',
        'local_name',
        'url',
        'latitude',
        'longitude',
        'flag',
        'map',
        'translated_name'
    ];

    public $translatable = ['translated_name'];
    public $appends = ['flag_url'];

    public function getFlagUrlAttribute(){
        return \AppConst::FLAGS."/".$this->flag;
    }

    public function getCountryNameAttribute($value){
        return $this->translated_name ?: $value;
    }

    /**
     * @return HasMany
     */
    public function cities(): HasMany
    {
        return $this->hasMany(Cities::class, 'country_id');
    }

    public function states(): HasMany
    {
        return $this->hasMany(CountryState::class,'country_id');
    }

    public function Universities(): HasMany
    {
        return $this->hasMany(University::class, 'country_id');
    }

    /**
     * @return BelongsToMany
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, CountryLanguage::class,'country_id','language_id');
    }

    /**
     * @return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Continents::class,'continent_id_1');
    }

    /**
     * @return BelongsTo
     */
    public function region_2(): BelongsTo
    {
        return $this->belongsTo(Continents::class,'continent_id_2');
    }

    /**
     * @return BelongsTo
     */
    public function region_3(): BelongsTo
    {
        return $this->belongsTo(Continents::class,'continent_id_3');
    }

    public function schools()
    {
        return $this->hasMany(School::class , 'country_id' , 'id');
    }

    public function fairs(){
        return $this->hasManyThrough(Fair::class,School::class,'country_id','school_id');
    }
    /**
     * @return BelongsToMany
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, UserStudyDestination::class,  'country_id','user_id');
    }


    public function universityEvents(): HasMany
    {
        return $this->hasMany(UniversityEvent::class,'country_id');
    }

    /**
     * @return HasMany
     */
    public function counselorEvents(): HasMany
    {
        return $this->hasMany(CounselorEvent::class,'country_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,User\UserBio::class,'country_id','user_id');
    }

    public function userBios(): HasMany
    {
        return $this->hasMany(User\UserBio::class,'country_id');
    }
}
