<?php

namespace App\Models\University;

use App\Models\General\ApplicationRequirement;
use App\Models\General\Degree;
use App\Models\Institutes\University;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\University\UniversityApplicationRequirement
 *
 * @property int $id
 * @property int $university_id University Id
 * @property int|null $degree_id
 * @property int $application_requirement_id
 * @property array|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Degree|null $degree
 * @property-read array $translations
 * @property-read ApplicationRequirement|null $requirement
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityApplicationRequirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityApplicationRequirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityApplicationRequirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityApplicationRequirement whereApplicationRequirementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityApplicationRequirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityApplicationRequirement whereDegreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityApplicationRequirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityApplicationRequirement whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityApplicationRequirement whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityApplicationRequirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityApplicationRequirement extends Model
{
    use HasFactory;

    use HasFactory;
    use HasTranslations;

    public $translatable = ['notes'];
    protected $fillable = ['university_id', 'application_requirement_id', 'notes','degree_id'];

    public function requirement()
    {
        return $this->belongsTo(ApplicationRequirement::class, 'application_requirement_id');
    }

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    public function degree(){
        return $this->belongsTo(Degree::class,'degree_id');
    }
}
