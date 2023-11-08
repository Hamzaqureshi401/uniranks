<?php

namespace App\Models\University\Facility\UpdateRequestsModals;

use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Facility\UniversityFacilityStudentLife;
use App\Models\University\UniversityClubType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityFacility\UpdateRequestsModals\UniversityFacilityStudentLifeUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $club_type_id
 * @property string|null $club_name
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
 * @property-read UniversityFacilityStudentLife|null $originalData
 * @property-read User|null $requestedBy
 * @property-read University|null $university
 * @property-read UniversityClubType|null $universityClubType
 * @property-read UniversityClubType|null $universityClubTypeOld
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereClubName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereClubTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLifeUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 */
class UniversityFacilityStudentLifeUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'club_type_id',
        'club_name',
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
        return $this->belongsTo(UniversityFacilityStudentLife::class, 'related_record_id');
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
    public function universityClubType(): BelongsTo
    {
        return $this->belongsTo(UniversityClubType::class, 'club_type_id');
    }
    /**
     * @return BelongsTo
     */
    public function universityClubTypeOld(): BelongsTo
    {
        return $this->belongsTo(UniversityClubType::class, 'old_value');
    }
}
