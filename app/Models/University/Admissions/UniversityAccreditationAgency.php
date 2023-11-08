<?php

namespace App\Models\University\Admissions;

use App\Models\General\AccreditationAgency;
use App\Models\General\AccreditationAgencyType;
use App\Models\General\Degree;
use App\Models\General\Major;
use App\Models\General\Programs;
use App\Models\Institutes\University;
use App\Models\University\Admissions\UpdateRequestsModals\UniversityAccreditationAgencyUpdateRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\University\Admissions\UniversityAccreditationAgency
 *
 * @property int $id
 * @property int $university_id
 * @property int $accreditation_agencies_id
 * @property string|null $join_date
 * @property string|null $accredited_date
 * @property int|null $agency_type_id
 * @property int|null $degree_id
 * @property string|null $listing_url
 * @property string|null $document_path
 * @property string|null $logo
 * @property int|null $approval_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by_id
 * @property-read AccreditationAgency|null $accreditingAgency
 * @property-read AccreditationAgencyType|null $agencyType
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\University\Admissions\UniversityAccreditationAgencyPrograms[] $attachedPrograms
 * @property-read int|null $attached_programs_count
 * @property-read User|null $createdBy
 * @property-read Degree|null $degree
 * @property-read string $document_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\University\Admissions\UniversityAdmissionProgram[] $programs
 * @property-read int|null $programs_count
 * @property-read University|null $university
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityAccreditationAgencyUpdateRequest[] $updateRequests
 * @property-read int|null $update_requests_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereAccreditationAgenciesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereAccreditedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereAgencyTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereDegreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereDocumentPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereJoinDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereListingUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityAccreditationAgency extends Model
{
    use HasFactory;

    protected $fillable = ['university_id', 'accreditation_agencies_id', 'join_date', 'accredited_date', 'agency_type_id', 'degree_id', 'listing_url', 'document_path','created_by_id'];


    protected $guarded = ['id',];
    protected $with = ['attachedPrograms'];

    protected $appends = [
        'programs',
        'document_url'
    ];

    public function getProgramsAttribute(): \Illuminate\Support\Collection
    {
        return $this->attachedPrograms->pluck('program_id');
    }

    public function getDocumentUrlAttribute(): string
    {
        return \AppConst::IMAGES_CDN_URL . '/' . $this->document_path;
    }

    public function accreditingAgency(): BelongsTo
    {
        return $this->belongsTo(AccreditationAgency::class,'accreditation_agencies_id');
    }

    public function agencyType(): BelongsTo
    {
        return $this->belongsTo(AccreditationAgencyType::class, 'agency_type_id');
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

    public function attachedPrograms()
    {
        return $this->hasMany(UniversityAccreditationAgencyPrograms::class, 'uni_acc_agency_id');
    }

    public function programs(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(UniversityAdmissionProgram::class, UniversityAccreditationAgencyPrograms::class, 'uni_acc_agency_id', 'program_id');
    }


    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by_id');
    }
    public function updateRequests(): HasMany
    {
        return $this->hasMany(UniversityAccreditationAgencyUpdateRequest::class, 'related_record_id');
    }

}
