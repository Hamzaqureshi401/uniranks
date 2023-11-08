<?php

namespace App\Models\University\Admissions;

use App\Models\Institutes\University;
use App\Models\Traits\HasTranslations;
use App\Models\University\Admissions\UpdateRequestsModals\UniversityAccreditationAgencyUpdateRequest;
use App\Models\University\Admissions\UpdateRequestsModals\UniversityAdmissionSessionUpdateRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\University\Admissions\UniversityAdmissionSession
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $university_semester_id
 * @property array|null $description
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property int $is_current
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \App\Models\University\Admissions\UniversitySemester|null $semester
 * @property-read University|null $university
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityAdmissionSessionUpdateRequest[] $updateRequests
 * @property-read int|null $update_requests_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSession query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSession whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSession whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSession whereIsCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSession whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSession whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSession whereUniversitySemesterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSession whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityAdmissionSession extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['description'];
    protected $fillable = [
        'university_id',
        'university_semester_id',
        'start_date',
        'end_date',
//        'is_current',
        'description'
    ];

    protected $casts = ['start_date'=>'datetime','end_date'=>'datetime'];

    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id');
    }

    /**
     * @return BelongsTo
     */
    public function semester(): BelongsTo
    {
        return $this->belongsTo(UniversitySemester::class,'university_semester_id');
    }

    public function updateRequests(): HasMany
    {
        return $this->hasMany(UniversityAdmissionSessionUpdateRequest::class, 'related_record_id');
    }
}
