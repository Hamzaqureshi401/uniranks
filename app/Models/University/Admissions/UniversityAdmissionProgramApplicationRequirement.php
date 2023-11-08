<?php

namespace App\Models\University\Admissions;

use App\Models\General\ApplicationRequirement;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\Admissions\UniversityAdmissionProgramApplicationRequirement
 *
 * @property int $id
 * @property int $program_id University Admission Program Id
 * @property int $application_requirement_id
 * @property array|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read ApplicationRequirement|null $requirement
 * @property-read \App\Models\University\Admissions\UniversityAdmissionProgram|null $universityAdmissionProgram
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramApplicationRequirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramApplicationRequirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramApplicationRequirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramApplicationRequirement whereApplicationRequirementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramApplicationRequirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramApplicationRequirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramApplicationRequirement whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramApplicationRequirement whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramApplicationRequirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityAdmissionProgramApplicationRequirement extends Model
{
    use HasFactory;
//    use HasTranslations;
//    public $translatable = ['notes'];
    protected $fillable = ['program_id','application_requirement_id','notes'];

    public function requirement(){
        return $this->belongsTo(ApplicationRequirement::class,'application_requirement_id');
    }

    public function universityAdmissionProgram(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UniversityAdmissionProgram::class,'program_id');
    }
}
