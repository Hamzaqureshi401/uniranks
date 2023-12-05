<?php

namespace App\Models\Institutes;

use App\Models\Committee\CommitteeAccount;
use App\Models\Elite\ElitePackage;
use App\Models\Elite\EliteUniversity;
use App\Models\Fairs\Invitation;
use App\Models\General\ApplicationRequirement;
use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\General\GradeScale;
use App\Models\General\Language;
use App\Models\General\Major;
use App\Models\General\Test;
use App\Models\Multimedia\MediaAlbum;
use App\Models\Ranking\RankingPosition;
use App\Models\Research\UniversityResearch;
use App\Models\Traits\HasTranslations;
use App\Models\Transactions\EventCreditTransaction;
use App\Models\Transactions\RepositoryTransaction;
use App\Models\University\Admissions\UniversityAccreditationAgency;
use App\Models\University\Admissions\UniversityAdmissionProgram;
use App\Models\University\Admissions\UniversityAdmissionRequirement;
use App\Models\University\Admissions\UniversityAdmissionSession;
use App\Models\University\Admissions\UniversityFeeStructure;
use App\Models\University\Admissions\UniversitySemester;
use App\Models\University\Facility\UniversityFacilityAthletic;
use App\Models\University\Facility\UniversityFacilityHousing;
use App\Models\University\Facility\UniversityFacilityLab;
use App\Models\University\Facility\UniversityFacilityMainBuilding;
use App\Models\University\Facility\UniversityFacilityStudentLife;
use App\Models\University\Facility\UniversityFacilityStudentSupport;
use App\Models\University\Facility\UniversityFacilityTransportation;
use App\Models\University\Information\UniversityDomains;
use App\Models\University\Information\UniversityFrontBanners;
use App\Models\University\Information\UniversityFrontVideos;
use App\Models\University\Information\UniversityLanguages;
use App\Models\University\Information\UniversityQuickView;
use App\Models\University\Information\UniversitySocialMedia;
use App\Models\University\Preferences\UniversityPreferredMajor;
use App\Models\University\UniversityApplicationRequirement;
use App\Models\University\UniversityConference;
use App\Models\University\UniversityContactNumber;
use App\Models\University\UniversityEvent;
use App\Models\University\UniversityGpaRequirement;
use App\Models\University\UniversityLead;
use App\Models\University\UniversityPresentationRequest;
use App\Models\University\UniversityScholarship;
use App\Models\University\UniversityStatus;
use App\Models\University\UniversityTestingRequirement;
use App\Models\User;
use App\Models\User\UserPossibleUniversity;
use App\Models\User\UserRecommendationLetter;
use App\Models\University\UniversityLocationBranch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Institutes\University
 *
 * @property int $id
 * @property int $institute_id
 * @property int|null $main_campus_id
 * @property string $slug
 * @property string|null $university_name
 * @property string|null $short_name
 * @property string|null $email
 * @property string|null $contact_person_name
 * @property string|null $phone
 * @property string|null $address1
 * @property string|null $address2
 * @property int|null $country_id
 * @property int|null $city_id
 * @property string|null $website
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $map_link
 * @property int|null $status 3->Under Review
 * @property string|null $admission_contact
 * @property string|null $admission_email
 * @property array|null $admission_requirements
 * @property int|null $moderator_id
 * @property float|null $acceptance_rate
 * @property array|null $description
 * @property string|null $logo
 * @property string|null $monogram
 * @property array|null $translated_name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $national_id
 * @property int $show_world_ranking
 * @property int $show_region_1_ranking
 * @property int $show_region_2_ranking
 * @property int $show_region_3_ranking
 * @property int $show_local_ranking
 * @property int $show_list_ranking
 * @property int $ministry_accredited
 * @property int $bad_practices 0->no, 1-> yes
 * @property int|null $approval_status 1->approved
 * @property int|null $registered_by_user 1->yes
 * @property int|null $approved_by_id
 * @property float $ur_credit
 * @property float $event_credit
 * @property float $admissions_credit
 * @property int|null $event_package_id
 * @property int|null $show_public_profile
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityAccreditationAgency> $accreditationAgencies
 * @property-read int|null $accreditation_agencies_count
 * @property-read User|null $admin
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityAdmissionProgram> $admissionPrograms
 * @property-read int|null $admission_programs_count
 * @property-read UniversityAdmissionRequirement|null $admissionRequirements
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityAdmissionSession> $admissionSessions
 * @property-read int|null $admission_sessions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityApplicationRequirement> $applicationRequirments
 * @property-read int|null $application_requirments_count
 * @property-read Cities|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, CommitteeAccount> $committeeAccounts
 * @property-read int|null $committee_accounts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityConference> $conferences
 * @property-read int|null $conferences_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityContactNumber> $contactNumbers
 * @property-read int|null $contact_numbers_count
 * @property-read Countries|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityDomains> $domains
 * @property-read int|null $domains_count
 * @property-read EliteUniversity|null $elite
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ElitePackage> $elitePackages
 * @property-read int|null $elite_packages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, EventCreditTransaction> $eventTransactions
 * @property-read int|null $event_transactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityFacilityAthletic> $facilityAthletics
 * @property-read int|null $facility_athletics_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityFacilityHousing> $facilityHousings
 * @property-read int|null $facility_housings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityFacilityLab> $facilityLabs
 * @property-read int|null $facility_labs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityFacilityStudentLife> $facilityStudentLives
 * @property-read int|null $facility_student_lives_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityFacilityStudentSupport> $facilityStudentSupports
 * @property-read int|null $facility_student_supports_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityFacilityTransportation> $facilityTransportations
 * @property-read int|null $facility_transportations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityFeeStructure> $feeStructures
 * @property-read int|null $fee_structures_count
 * @property-read UniversityFrontBanners|null $frontBanners
 * @property-read UniversityFrontVideos|null $frontVideos
 * @property-read string $logo_url
 * @property-read string $monogram_url
 * @property-read bool $show_in_country
 * @property-read bool $show_in_region2
 * @property-read bool $show_in_region3
 * @property-read bool $show_in_region
 * @property-read bool $show_in_world
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityGpaRequirement> $gpaRequirments
 * @property-read int|null $gpa_requirments_count
 * @property-read \App\Models\Institutes\Institute|null $institute
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Invitation> $invitations
 * @property-read int|null $invitations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Language> $languages
 * @property-read int|null $languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $leads
 * @property-read int|null $leads_count
 * @property-read UniversityFacilityMainBuilding|null $mainBuilding
 * @property-read \Illuminate\Database\Eloquent\Collection<int, MediaAlbum> $mediaAlbums
 * @property-read int|null $media_albums_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityPresentationRequest> $presentationRequests
 * @property-read int|null $presentation_requests_count
 * @property-read UniversityQuickView|null $quickView
 * @property-read RankingPosition|null $rankingPositions
 * @property-read \Illuminate\Database\Eloquent\Collection<int, RepositoryTransaction> $repositoryTransactions
 * @property-read int|null $repository_transactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $representatives
 * @property-read int|null $representatives_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityResearch> $researchOutputs
 * @property-read int|null $research_outputs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityScholarship> $scholarships
 * @property-read int|null $scholarships_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversitySemester> $semesters
 * @property-read int|null $semesters_count
 * @property-read UniversitySocialMedia|null $socialMedia
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UserRecommendationLetter> $studentRecommendationLetters
 * @property-read int|null $student_recommendation_letters_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $students
 * @property-read int|null $students_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityTestingRequirement> $testingRequirments
 * @property-read int|null $testing_requirments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityEvent> $universityEvents
 * @property-read int|null $university_events_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Language> $universityLanguages
 * @property-read int|null $university_languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityPreferredMajor> $universityMajorPreferences
 * @property-read int|null $university_major_preferences_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Major> $universityPreferredMajors
 * @property-read int|null $university_preferred_majors_count
 * @property-read UniversityStatus|null $universityStatus
 * @method static \Illuminate\Database\Eloquent\Builder|University newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|University newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|University onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|University query()
 * @method static \Illuminate\Database\Eloquent\Builder|University whereAcceptanceRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereAdmissionContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereAdmissionEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereAdmissionRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereAdmissionsCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereBadPractices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereContactPersonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereEventCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereEventPackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereInstituteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereMainCampusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereMapLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereMinistryAccredited($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereModeratorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereMonogram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereNationalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereRegisteredByUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereShowListRanking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereShowLocalRanking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereShowPublicProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereShowRegion1Ranking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereShowRegion2Ranking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereShowRegion3Ranking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereShowWorldRanking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereUniversityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereUrCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|University withoutTrashed()
 * @mixin \Eloquent
 */
class University extends Model
{

    use HasFactory, SoftDeletes, HasTranslations;

    public $translatable = ['translated_name', 'description','admission_requirements'];

    protected $table = 'universities';

    public $timestamps = false;

    protected $fillable = [
        'institute_id',
        'national_id',
        'slug',
        'university_name',
        'short_name',
        'translated_name',
        'email',
        'phone',
        'address1',
        'address2',
        'country_id',
        'city_id',
        'website',
        'latitude',
        'longitude',
        'map_link',
        'status',
        'admission_contact',
        'moderator_id',
        'description',
        'acceptance_rate',
        'logo',
        'monogram',
        'show_world_ranking',
        'show_region_1_ranking',
        'show_region_2_ranking',
        'show_region_3_ranking',
        'show_local_ranking',
        'show_list_ranking',
        'ministry_accredited',
        'bad_practices',
        'ur_credit', 'event_credit', 'admissions_credit', ' event_package_id', 'admission_requirements'
    ];

    protected $appends = ['logo_url', 'monogram_url', 'show_in_country', 'show_in_world', 'show_in_region', 'show_in_region2', 'show_in_region3'];


    /**
     * @param $value
     * @return string|null
     */
    public function getLogoAttribute($value): ?string
    {
        return ($value == "NULL" ? null : $value);
    }

    /**
     * @return string
     */
    public function getLogoUrlAttribute(): string
    {
        return \AppConst::UNI_LOGOS . "/" . (\Str::remove('images/universities-logos/', $this->logo) ?? "default_color.png");
    }

    /**
     * @return string
     */
    public function getMonogramUrlAttribute(): string
    {
        return \AppConst::IMAGES_CDN_URL . "/" . (\Str::remove('images/', $this->monogram) ?: 'site-logos/Logo-stars-v1.png');
    }

    public function getShowInCountryAttribute(): bool
    {
        return ($this->show_local_ranking || $this->show_world_ranking || $this->show_region_1_ranking ||
            $this->show_region_2_ranking || $this->show_region_3_ranking);
    }

    public function getShowInWorldAttribute(): bool
    {
        return $this->show_world_ranking == 1;
    }

    public function getShowInRegionAttribute(): bool
    {
        return ($this->show_world_ranking || $this->show_region_1_ranking);
    }

    public function getShowInRegion2Attribute(): bool
    {
        return ($this->show_world_ranking || $this->show_region_2_ranking);
    }

    public function getShowInRegion3Attribute(): bool
    {
        return ($this->show_world_ranking || $this->show_region_3_ranking);
    }

    /**
     * @return BelongsTo
     */
    public function universityStatus(): BelongsTo
    {
        return $this->belongsTo(UniversityStatus::class, 'status');
    }

    public function eventTransactions(): HasMany
    {
        return $this->hasMany(EventCreditTransaction::class, 'university_id');
    }

    public function repositoryTransactions(): HasMany
    {
        return $this->hasMany(RepositoryTransaction::class, 'university_id');
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class, 'campus_id', 'id');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'campus_id', 'id');
        // ->where('role_id', \AppConstants::UNIVERSITY_ADMINISTRATOR);
    }

    public function representatives()
    {
        return $this->hasMany(User::class, 'campus_id', 'id');
        // ->where('role_id', \AppConstants::UNIVERSITY_REPRESENTATIVE);
    }


    /**
     * @return HasOne
     */
    public function rankingPositions(): HasOne
    {
        return $this->hasOne(RankingPosition::class, 'university_id')->latest();
    }

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    /**
     * @return HasOne
     */
    public function elite(): HasOne
    {
        return $this->hasOne(EliteUniversity::class)->where('status', 1)->latest();
    }

    public function elitePackages()
    {
        return $this->belongsToMany(ElitePackage::class, EliteUniversity::class);
    }

    /**
     * @return HasMany
     */
    public function studentRecommendationLetters(): HasMany
    {
        return $this->hasMany(UserRecommendationLetter::class, 'university_id');
    }

    /**
     * @return BelongsToMany
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, UserPossibleUniversity::class);
    }

    public function presentationRequests(): HasMany
    {
        return $this->hasMany(UniversityPresentationRequest::class, 'university_id');
    }

    public function universityEvents(): HasMany
    {
        return $this->hasMany(UniversityEvent::class, 'university_id');
    }

    /**
     * @return BelongsToMany
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, UniversityLanguages::class, 'university_id', 'language_id');
    }

    /**
     * @return BelongsTo
     */
    public function institute(): BelongsTo
    {
        return $this->belongsTo(Institute::class);
    }

    /**
     * @return HasOne
     */
    public function quickView(): HasOne
    {
        return $this->hasOne(UniversityQuickView::class, 'university_id');
    }

    /**
     * @return HasMany
     */
    /**
     * @return HasMany
     */
    public function accreditationAgencies(): HasMany
    {
        return $this->hasMany(UniversityAccreditationAgency::class, 'university_id');
    }

    /**
     * @return HasMany
     */
    public function admissionPrograms(): HasMany
    {
        return $this->hasMany(UniversityAdmissionProgram::class, 'university_id');
    }

    /**
     * @return HasOne
     */
    public function mainBuilding(): HasOne
    {
        return $this->hasOne(UniversityFacilityMainBuilding::class, 'university_id');
    }

    /**
     * @return HasMany
     */
    public function facilityLabs(): HasMany
    {
        return $this->hasMany(UniversityFacilityLab::class, 'university_id');
    }

    /**
     * @return HasOne
     */
    public function facilityHousings(): HasMany
    {
        return $this->hasMany(UniversityFacilityHousing::class, 'university_id');
    }

    /**
     * @return HasMany
     */
    public function facilityAthletics(): HasMany
    {
        return $this->hasMany(UniversityFacilityAthletic::class, 'university_id');
    }

    /**
     * @return HasMany
     */
    public function facilityTransportations(): HasMany
    {
        return $this->hasMany(UniversityFacilityTransportation::class, 'university_id');
    }

    /**
     * @return HasMany
     */
    public function facilityStudentLives(): HasMany
    {
        return $this->hasMany(UniversityFacilityStudentLife::class, 'university_id');
    }

    /**
     * @return HasMany
     */
    public function facilityStudentSupports(): HasMany
    {
        return $this->hasMany(UniversityFacilityStudentSupport::class, 'university_id');
    }

    /**
     * @return HasOne
     */
    public function admissionRequirements(): HasOne
    {
        return $this->hasOne(UniversityAdmissionRequirement::class, 'university_id');
    }

    /**
     * @return HasOne
     */
    public function frontVideos(): HasOne
    {
        return $this->hasOne(UniversityFrontVideos::class, 'university_id');
    }

    /**
     * @return HasOne
     */
    public function frontBanners(): HasOne
    {
        return $this->hasOne(UniversityFrontBanners::class, 'university_id');
    }

    /**
     * @return HasOne
     */
    public function socialMedia(): HasOne
    {
        return $this->hasOne(UniversitySocialMedia::class, 'university_id');
    }

    /**
     * @return BelongsToMany
     */
    public function universityLanguages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, 'university_languages', 'university_id', 'language_id');
    }

    /**
     * @return hasMany
     */
    public function domains(): HasMany
    {
        return $this->hasMany(UniversityDomains::class);
    }

    /**
     * @return HasMany
     */
    public function admissionSessions(): HasMany
    {
        return $this->hasMany(UniversityAdmissionSession::class);
    }

    /**
     * @return HasMany
     */
    public function semesters(): HasMany
    {
        return $this->hasMany(UniversitySemester::class);
    }

    /**
     * @return MorphMany
     */
    public function committeeAccounts(): MorphMany
    {
        return $this->morphMany(CommitteeAccount::class, 'employer');
    }

    public function leads(): BelongsToMany
    {
        return $this->belongsToMany(User::class, UniversityLead::class, 'university_id', 'student_id');
    }


    public function mediaAlbums(): HasMany
    {
        return $this->hasMany(MediaAlbum::class, 'university_id');
    }

    public function researchOutputs(): HasMany
    {
        return $this->hasMany(UniversityResearch::class, 'university_id');
    }

    public function conferences(): HasMany
    {
        return $this->hasMany(UniversityConference::class, 'university_id');
    }

    public function contactNumbers(): HasMany
    {
        return $this->hasMany(UniversityContactNumber::class, 'university_id');
    }

    public function feeStructures()
    {
        return $this->hasMany(UniversityFeeStructure::class, 'university_id');
    }

    public function universityPreferredMajors(): BelongsToMany
    {
        return $this->belongsToMany(Major::class, UniversityPreferredMajor::class, 'university_id', 'major_id');
    }

    public function universityMajorPreferences(): HasMany
    {
        return $this->hasMany(UniversityPreferredMajor::class, 'university_id');
    }


//    public function applicationRequirments(){
//        return $this->belongsToMany(ApplicationRequirement::class,UniversityApplicationRequirement::class,'university_id','application_requirement_id');
//    }
    public function applicationRequirments(){
        return $this->hasMany(UniversityApplicationRequirement::class,'university_id');
    }

//    public function gpaRequirments(){
//        return $this->belongsToMany(GradeScale::class,UniversityGpaRequirement::class,'university_id','grade_scale_id');
//    }
    public function gpaRequirments(){
        return $this->hasMany(UniversityGpaRequirement::class,'university_id');
    }

//    public function testingRequirments(){
//        return $this->belongsToMany(Test::class,UniversityTestingRequirement::class,'university_id','test_id');
//    }
    public function testingRequirments(){
        return $this->hasMany(UniversityTestingRequirement::class,'university_id');
    }

    public function scholarships(): HasMany
    {
        return $this->hasMany(UniversityScholarship::class,'university_id');
    }

    public function universityLocationBranch(): BelongsTo
    {
        return $this->belongsTo(UniversityLocationBranch::class , 'university_id');
    }
}
