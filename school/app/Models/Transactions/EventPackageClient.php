<?php

namespace App\Models\Transactions;

use App\Models\Elite\ElitePackage;
use App\Models\General\EventPackage;
use App\Models\Institutes\Agent;
use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * App\Models\Transactions\EventPackageClient
 *
 * @property int $id
 * @property int|null $agent_id
 * @property int|null $university_id
 * @property int|null $event_package_id
 * @property int|null $is_top_up
 * @property int|null $university_fair_schools_campus
 * @property int|null $international_virtual_events
 * @property int|null $career_talks_school_campus
 * @property int|null $work_shops_university_campus
 * @property int|null $open_days_university_campus
 * @property int|null $student_for_a_day_university_campus
 * @property int|null $competition_university_campus
 * @property int|null $repositories_credit
 * @property int|null $schools_tours
 * @property int|null $countries
 * @property int|null $status 0->unpaid,1->active,2->expired
 * @property string|null $start_date
 * @property string|null $expire_date
 * @property int|null $created_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Agent|null $agent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transactions\EventCreditTransaction[] $eventCreditTransaction
 * @property-read int|null $event_credit_transaction_count
 * @property-read mixed $status_text
 * @property-read EventPackage|null $package
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transactions\RepositoryTransaction[] $repositoryCreditTransaction
 * @property-read int|null $repository_credit_transaction_count
 * @property-read University|null $university
 * @method static Builder|EventPackageClient active()
 * @method static Builder|EventPackageClient expired()
 * @method static Builder|EventPackageClient newModelQuery()
 * @method static Builder|EventPackageClient newQuery()
 * @method static Builder|EventPackageClient query()
 * @method static Builder|EventPackageClient whereAgentId($value)
 * @method static Builder|EventPackageClient whereCareerTalksSchoolCampus($value)
 * @method static Builder|EventPackageClient whereCompetitionUniversityCampus($value)
 * @method static Builder|EventPackageClient whereCountries($value)
 * @method static Builder|EventPackageClient whereCreatedAt($value)
 * @method static Builder|EventPackageClient whereCreatedById($value)
 * @method static Builder|EventPackageClient whereEventPackageId($value)
 * @method static Builder|EventPackageClient whereExpireDate($value)
 * @method static Builder|EventPackageClient whereId($value)
 * @method static Builder|EventPackageClient whereInternationalVirtualEvents($value)
 * @method static Builder|EventPackageClient whereIsTopUp($value)
 * @method static Builder|EventPackageClient whereOpenDaysUniversityCampus($value)
 * @method static Builder|EventPackageClient whereRepositoriesCredit($value)
 * @method static Builder|EventPackageClient whereSchoolsTours($value)
 * @method static Builder|EventPackageClient whereStartDate($value)
 * @method static Builder|EventPackageClient whereStatus($value)
 * @method static Builder|EventPackageClient whereStudentForADayUniversityCampus($value)
 * @method static Builder|EventPackageClient whereUniversityFairSchoolsCampus($value)
 * @method static Builder|EventPackageClient whereUniversityId($value)
 * @method static Builder|EventPackageClient whereUpdatedAt($value)
 * @method static Builder|EventPackageClient whereWorkShopsUniversityCampus($value)
 * @mixin \Eloquent
 */
class EventPackageClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_package_id',
        'is_top_up',
        'agent_id','university_id',
        'university_fair_schools_campus',
        'international_virtual_events',
        'career_talks_school_campus',
        'work_shops_university_campus',
        'open_days_university_campus',
        'student_for_a_day_university_campus',
        'competition_university_campus',
        'repositories_credit',
        'schools_tours',
        'countries','status','start_date','expire_date',
        'created_by_id',
        'event_package_client_id',
    ];

    protected $appends = ['status_text'];
    protected $guarded =['id'];

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }
    /**
     * @return BelongsTo
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }

    public function getStatusTextAttribute(){
        return match ($this->status){
          \AppConst::PACKAGE_ACTIVE => 'Active',
          \AppConst::PACKAGE_EXPIRED => 'Package Expired',
          default=> 'Unpaid',
        };
    }

    /**
     * @return BelongsTo
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(EventPackage::class,'event_package_id');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('status', \AppConst::PACKAGE_ACTIVE);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeExpired(Builder $query): Builder
    {
        return $query->where('status', \AppConst::PACKAGE_EXPIRED);
    }

    public function eventCreditTransaction(){
        return $this->hasMany(EventCreditTransaction::class,'event_package_client_id');
    }
    public function repositoryCreditTransaction(){
        return $this->hasMany(RepositoryTransaction::class,'event_package_client_id');
    }
}
