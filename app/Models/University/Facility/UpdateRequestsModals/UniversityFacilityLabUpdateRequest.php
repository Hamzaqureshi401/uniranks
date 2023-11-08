<?php

namespace App\Models\University\Facility\UpdateRequestsModals;

use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Facility\UniversityFacilityLab;
use App\Models\University\UniversityLabCategory;
use App\Models\University\UniversityLabName;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityFacility\UpdateRequestsModals\UniversityFacilityLabUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $university_lab_category_id
 * @property int|null $university_lab_name_id
 * @property int|null $no_labs Number Of labs
 * @property string|null $description
 * @property int|null $related_record_id
 * @property string|null $old_value
 * @property string|null $what_changed
 * @property int $status
 * @property string|null $remarks
 * @property int $type add,update,delete
 * @property int $requested_by_id
 * @property int $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $approvedBy
 * @property-read UniversityFacilityLab|null $originalData
 * @property-read User|null $requestedBy
 * @property-read University|null $university
 * @property-read UniversityLabCategory|null $universityLabCategory
 * @property-read UniversityLabCategory|null $universityLabCategoryOld
 * @property-read UniversityLabName|null $universityLabName
 * @property-read UniversityLabName|null $universityLabNameOld
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereNoLabs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereUniversityLabCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereUniversityLabNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLabUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 */
class UniversityFacilityLabUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;


    protected $fillable = [
        'university_id',
        'university_lab_category_id',
        'university_lab_name_id',
        'no_labs',
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
        return $this->belongsTo(UniversityFacilityLab::class, 'related_record_id');
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
    public function universityLabCategory(): BelongsTo
    {
        return $this->belongsTo(UniversityLabCategory::class);
    }

    /**
     * @return BelongsTo
     */
    public function universityLabName(): BelongsTo
    {
        return $this->belongsTo(UniversityLabName::class);
    }
    /**
     * @return BelongsTo
     */
    public function universityLabCategoryOld(): BelongsTo
    {
        return $this->belongsTo(UniversityLabCategory::class,'old_value');
    }

    /**
     * @return BelongsTo
     */
    public function universityLabNameOld(): BelongsTo
    {
        return $this->belongsTo(UniversityLabName::class,'old_value');
    }
}
