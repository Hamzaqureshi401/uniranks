<?php

namespace App\Models\University\Facility\UpdateRequestsModals;

use App\Casts\JsonIfArray;
use App\Models\General\Currency;
use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Facility\UniversityFacilityHousing;
use App\Models\University\UniversityHousingCategory;
use App\Models\University\UniversityHousingLocationType;
use App\Models\University\UniversityHousingTerm;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityFacility\UpdateRequestsModals\UniversityFacilityHousingUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $category_id
 * @property string|null $name
 * @property float|null $charges
 * @property int|null $currency_id
 * @property int|null $term_id
 * @property int|null $location_type_id
 * @property string|null $location_link
 * @property string|null $description
 * @property array|null $services
 * @property int|null $related_record_id
 * @property mixed|null $old_value
 * @property string|null $what_changed
 * @property int $status
 * @property string|null $remarks
 * @property int $type add,update,delete
 * @property int $requested_by_id
 * @property int $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $approvedBy
 * @property-read Currency|null $currency
 * @property-read Currency|null $currencyOld
 * @property-read UniversityHousingCategory|null $housingCategory
 * @property-read UniversityHousingCategory|null $housingCategoryOld
 * @property-read UniversityHousingLocationType|null $housingLocation
 * @property-read UniversityHousingLocationType|null $housingLocationOld
 * @property-read UniversityHousingTerm|null $housingTerm
 * @property-read UniversityHousingTerm|null $housingTermOld
 * @property-read UniversityFacilityHousing|null $originalData
 * @property-read User|null $requestedBy
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereCharges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereLocationLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereLocationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereServices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereTermId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 */
class UniversityFacilityHousingUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'name',
        'charges',
        'currency_id',
        'category_id',
        'term_id',
        'location_type_id',
        'location_link',
        'description',
        'services',
        'related_record_id', 'old_value', 'what_changed',
        'status',
        'remarks',
        'type',
        'requested_by_id',
        'approved_by_id'
    ];
    protected $guarded = ['id'];

    protected $casts = [
        'services' => 'array',
        'old_value' => JsonIfArray::class,
        'created_at' => "datetime:Y-m-d H:i:s",
        'updated_at' => "datetime:Y-m-d H:i:s",
    ];
    /**
     * @return BelongsTo
     */
    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by_id');
    }

    /**
     * @return BelongsTo
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    /**
     * @return BelongsTo
     */
    public function originalData(): BelongsTo
    {
        return $this->belongsTo(UniversityFacilityHousing::class, 'related_record_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
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

    /**
     * @return BelongsTo
     */
    public function currencyOld(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'old_value');
    }

    /**
     * @return BelongsTo
     */
    public function housingTermOld(): BelongsTo
    {
        return $this->belongsTo(UniversityHousingTerm::class, 'old_value');
    }

    /**
     * @return BelongsTo
     */
    public function housingLocationOld(): BelongsTo
    {
        return $this->belongsTo(UniversityHousingLocationType::class, 'old_value');
    }

    /**
     * @return BelongsTo
     */
    public function housingCategoryOld(): BelongsTo
    {
        return $this->belongsTo(UniversityHousingCategory::class, 'old_value');
    }
}
