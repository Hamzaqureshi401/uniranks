<?php

namespace App\Models\University\Admissions\UpdateRequestsModals;

use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\Traits\HasTranslations;
use App\Models\University\Admissions\UniversityAdmissionSession;
use App\Models\University\Admissions\UniversitySemester;
use App\Models\University\UniversitySemesterTitle;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\University\Admissions\UpdateRequestsModals\UniversitySemesterUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $university_semester_title_id
 * @property string|null $name
 * @property string|null $start_date
 * @property string|null $end_date
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
 * @property-read UniversitySemester|null $originalData
 * @property-read User|null $requestedBy
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereUniversitySemesterTitleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 * @property array|null $translated_name
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterUpdateRequest whereTranslatedName($value)
 */
class UniversitySemesterUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];

    protected $fillable = [
        'university_id',
//        'university_semester_title_id',
        'name',
        'translated_name',
        'start_date',
        'end_date',
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
        return $this->belongsTo(UniversitySemester::class, 'related_record_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }
}
