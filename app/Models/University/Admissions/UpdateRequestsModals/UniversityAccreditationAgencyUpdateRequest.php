<?php

namespace App\Models\University\Admissions\UpdateRequestsModals;

use App\Casts\JsonIfArray;
use App\Models\General\AccreditationAgency;
use App\Models\General\AccreditationAgencyType;
use App\Models\General\Degree;
use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\Traits\HasAppendedValues;
use App\Models\University\Admissions\UniversityAccreditationAgency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\University\Admissions\UpdateRequestsModals\UniversityAccreditationAgencyUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $accreditation_agencies_id
 * @property string|null $join_date
 * @property string|null $accredited_date
 * @property int|null $agency_type_id
 * @property int|null $degree_id
 * @property string|null $listing_url
 * @property array|null $programs
 * @property string|null $document_path
 * @property string|null $logo
 * @property int|null $related_record_id
 * @property mixed|null $old_value
 * @property string|null $what_changed
 * @property int $status
 * @property string|null $remarks
 * @property int $type add,update,delete
 * @property int $requested_by_id
 * @property int|null $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|AccreditationAgencyType $agencyType
 * @property-read int|null $agency_type_count
 * @property-read User|null $approvedBy
 * @property-read Degree|null $degree
 * @property-read Degree|null $degreeOld
 * @property-read string $document_url
 * @property-read UniversityAccreditationAgency|null $originalData
 * @property-read User|null $requestedBy
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereAccreditationAgenciesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereAccreditedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereAgencyTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereDegreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereDocumentPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereJoinDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereListingUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest wherePrograms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 * @property-read AccreditationAgency|null $accreditingAgency
 * @property int|null $approval_status
 * @property-read AccreditationAgency|null $accreditingAgencyOld
 * @property-read AccreditationAgencyType|null $agencyTypeOld
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyUpdateRequest whereApprovalStatus($value)
 */
class UniversityAccreditationAgencyUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory, HasAppendedValues;

    protected $fillable = [
        'university_id', 'accreditation_agencies_id', 'join_date', 'accredited_date', 'agency_type_id', 'degree_id', 'listing_url', 'document_path',
        'related_record_id', 'programs', 'old_value', 'what_changed',
        'status',
        'remarks',
        'type',
        'requested_by_id',
        'approved_by_id'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'programs' => 'array',
        'old_value' => JsonIfArray::class,
        'created_at' => "datetime:Y-m-d H:i:s",
        'updated_at' => "datetime:Y-m-d H:i:s",
    ];

    /**
     * @return BelongsTo
     */
    protected $appends = ['document_url'];

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
        return $this->belongsTo(UniversityAccreditationAgency::class, 'related_record_id');
    }


    public function getDocumentUrlAttribute(): string
    {
        return \AppConst::IMAGES_CDN_URL . '/' . $this->document_path;
    }

    public function accreditingAgency(): BelongsTo
    {
        return $this->belongsTo(AccreditationAgency::class,'accreditation_agencies_id');
    }
    public function accreditingAgencyOld(): BelongsTo
    {
        return $this->belongsTo(AccreditationAgency::class,'old_value');
    }
    public function agencyType(): BelongsTo
    {
        return $this->belongsTo(AccreditationAgencyType::class, 'agency_type_id');
    }
    public function agencyTypeOld(): BelongsTo
    {
        return $this->belongsTo(AccreditationAgencyType::class, 'old_value');
    }

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    /**
     * @return BelongsTo
     */
    public function degree(): BelongsTo
    {
        return $this->belongsTo(Degree::class, 'degree_id');
    }


    public function degreeOld(): BelongsTo
    {
        return $this->belongsTo(Degree::class, 'old_value');
    }


}
