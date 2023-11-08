<?php

namespace App\Models\University\Information;

use App\Models\General\Currency;
use App\Models\Institutes\University;
use App\Models\University\UniversityCategories;
use App\Models\University\UniversityType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\University\Information\UniversityQuickView
 *
 * @property int $id
 * @property int $university_id
 * @property int|null $uni_category_id university_category_id
 * @property float|null $no_alumni
 * @property float|null $no_students
 * @property float|null $no_schools
 * @property float|null $no_degrees
 * @property float|null $no_academics
 * @property string|null $founded_year
 * @property int|null $distance_learning
 * @property int|null $uni_type_id university_type_id
 * @property string|null $acronym
 * @property string|null $academic_year
 * @property float|null $avg_fee
 * @property int|null $online_courses
 * @property float|null $transfer_students
 * @property float|null $avg_total_fee
 * @property float|null $avg_annual_cost
 * @property int|null $currency_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $body_type
 * @property int|null $no_majors
 * @property int|null $no_programs
 * @property int|null $short_courses
 * @property int|null $acceptance_rate
 * @property int|null $diploma
 * @property int|null $associate
 * @property int|null $bachelors
 * @property int|null $masters
 * @property int|null $doctoral
 * @property int|null $open_university
 * @property int|null $distance_university
 * @property int|null $regular_university
 * @property int|null $updated_by
 * @property-read Currency|null $currency
 * @property-read University|null $university
 * @property-read UniversityCategories|null $universityCategory
 * @property-read UniversityType|null $universityType
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereAcademicYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereAcceptanceRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereAcronym($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereAssociate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereAvgAnnualCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereAvgFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereAvgTotalFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereBachelors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereBodyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereDiploma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereDistanceLearning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereDistanceUniversity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereDoctoral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereFoundedYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereMasters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereNoAcademics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereNoAlumni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereNoDegrees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereNoMajors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereNoPrograms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereNoSchools($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereNoStudents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereOnlineCourses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereOpenUniversity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereRegularUniversity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereShortCourses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereTransferStudents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereUniCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereUniTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityQuickView whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class UniversityQuickView extends Model
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
        'body_type','no_majors','no_programs','short_courses','acceptance_rate',
        'diploma','associate','masters','bachelors','doctoral','open_university','distance_university'
    ];
    protected $guarded = [];

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

}
