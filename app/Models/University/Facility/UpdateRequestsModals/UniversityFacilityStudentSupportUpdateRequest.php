<?php

namespace App\Models\University\Facility\UpdateRequestsModals;

use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Facility\UniversityFacilityStudentSupport;
use App\Models\University\UniversitySupportOfficeType;
use App\Models\UniversityFacility\UniversityFacilityStudentSupportImages;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityFacility\UpdateRequestsModals\UniversityFacilityStudentSupportUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $office_type_id
 * @property string|null $support_name
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
 * @property-read UniversityFacilityStudentSupport|null $originalData
 * @property-read User|null $requestedBy
 * @property-read University|null $university
 * @property-read UniversitySupportOfficeType|null $universitySupportOffice
 * @property-read UniversitySupportOfficeType|null $universitySupportOfficeOld
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereOfficeTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereSupportName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupportUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 */
class UniversityFacilityStudentSupportUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'support_name',
        'description',
        'office_type_id',
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
        return $this->belongsTo(UniversityFacilityStudentSupport::class, 'related_record_id');
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
    public function universitySupportOffice(): BelongsTo
    {
        return $this->belongsTo(UniversitySupportOfficeType::class, 'office_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function universitySupportOfficeOld(): BelongsTo
    {
        return $this->belongsTo(UniversitySupportOfficeType::class, 'old_value');
    }
}
