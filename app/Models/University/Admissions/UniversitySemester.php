<?php

namespace App\Models\University\Admissions;

use App\Models\Institutes\University;
use App\Models\Traits\HasTranslations;
use App\Models\University\Admissions\UpdateRequestsModals\UniversitySemesterUpdateRequest;
use App\Models\University\UniversitySemesterTitle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\University\Admissions\UniversitySemester
 *
 * @property int $id
 * @property int $university_id
 * @property int|null $university_semester_title_id
 * @property string|null $name
 * @property string $start_date
 * @property string $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $translated_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\University\Admissions\UniversityAdmissionSession[] $admissionSessions
 * @property-read int|null $admission_sessions_count
 * @property-read UniversitySemesterTitle|null $semesterTitle
 * @property-read University|null $university
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversitySemesterUpdateRequest[] $updateRequests
 * @property-read int|null $update_requests_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemester newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemester newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemester query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemester whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemester whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemester whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemester whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemester whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemester whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemester whereUniversitySemesterTitleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemester whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read array $translations
 */
class UniversitySemester extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];

    protected $fillable = [
        'university_id',
//        'university_semester_title_id',
        'translated_name',
        'name',
        'start_date',
        'end_date'
    ];
    protected $guarded = ['id'];

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
    public function semesterTitle(): BelongsTo
    {
        return $this->belongsTo(UniversitySemesterTitle::class, 'university_semester_title_id');
    }

    /**
     * @return HasMany
     */
    public function admissionSessions(): HasMany
    {
        return $this->hasMany(UniversityAdmissionSession::class);
    }

    public function updateRequests(): HasMany
    {
        return $this->hasMany(UniversitySemesterUpdateRequest::class, 'related_record_id');
    }
}
