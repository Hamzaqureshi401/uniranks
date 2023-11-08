<?php

namespace App\Models\University\Information\UpdateRequestsModals;

use App\Models\General\Currency;
use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Information\UniversityQuickView;
use App\Models\University\UniversityCategories;
use App\Models\University\UniversityType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityInfo\UpdateRequestsModals\UniversityQuickViewUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $uni_category_id
 * @property float|null $no_alumni
 * @property float|null $no_students
 * @property float|null $no_schools
 * @property float|null $no_degrees
 * @property float|null $no_academics
 * @property string|null $founded_year
 * @property int|null $distance_learning
 * @property int|null $uni_type_id
 * @property string|null $acronym
 * @property string|null $academic_year
 * @property float|null $avg_fee
 * @property int|null $online_courses
 * @property float|null $transfer_students
 * @property float|null $avg_total_fee
 * @property float|null $avg_annual_cost
 * @property int|null $currency_id
 * @property int|null $related_record_id
 * @property int $status
 * @property string|null $remarks
 * @property int $type add,update,delete
 * @property int $requested_by_id
 * @property int $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereAcademicYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereAcronym($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereAvgAnnualCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereAvgFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereAvgTotalFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereDistanceLearning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereFoundedYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereNoAcademics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereNoAlumni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereNoDegrees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereNoSchools($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereNoStudents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereOnlineCourses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereTransferStudents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereUniCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereUniTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereUpdatedAt($value)
 * @property string|null $old_value
 * @property string|null $what_changed
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickViewUpdateRequest whereWhatChanged($value)
 * @property-read User|null $approvedBy
 * @property-read Currency|null $currency
 * @property-read UniversityQuickView|null $originalData
 * @property-read User $requestedBy
 * @property-read University|null $university
 * @property-read UniversityCategories|null $universityCategory
 * @property-read UniversityType|null $universityType
 * @property-read Currency|null $currencyOld
 * @property-read UniversityCategories|null $universityCategoryOld
 * @property-read UniversityType|null $universityTypeOld
 * @mixin \Eloquent
 */
class UniversityQuickViewUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'uni_category_id',
        'uni_type_id',
        'no_alumni',
        'no_students',
        'no_schools',
        'no_degrees',
        'no_academics',
        'founded_year',
        'distance_learning',
        'acronym',
        'online_courses',
        'transfer_students',
        'avg_total_fee',
        'avg_annual_cost',
        'currency_id',//new
        'related_record_id', 'old_value', 'what_changed',
        'status',
        'remarks',
        'type',
        'requested_by_id',
        'approved_by_id'
    ];
    protected $guarded = [];

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
        return $this->belongsTo(UniversityQuickView::class, 'related_record_id');
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
    public function universityType(): BelongsTo
    {
        return $this->belongsTo(UniversityType::class, 'uni_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function universityCategory(): BelongsTo
    {
        return $this->belongsTo(UniversityCategories::class, 'uni_category_id');
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
    public function universityTypeOld(): BelongsTo
    {
        return $this->belongsTo(UniversityType::class, 'old_value');
    }

    /**
     * @return BelongsTo
     */
    public function universityCategoryOld(): BelongsTo
    {
        return $this->belongsTo(UniversityCategories::class, 'old_value');
    }

    /**
     * @return BelongsTo
     */
    public function currencyOld(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'old_value');
    }
}
