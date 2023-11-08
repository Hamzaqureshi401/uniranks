<?php

namespace App\Models\University\Admissions;

use App\Models\General\AdmissionFeeType;
use App\Models\General\Degree;
use App\Models\General\Faculty;
use App\Models\Institutes\University;
use App\Models\Traits\HasTranslations;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\Admissions\UniversityFeeStructure
 *
 * @property int $id
 * @property int $university_id
 * @property int|null $degree_id
 * @property int|null $faculty_id
 * @property int|null $program_id
 * @property string|null $no_credit_hr
 * @property string|null $offer_installments
 * @property string|null $cost_per_credit_hr
 * @property string|null $application_fee
 * @property string|null $admission_fee
 * @property string|null $other_fee_amount
 * @property int|null $other_fee_type_id
 * @property array|null $notes Json Data
 * @property int|null $created_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $createdBy
 * @property-read Degree|null $degree
 * @property-read Faculty|null $faculty
 * @property-read array $translations
 * @property-read AdmissionFeeType|null $otherFeeType
 * @property-read \App\Models\University\Admissions\UniversityAdmissionProgram|null $program
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereAdmissionFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereApplicationFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereCostPerCreditHr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereDegreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereFacultyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereNoCreditHr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereOfferInstallments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereOtherFeeAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereOtherFeeTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFeeStructure whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityFeeStructure extends Model
{
    use HasFactory;

    use HasTranslations;
    public $translatable = ['notes'];
    protected $fillable = ['notes','university_id', 'degree_id', 'faculty_id', 'program_id',
        'no_credit_hr','offer_installments','cost_per_credit_hr','application_fee','admission_fee',
        'other_fee_amount','other_fee_type_id','created_by_id'];

    public function university(){
        return $this->belongsTo(University::class,'university_id');
    }

    public function degree(){
        return $this->belongsTo(Degree::class,'degree_id');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class,'faculty_id');
    }

    public function program(){
        return $this->belongsTo(UniversityAdmissionProgram::class,'program_id');
    }

    public function otherFeeType(){
        return $this->belongsTo(AdmissionFeeType::class,'other_fee_type_id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by_id');
    }
}
