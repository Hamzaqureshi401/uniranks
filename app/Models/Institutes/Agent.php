<?php

namespace App\Models\Institutes;

use App\Models\Agent\AgentDomain;
use App\Models\Agent\AgentFrontBanner;
use App\Models\Agent\AgentQuickView;
use App\Models\Agent\AgentReview;
use App\Models\General\ArchiveLead;
use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\General\EventPackage;
use App\Models\Traits\HasTranslations;
use App\Models\Transactions\EventCreditTransaction;
use App\Models\Transactions\RepositoryTransaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\institutes\Agent
 *
 * @property int $id
 * @property string $slug
 * @property string|null $name
 * @property string|null $short_name
 * @property string|null $description
 * @property string|null $email
 * @property string|null $contact_person_name
 * @property string|null $dial_code
 * @property string|null $phone
 * @property string|null $skype_phone_number
 * @property string|null $address1
 * @property string|null $address2
 * @property int|null $country_id
 * @property int|null $city_id
 * @property string|null $website
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $map_link
 * @property string|null $rectangle_logo_path
 * @property string|null $square_logo_path
 * @property string|null $document_path
 * @property int|null $contact_method_id
 * @property string|null $how_heard_about_us
 * @property string|null $year_start_recruiting
 * @property int|null $status
 * @property int|null $approval_status 1->approved
 * @property int|null $registered_by_user 1->yes
 * @property int|null $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property array|null $translated_name
 * @property float $ur_credit
 * @property float $event_credit
 * @property float $admissions_credit
 * @property int|null $events_package_id
 * @property-read Cities|null $city
 * @property-read Countries|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection|AgentDomain[] $domains
 * @property-read int|null $domains_count
 * @property-read \Illuminate\Database\Eloquent\Collection|EventCreditTransaction[] $eventTransactions
 * @property-read int|null $event_transactions_count
 * @property-read EventPackage|null $eventsPackage
 * @property-read \Illuminate\Database\Eloquent\Collection|AgentFrontBanner[] $frontBanners
 * @property-read int|null $front_banners_count
 * @property-read string|null $document_url
 * @property-read string|null $logo
 * @property-read string $logo_url
 * @property-read string $rectangle_logo_url
 * @property-read array $translations
 * @property-read AgentQuickView|null $quickView
 * @property-read \Illuminate\Database\Eloquent\Collection|RepositoryTransaction[] $repositoryTransactions
 * @property-read int|null $repository_transactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|AgentReview[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Agent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereAdmissionsCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereContactMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereContactPersonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereDialCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereDocumentPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereEventCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereEventsPackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereHowHeardAboutUs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereMapLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereRectangleLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereRegisteredByUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereSkypePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereSquareLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereUrCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereYearStartRecruiting($value)
 * @mixin \Eloquent
 */
class Agent extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['translated_name'];

    protected $fillable = [
        'institute_id',
        'national_id',
        'slug',
        'name',
        'short_name',
        'translated_name',
        'contact_person_name',
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
        'approval_status',
        'registered_by_user',
        'approved_by_id',
        'square_logo_path',
        'rectangle_logo_path',
        'events_package_id',
        'ur_credit','event_credit','admissions_credit','document_path','events_package_id','created_by_id'
    ];

    protected $appends = ['logo_url','rectangle_logo_url','document_url'];


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
        return \AppConst::UNI_LOGOS . "/" . ($this->logo ?? "default_color.png");
    }
  /**
     * @return string
     */
    public function getRectangleLogoUrlAttribute(): string
    {
        return \AppConst::UNI_LOGOS . "/" . ($this->logo ?? "default_color.png");
    }

    public function getDocumentUrlAttribute(): ?string
    {
        if (empty($this->document_path)) return null;

        return \AppConst::CDN_PATH . "/" . $this->document_path;
    }

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'agent_id');
    }

    /**
     * @return HasOne
     */
    public function quickView(): HasOne
    {
        return $this->hasOne(AgentQuickView::class, 'agent_id');
    }


    /**
     * @return HasMany
     */
    public function frontBanners(): HasMany
    {
        return $this->hasMany(AgentFrontBanner::class, 'agent_id');
    }

    public function domains(): HasMany
    {
        return $this->hasMany(AgentDomain::class,'agent_id');
    }

    public function eventsPackage(): BelongsTo
    {
        return $this->belongsTo(EventPackage::class,'events_package_id');
    }

    public function reviews(){
        return $this->hasMany(AgentReview::class,'agent_id');
    }

    public function eventTransactions(): HasMany
    {
        return $this->hasMany(EventCreditTransaction::class,'agent_id');
    }
    public function repositoryTransactions(): HasMany
    {
        return $this->hasMany(RepositoryTransaction::class,'agent_id');
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
}
