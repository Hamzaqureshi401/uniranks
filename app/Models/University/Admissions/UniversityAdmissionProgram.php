<?php

namespace App\Models\University\Admissions;

use App\Models\General\ApplicationRequirement;
use App\Models\General\Currency;
use App\Models\General\Degree;
use App\Models\General\Faculty;
use App\Models\General\GradeScale;
use App\Models\General\Major;
use App\Models\General\Test;
use App\Models\Institutes\University;
use App\Models\Traits\HasTranslations;
use App\Models\University\Admissions\UpdateRequestsModals\UniversityAdmissionProgramUpdateRequest;
use App\Models\University\UniversityProgramFeeTerm;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\University\Admissions\UniversityAdmissionProgram
 *
 * @property int $id
 * @property int $university_id
 * @property int|null $degree_id
 * @property int|null $faculty_id
 * @property int|null $program_id
 * @property string|null $title
 * @property array|null $description
 * @property string|null $short_description
 * @property array|null $translated_name
 * @property array|null $admission_requirements
 * @property int|null $duration_years
 * @property int|null $duration_months
 * @property int|null $duration_days
 * @property int $fee_term_id university_program_fee_term_id
 * @property int $currency_id
 * @property float $fee
 * @property int $is_online
 * @property int $is_distance_learning
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $international_fee
 * @property float $application_local_fee
 * @property float $admission_local_fee
 * @property float $application_international_fee
 * @property-read \App\Models\University\Admissions\UniversityAdmissionRequirement|null $admissionRequirements
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ApplicationRequirement> $applicationRequirments
 * @property-read int|null $application_requirments_count
 * @property-read Currency|null $currency
 * @property-read Degree|null $degree
 * @property-read Faculty|null $faculty
 * @property-read UniversityProgramFeeTerm|null $feeTerm
 * @property-read string $duration
 * @property-read \Illuminate\Database\Eloquent\Collection<int, GradeScale> $gpaRequirments
 * @property-read int|null $gpa_requirments_count
 * @property-read Major|null $program
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Test> $testingRequirments
 * @property-read int|null $testing_requirments_count
 * @property-read University|null $university
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityAdmissionProgramUpdateRequest> $updateRequests
 * @property-read int|null $update_requests_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereAdmissionLocalFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereAdmissionRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereApplicationInternationalFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereApplicationLocalFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereDegreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereDurationDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereDurationMonths($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereDurationYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereFacultyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereFeeTermId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereInternationalFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereIsDistanceLearning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereIsOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereUpdatedAt($value)
 * @property int|null $created_by_id
 * @property-read User|null $createdBy
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAdmissionProgram whereCreatedById($value)
 * @mixin \Eloquent
 */
class UniversityAdmissionProgram extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name','description','admission_requirements'];
    protected $fillable = [
        'university_id',
        'currency_id',
        'university_id',
        'degree_id',
        'faculty_id',
        'program_id',
        'title', 'description', 'short_description', 'translated_name',
        'admission_requirements', 'duration_years', 'duration_months', 'duration_days',
        'fee_term_id',
        'fee',
        'is_online',
        'is_distance_learning',
        'description','created_by_id'
    ];

    protected $guarded = ['id'];

    protected $appends = ['duration'];


    public function getDurationAttribute(): string
    {
        $duration = "";
        if (!empty($this->duration_years)){
            $duration = $this->duration_years.(!empty($this->duration_months) ? ".".$this->duration_months:"")." ".\Str::plural('year',$this->duration_years);
        }
        if (empty($duration) && !empty($this->duration_months)){
            $duration = $this->duration_months." ".\Str::plural('month',$this->duration_months);
        }
        return $duration ?: "N/A";
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
     * @return HasOne
     */
    public function admissionRequirements(): HasOne
    {
        return $this->hasOne(UniversityAdmissionRequirement::class, 'university_admission_program_id');
    }

    public function updateRequests(): HasMany
    {
        return $this->hasMany(UniversityAdmissionProgramUpdateRequest::class, 'related_record_id');
    }

    public function applicationRequirments(){
        return $this->belongsToMany(ApplicationRequirement::class,UniversityAdmissionProgramApplicationRequirement::class,'program_id','application_requirement_id')->withPivot(['notes']);
    }

    public function gpaRequirments(){
        return $this->belongsToMany(GradeScale::class,UniversityAdmissionProgramGpaRequirement::class,'program_id','grade_scale_id')->withPivot(['required_grades']);
    }

    public function testingRequirments(){
        return $this->belongsToMany(Test::class,UniversityAdmissionProgramTestRequirement::class,'program_id','test_id')->withPivot(['required_grades']);
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by_id');
    }
}
