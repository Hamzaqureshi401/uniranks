<?php

namespace App\Models\Institutes;

use App\Models\Fairs\Fair;
use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\General\CountryDirectorate;
use App\Models\General\CountryDirectorateRegion;
use App\Models\General\CountryState;
use App\Models\General\CountryStateZone;
use App\Models\General\Curriculum;
use App\Models\General\FeeRange;
use App\Models\General\Gender;
use App\Models\PointingSystem\PointLevel;
use App\Models\PointingSystem\PointTransaction;
use App\Models\PointingSystem\PointType;
use App\Models\PointingSystem\PointWithdrawalRequest;
use App\Models\School\SchoolSponsoredEvent;
use App\Models\School\SchoolType;
use App\Models\Traits\HasTranslations;
use App\Models\University\UniversityEvent;
use App\Models\University\UniversityEventInvitation;
use App\Models\University\UniversityPresentationRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\Institutes\School
 *
 * @property int $id
 * @property int|null $institute_id
 * @property int|null $school_type_id 1:Public, 2:Private
 * @property int|null $point_level_id
 * @property string|null $school_name
 * @property string|null $email
 * @property string|null $dial_code i.e 971,960
 * @property string|null $phone
 * @property string|null $address1
 * @property string|null $address2
 * @property int $country_id
 * @property int|null $directorate_id
 * @property int|null $region_id
 * @property int|null $state_id
 * @property int|null $zone_id
 * @property int $city_id
 * @property string|null $website
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $about_us
 * @property int|null $number_students
 * @property int|null $number_grade11
 * @property int|null $number_grade12
 * @property int|null $number_teachers
 * @property string|null $curriculum_id
 * @property string|null $fees_grade11
 * @property string|null $fees_grade12
 * @property string|null $map_link
 * @property string|null $status
 * @property string|null $moderator_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $grade_13
 * @property string|null $grade_13_fee
 * @property string|null $facebook_url
 * @property string|null $linkedin_url
 * @property string|null $logo
 * @property int|null $gender_id
 * @property array|null $translated_name json data
 * @property string|null $sm_link
 * @property float|null $sm_credit
 * @property string|null $national_id
 * @property int $created_by
 * @property-read User|null $admin
 * @property-read Cities|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $counselors
 * @property-read int|null $counselors_count
 * @property-read Countries|null $country
 * @property-read User|null $createdBy
 * @property-read Curriculum|null $curriculum
 * @property-read CountryDirectorate|null $directorate
 * @property-read \Illuminate\Database\Eloquent\Collection|Fair[] $fairs
 * @property-read int|null $fairs_count
 * @property-read FeeRange|null $g_11_fee_range
 * @property-read FeeRange|null $g_12_fee_range
 * @property-read FeeRange|null $g_13_fee_range
 * @property-read Gender|null $gender
 * @property-read mixed $logo_url
 * @property-read string $phone_number
 * @property-read mixed $total_students
 * @property-read \App\Models\Institutes\Institute|null $institutes
 * @property-read Countries|null $phoneNumberCountry
 * @property-read PointLevel|null $pointLevel
 * @property-read \Illuminate\Database\Eloquent\Collection|PointType[] $pointTypes
 * @property-read int|null $point_types_count
 * @property-read \Illuminate\Database\Eloquent\Collection|PointTransaction[] $pointsHistory
 * @property-read int|null $points_history_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityPresentationRequest[] $presentationRequests
 * @property-read int|null $presentation_requests_count
 * @property-read CountryDirectorateRegion|null $region
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $schoolAdmins
 * @property-read int|null $school_admins_count
 * @property-read \Illuminate\Database\Eloquent\Collection|SchoolSponsoredEvent[] $sponsoredEvents
 * @property-read int|null $sponsored_events_count
 * @property-read CountryState|null $state
 * @property-read SchoolType|null $type
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityEvent[] $universityEvents
 * @property-read int|null $university_events_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $users
 * @property-read int|null $users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|PointWithdrawalRequest[] $withdrawals
 * @property-read int|null $withdrawals_count
 * @property-read CountryStateZone|null $zone
 * @method static \Illuminate\Database\Eloquent\Builder|School newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|School newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|School query()
 * @method static \Illuminate\Database\Eloquent\Builder|School whereAboutUs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereCurriculumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereDialCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereDirectorateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereFacebookUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereFeesGrade11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereFeesGrade12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereGrade13($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereGrade13Fee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereInstituteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereLinkedinUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereMapLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereModeratorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereNationalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereNumberGrade11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereNumberGrade12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereNumberStudents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereNumberTeachers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School wherePointLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSchoolName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSchoolTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSmCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSmLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereZoneId($value)
 * @mixin \Eloquent
 */
class School extends Model
{
    use HasTranslations;
    public $translatable = ['translated_name'];
    protected $table = 'schools';

    public $timestamps = false;

    protected $fillable = ['institute_id','created_by','school_type_id','national_id', 'gender_id' ,'logo', 'school_name', 'email',
        'dial_code','phone', 'address1', 'address2',
        'country_id','directorate_id','region_id','zone_id', 'city_id','state_id', 'website', 'latitude', 'longitude', 'about_us', 'number_students', 'number_grade11',
        'number_grade12', 'number_teachers', 'curriculum_id', 'fees_grade11', 'fees_grade12','grade_13','grade_13_fee', 'map_link', 'campus',
        'status', 'moderator_id','facebook_url','linkedin_url'];

    protected $appends = ['logo_url','total_students','phone_number'];


    public function getPhoneNumberAttribute(): string
    {
        return '+' . $this->dial_code . $this->phone;
    }

    /**
     * @param $value
     * @return string|null
     */
    public function getLogoAttribute($value): ?string
    {
        return ($value == "NULL" ? null : $value);
    }

    public function getLogoUrlAttribute()
    {
        return \AppConst::SCHOOL_LOGOS . "/" . ($this->logo ?? "SM-no-logo-school.svg");
    }

    public function getSchoolNameAttribute($value){
        return $this->translated_name ?: $value;
    }
    public function getTotalStudentsAttribute()
    {
        return $this->number_students;
    }

    public function getNumberGrade12Attribute($value){
        return ($this->curriculum_id != \AppConst::CURRICULUM_BRITISH ? $value: $this->grade_13);
    }



    public function phoneNumberCountry(): BelongsTo
    {
        return $this->belongsTo(Countries::class,'dial_code','country_code',);
    }
    public function institutes()
    {
        return $this->belongsTo(Institute::class, 'institute_id', 'id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(SchoolType::class,'school_type_id');
    }

    public function fairs()
    {
        return $this->hasMany(Fair::class, 'school_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'campus_id', 'id');
    }

//    public function cities()
//    {
//        return $this->belongsTo(City::class, 'city_id', 'id');
//    }
//
//    public function countries()
//    {
//        return $this->belongsTo(Country::class, 'country_id', 'id');
//    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(CountryState::class,'state_id');
    }

    public function directorate(){
        return $this->belongsTo(CountryDirectorate::class,'directorate_id');
    }
    public function region(){
        return $this->belongsTo(CountryDirectorateRegion::class,'region_id');
    }
    public function zone(){
        return $this->belongsTo(CountryStateZone::class,'zone_id');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'campus_id', 'id');
        // ->where('role_id', \AppConstants::SCHOOL_ADMINISTRATOR);
    }

    /**
     * @return BelongsToMany
     */
    public function schoolAdmins(): BelongsToMany
    {
        return $this->belongsToMany(User::class,User\UserSchool::class,'school_id','user_id');
    }

    /**
     * @return BelongsTo
     */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class,'gender_id');
    }


    /**
     * @return BelongsToMany
     */
    public function counselors(): BelongsToMany
    {
        return $this->belongsToMany(User::class,User\UserSchool::class,'school_id','user_id');
    }

    /**
     * @return BelongsTo
     */
    public function pointLevel(): BelongsTo
    {
        return $this->belongsTo(PointLevel::class,'point_level_id');
    }

    /**
     * @return HasMany
     */
    public function pointsHistory(): MorphMany
    {
        return $this->morphMany(PointTransaction::class,'recipient');
    }

    /**
     * @return BelongsToMany
     */
    public function pointTypes(): BelongsToMany
    {
        return $this->belongsToMany(PointType::class,PointTransaction::class,'recipient_id','point_type_id')->wherePivot('recipient_type','school');
    }


    /**
     * @return HasMany
     */
    public function withdrawals(): HasMany
    {
        return $this->hasMany(PointWithdrawalRequest::class,'school_id');
    }


    /**
     * @return BelongsToMany
     */
    public function universityEvents(): BelongsToMany
    {
        return $this->belongsToMany(UniversityEvent::class,UniversityEventInvitation::class,
            'school_id','university_event_id')->withPivot(['status','accepted_by_school','id']);
    }

    /**
     * @return HasMany
     */
    public function sponsoredEvents(): HasMany
    {
        return $this->hasMany(SchoolSponsoredEvent::class,'school_id');
    }

    public function presentationRequests(): HasMany
    {
        return $this->hasMany(UniversityPresentationRequest::class,'school_id');
    }

    public  function curriculum(): BelongsTo
    {
        return $this->belongsTo(Curriculum::class,'curriculum_id');
    }

    public function g_12_fee_range(): BelongsTo
    {
        return $this->belongsTo(FeeRange::class,'fees_grade12');
    }
    public function g_11_fee_range(): BelongsTo
    {
        return $this->belongsTo(FeeRange::class,'fees_grade11');
    }
    public function g_13_fee_range(): BelongsTo
    {
        return $this->belongsTo(FeeRange::class,'grade_13_fee');
    }

    /**
     * @return BelongsTo
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
