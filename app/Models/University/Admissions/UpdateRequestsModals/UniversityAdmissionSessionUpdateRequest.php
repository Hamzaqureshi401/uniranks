<?php

namespace App\Models\University\Admissions\UpdateRequestsModals;

use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\Traits\HasTranslations;
use App\Models\University\Admissions\UniversityAdmissionSession;
use App\Models\University\Admissions\UniversitySemester;
use App\Models\University\Admissions\SemesterAdmissionSessionUserReview;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\University\Admissions\UpdateRequestsModals\UniversityAdmissionSessionUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $university_semester_id
 * @property string|null $description
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $is_current
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
 * @property-read UniversityAdmissionSession|null $originalData
 * @property-read User|null $requestedBy
 * @property-read UniversitySemester|null $semester
 * @property-read UniversitySemester|null $semesterOld
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereIsCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereUniversitySemesterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionSessionUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 * @property-read array $translations
 */
class UniversityAdmissionSessionUpdateRequest extends Model implements UpdateRequest
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
        return $this->belongsTo(UniversityAdmissionSession::class, 'related_record_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    /**
     * @return BelongsTo
     */
    public function semester(): BelongsTo
    {
        return $this->belongsTo(UniversitySemester::class, 'university_semester_id');
    }

    /**
     * @return BelongsTo
     */
    public function semesterOld(): BelongsTo
    {
        return $this->belongsTo(UniversitySemester::class, 'old_value');
    }

    public function requestUserReview(){
        return $this->belongsTo(SemesterAdmissionSessionUserReview::class);
    }
}
