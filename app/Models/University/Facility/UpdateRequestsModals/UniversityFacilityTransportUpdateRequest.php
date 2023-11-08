<?php

namespace App\Models\University\Facility\UpdateRequestsModals;

use App\Models\General\VehicleType;
use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Facility\UniversityFacilityTransportation;
use App\Models\University\UniversityTransportType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityFacility\UpdateRequestsModals\UniversityFacilityTransportUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $transport_type_id
 * @property int|null $vehicle_type_id
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
 * @property-read UniversityFacilityTransportation|null $originalData
 * @property-read User|null $requestedBy
 * @property-read University|null $university
 * @property-read UniversityTransportType|null $universityTransportType
 * @property-read UniversityTransportType|null $universityTransportTypeOld
 * @property-read VehicleType|null $vehicleType
 * @property-read VehicleType|null $vehicleTypeOld
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereTransportTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereVehicleTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 */
class UniversityFacilityTransportUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'vehicle_type_id',
        'transport_type_id',
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
        return $this->belongsTo(UniversityFacilityTransportation::class, 'related_record_id');
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
    public function universityTransportType(): BelongsTo
    {
        return $this->belongsTo(UniversityTransportType::class, 'transport_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function vehicleType(): BelongsTo
    {
        return $this->belongsTo(VehicleType::class);
    }
    /**
     * @return BelongsTo
     */
    public function universityTransportTypeOld(): BelongsTo
    {
        return $this->belongsTo(UniversityTransportType::class, 'old_value');
    }

    /**
     * @return BelongsTo
     */
    public function vehicleTypeOld(): BelongsTo
    {
        return $this->belongsTo(VehicleType::class,'old_value');
    }
}
