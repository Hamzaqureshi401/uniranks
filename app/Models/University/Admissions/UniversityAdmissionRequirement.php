<?php

namespace App\Models\University\Admissions;

use App\Models\Institutes\University;
use App\Models\Traits\HasTranslations;
use App\Models\University\Admissions\UpdateRequestsModals\UniversityAdmissionRequirementUpdateRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\University\Admissions\UniversityAdmissionRequirement
 *
 * @property int $id
 * @property int $university_id
 * @property int|null $university_admission_program_id
 * @property string|null $requirements
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\University\Admissions\UniversityAdmissionProgram|null $admissionProgram
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityAdmissionRequirementUpdateRequest[] $updateRequests
 * @property-read int|null $update_requests_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirement whereRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirement whereUniversityAdmissionProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirement whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionRequirement whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read array $translations
 * @property-read University|null $university
 */
class UniversityAdmissionRequirement extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['requirements'];

    protected $fillable = [
        'university_id',
        'university_admission_program_id',
        'requirements'
    ];

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

    public function updateRequests(): HasMany
    {
        return $this->hasMany(UniversityAdmissionRequirementUpdateRequest::class, 'related_record_id');
    }
}
