<?php

namespace App\Models\Committee;

use App\Models\General\Companies;
use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Committee\CommitteeAccount
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $employer_id
 * @property string|null $employed_at
 * @property string|null $why_fit_for_voting
 * @property string|null $about
 * @property string|null $linkedin_id
 * @property string|null $social_media_link
 * @property string|null $position
 * @property string|null $title
 * @property string|null $headline
 * @property string|null $job_description
 * @property \Illuminate\Support\Carbon|null $approved_at
 * @property int|null $approved_by
 * @property int $status
 * @property int|null $profile_status
 * @property \Illuminate\Support\Carbon|null $profile_completed_at
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Companies|null $company
 * @property-read Model|\Eloquent $employer
 * @property-read User|null $processedBy
 * @property-read University|null $university
 * @property-read User $user
 * @method static Builder|CommitteeAccount approved()
 * @method static Builder|CommitteeAccount newModelQuery()
 * @method static Builder|CommitteeAccount newQuery()
 * @method static Builder|CommitteeAccount pending()
 * @method static Builder|CommitteeAccount query()
 * @method static Builder|CommitteeAccount rejected()
 * @method static Builder|CommitteeAccount whereAbout($value)
 * @method static Builder|CommitteeAccount whereApprovedAt($value)
 * @method static Builder|CommitteeAccount whereApprovedBy($value)
 * @method static Builder|CommitteeAccount whereCreatedAt($value)
 * @method static Builder|CommitteeAccount whereEmployedAt($value)
 * @method static Builder|CommitteeAccount whereEmployerId($value)
 * @method static Builder|CommitteeAccount whereHeadline($value)
 * @method static Builder|CommitteeAccount whereId($value)
 * @method static Builder|CommitteeAccount whereJobDescription($value)
 * @method static Builder|CommitteeAccount whereLinkedinId($value)
 * @method static Builder|CommitteeAccount wherePosition($value)
 * @method static Builder|CommitteeAccount whereProfileCompletedAt($value)
 * @method static Builder|CommitteeAccount whereProfileStatus($value)
 * @method static Builder|CommitteeAccount whereRemarks($value)
 * @method static Builder|CommitteeAccount whereSocialMediaLink($value)
 * @method static Builder|CommitteeAccount whereStatus($value)
 * @method static Builder|CommitteeAccount whereTitle($value)
 * @method static Builder|CommitteeAccount whereUpdatedAt($value)
 * @method static Builder|CommitteeAccount whereUserId($value)
 * @method static Builder|CommitteeAccount whereWhyFitForVoting($value)
 * @mixin \Eloquent
 */
class CommitteeAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','employer_id','employer_type','employed_at','why_fit_for_voting','about','linkedin_id','social_media_link','position',
        'title','job_description','approved_at','approved_by','remarks','status','profile_status','profile_completed_at'];

    protected $guarded = ['id'];

    protected $casts = [
        'approved_at' => 'datetime',
        'profile_completed_at'=>'datetime',
    ];


    /**
     * @param Builder $builder
     * @param $status
     * @return Builder
     */
    private function applyCommitteeStatusFilter(Builder $builder, $status): Builder
    {
        return $builder->where('status',$status);
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopePending(Builder $builder): Builder
    {
        return $this->applyCommitteeStatusFilter($builder,\AppConst::ACCOUNT_PENDING);
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeApproved(Builder $builder): Builder
    {
        return $this->applyCommitteeStatusFilter($builder,\AppConst::ACCOUNT_APPROVED);
    }

    public function scopeRejected(Builder $builder){
        return $this->applyCommitteeStatusFilter($builder,\AppConst::ACCOUNT_REJECTED);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Companies::class,'employer_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'employer_id');
    }

    /**
     * @return BelongsTo
     */
    public function processedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'approved_by');
    }

    /**
     * @return MorphTo
     */
    public function employer(): MorphTo
    {
        return $this->morphTo(__FUNCTION__,'employed_at','employer_id');
    }
}
