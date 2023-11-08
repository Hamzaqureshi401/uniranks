<?php

namespace App\Models\University\Facility;

use App\Models\General\Currency;
use App\Models\Institutes\University;
use App\Models\Multimedia\Media;
use App\Models\Traits\HasTranslations;
use App\Models\University\UniversityHousingCategory;
use App\Models\University\UniversityHousingLocationType;
use App\Models\University\UniversityHousingServices;
use App\Models\University\UniversityHousingTerm;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\University\Facility\UniversityFacilityHousing
 *
 * @property int $id
 * @property int $university_id
 * @property int $category_id
 * @property string $name
 * @property float $charges
 * @property int $currency_id
 * @property int $term_id
 * @property int $location_type_id
 * @property string|null $location_link
 * @property array|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image
 * @property array|null $translated_name
 * @property int $number_of_rooms
 * @property int|null $student_capacity Number of students
 * @property float $charges_type 0->Advance, 1->instalments
 * @property string|null $video_url
 * @property string|null $panorama_url
 * @property int|null $status
 * @property int|null $created_by_id
 * @property-read User|null $createdBy
 * @property-read Currency|null $currency
 * @property-read \Illuminate\Support\Collection $services
 * @property-read UniversityHousingCategory|null $housingCategory
 * @property-read UniversityHousingLocationType|null $housingLocation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\University\Facility\UniversityFacilityHousingServices> $housingServices
 * @property-read int|null $housing_services_count
 * @property-read UniversityHousingTerm|null $housingTerm
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read University|null $university
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityHousingServices> $universityHousingServices
 * @property-read int|null $university_housing_services_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereCharges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereChargesType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereLocationLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereLocationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereNumberOfRooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing wherePanoramaUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereStudentCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereTermId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousing whereVideoUrl($value)
 * @property-read bool $is_disabled
 * @property-read bool $is_enabled
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\University\Facility\UniversityFacilityHousingServices> $housingServices
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityHousingServices> $universityHousingServices
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\University\Facility\UniversityFacilityHousingServices> $housingServices
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityHousingServices> $universityHousingServices
 * @mixin \Eloquent
 */
class UniversityFacilityHousing extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name','description'];
    protected $fillable = [
        'university_id',
        'name',
        'charges',
        'currency_id',
        'category_id',
        'term_id',
        'location_type_id',
        'university_housing_term_id',
        'university_housing_location_type_id',
        'location_link',
        'description',
        'translated_name',
        'number_of_rooms',
        'student_capacity',
        'charges_type',
        'video_url','panorama_url',
        'created_by_id','status'
    ];


    protected $guarded = ['id','services'];
    protected $appends = ['is_enabled','is_disabled'];


    public function getIsEnabledAttribute(): bool
    {
        return $this->status == \AppConst::ENABLED;
    }

    public function getIsDisabledAttribute(): bool
    {
        return $this->status == \AppConst::DISABLED;
    }
    public function getServicesAttribute(): \Illuminate\Support\Collection
    {
        return $this->housingServices->pluck('service_id');
    }


    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    /**
     * @return HasMany
     */
    public function housingServices(): HasMany
    {
        return $this->hasMany(UniversityFacilityHousingServices::class, 'housing_id');
    }

    /**
     * @return BelongsToMany
     */
    public function universityHousingServices(): BelongsToMany
    {
        return $this->belongsToMany(UniversityHousingServices::class, UniversityFacilityHousingServices::class,'housing_id','service_id');
    }

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    /**
     * @return BelongsTo
     */
    public function housingTerm(): BelongsTo
    {
        return $this->belongsTo(UniversityHousingTerm::class, 'term_id');
    }

    /**
     * @return BelongsTo
     */
    public function housingLocation(): BelongsTo
    {
        return $this->belongsTo(UniversityHousingLocationType::class, 'location_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function housingCategory(): BelongsTo
    {
        return $this->belongsTo(UniversityHousingCategory::class, 'category_id');
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediaable');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by_id');
    }

}
