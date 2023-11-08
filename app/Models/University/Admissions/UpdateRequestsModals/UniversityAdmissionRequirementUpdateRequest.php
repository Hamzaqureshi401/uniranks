<?php

namespace App\Models\University\Admissions\UpdateRequestsModals;

use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\Traits\HasTranslations;
use App\Models\University\Admissions\UniversityAdmissionProgram;
use App\Models\University\Admissions\UniversityAdmissionRequirement;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\University\Admissions\UpdateRequestsModals\UniversityAdmissionRequirementUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $university_admission_program_id
 * @property string|null $requirements
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
 * @property-read UniversityAdmissionProgram|null $admissionProgram
 * @property-read User|null $approvedBy
 * @property-read UniversityAdmissionRequirement|null $originalData
 * @property-read User|null $requestedBy
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereUniversityAdmissionProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirementUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 * @property-read array $translations
 */
class UniversityAdmissionRequirementUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['requirements'];

    protected $fillable = [
        'university_id',
        'university_admission_program_id',
        'requirements',
        'related_record_id', 'old_value', 'what_changed',
        'status',
        'remarks',
        'type',
        'requested_by_id',
        'approved_by_id'
    ];

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
        return $this->belongsTo(UniversityAdmissionRequirement::class, 'related_record_id');
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
    public function admissionProgram(): BelongsTo
    {
        return $this->belongsTo(UniversityAdmissionProgram::class, 'university_admission_program_id');
    }

}
