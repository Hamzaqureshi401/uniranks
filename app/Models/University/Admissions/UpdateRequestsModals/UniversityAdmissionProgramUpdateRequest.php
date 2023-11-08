<?php

namespace App\Models\University\Admissions\UpdateRequestsModals;

use App\Models\General\Currency;
use App\Models\General\Degree;
use App\Models\General\Faculty;
use App\Models\General\Major;
use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\Traits\HasTranslations;
use App\Models\University\Admissions\UniversityAdmissionProgram;
use App\Models\University\UniversityProgramFeeTerm;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\University\Admissions\UpdateRequestsModals\UniversityAdmissionProgramUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $degree_id
 * @property int|null $faculty_id
 * @property int|null $program_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $short_description
 * @property string|null $translated_name
 * @property string|null $admission_requirements
 * @property int|null $duration_years
 * @property int|null $duration_months
 * @property int|null $duration_days
 * @property int|null $fee_term_id
 * @property float|null $fee
 * @property int|null $is_online
 * @property int|null $is_distance_learning
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
 * @property-read Currency|null $currency
 * @property-read Currency|null $currencyOld
 * @property-read Degree|null $degree
 * @property-read Degree|null $degreeOld
 * @property-read Faculty|null $faculty
 * @property-read Faculty|null $facultyOld
 * @property-read UniversityProgramFeeTerm|null $feeTerm
 * @property-read UniversityProgramFeeTerm|null $feeTermOld
 * @property-read UniversityAdmissionProgram|null $originalData
 * @property-read Major|null $program
 * @property-read Major|null $programOld
 * @property-read User|null $requestedBy
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereAdmissionRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereDegreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereDurationDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereDurationMonths($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereDurationYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereFacultyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereFeeTermId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereIsDistanceLearning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereIsOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgramUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 * @property-read array $translations
 */
class UniversityAdmissionProgramUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name','description'];

    protected $fillable = [
        'university_id',
        'currency_id',
        'university_id',
        'degree_id',
        'faculty_id',
        'program_id',
        'title', 'description', 'short_description', 'translated_name',
        'admission_requirements', 'duration_years','duration_months','duration_days',
        'fee_term_id',
        'fee',
        'is_online',
        'is_distance_learning',
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
        return $this->belongsTo(UniversityAdmissionProgram::class, 'related_record_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function degree(): BelongsTo
    {
        return $this->belongsTo(Degree::class, 'degree_id');
    }

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'program_id');
    }

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    /**
     * @return BelongsTo
     */
    public function feeTerm(): BelongsTo
    {
        return $this->belongsTo(UniversityProgramFeeTerm::class, 'fee_term_id');
    }

    /**
     * @return BelongsTo
     */
    public function degreeOld(): BelongsTo
    {
        return $this->belongsTo(Degree::class, 'old_value');
    }

    /**
     * @return BelongsTo
     */
    public function facultyOld(): BelongsTo
    {
        return $this->belongsTo(Faculty::class, 'old_value');
    }

    /**
     * @return BelongsTo
     */
    public function programOld(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'old_value');
    }

    /**
     * @return BelongsTo
     */
    public function currencyOld(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'old_value');
    }

    /**
     * @return BelongsTo
     */
    public function feeTermOld(): BelongsTo
    {
        return $this->belongsTo(UniversityProgramFeeTerm::class, 'old_value');
    }

}
