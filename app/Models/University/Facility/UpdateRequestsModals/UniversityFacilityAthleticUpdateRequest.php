<?php

namespace App\Models\University\Facility\UpdateRequestsModals;

use App\Models\General\SportsName;
use App\Models\General\SportsType;
use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Facility\UniversityFacilityAthletic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityFacility\UpdateRequestsModals\UniversityFacilityAthleticUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $sports_type_id
 * @property int|null $sports_name_id
 * @property string|null $description
 * @property int|null $related_record_id
 * @property string|null $old_value
 * @property string|null $what_changed
 * @property int $status
 * @property string|null $remarks
 * @property int $type add,update,delete
 * @property int $requested_by_id
 * @property int|null $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $approvedBy
 * @property-read UniversityFacilityAthletic|null $originalData
 * @property-read User|null $requestedBy
 * @property-read SportsName|null $sportsName
 * @property-read SportsName|null $sportsNameOld
 * @property-read SportsType|null $sportsType
 * @property-read SportsType|null $sportsTypeOld
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereSportsNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereSportsTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthleticUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 */
class UniversityFacilityAthleticUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'sports_type_id',
        'sports_name_id',
        'description',
        'related_record_id', 'old_value', 'what_changed',
        'status',
        'remarks',
        'type',
        'requested_by_id',
        'approved_by_id'
    ];
    protected $guarded = ['id'];

    protected $casts = [
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
        return $this->belongsTo(UniversityFacilityAthletic::class, 'related_record_id');
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
    public function sportsType(): BelongsTo
    {
        return $this->belongsTo(SportsType::class, 'sports_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function sportsName(): BelongsTo
    {
        return $this->belongsTo(SportsName::class, 'sports_name_id');
    }
    /**
     * @return BelongsTo
     */
    public function sportsTypeOld(): BelongsTo
    {
        return $this->belongsTo(SportsType::class, 'old_value');
    }

    /**
     * @return BelongsTo
     */
    public function sportsNameOld(): BelongsTo
    {
        return $this->belongsTo(SportsName::class, 'old_value');
    }
}
