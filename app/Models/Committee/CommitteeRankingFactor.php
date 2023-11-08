<?php

namespace App\Models\Committee;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Committee\CommitteeRankingFactor
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $short_description
 * @property string $serial_number
 * @property float|null $weight Percentage(%)
 * @property bool|null $high_is_low 0=>No,1=>Yes
 * @property int|null $main_factor_id
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $committee
 * @property-read int|null $committee_count
 * @property-read CommitteeRankingFactor|null $mainFactor
 * @property-read \Illuminate\Database\Eloquent\Collection|CommitteeRankingFactor[] $subFactors
 * @property-read int|null $sub_factors_count
 * @property-read User|null $updatedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $votedByUsers
 * @property-read int|null $voted_by_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Committee\CommitteeRankingFactorVote[] $votes
 * @property-read int|null $votes_count
 * @method static Builder|CommitteeRankingFactor mainFactors()
 * @method static Builder|CommitteeRankingFactor newModelQuery()
 * @method static Builder|CommitteeRankingFactor newQuery()
 * @method static Builder|CommitteeRankingFactor query()
 * @method static Builder|CommitteeRankingFactor subFactorsOnly(?int $main_factor_id = null)
 * @method static Builder|CommitteeRankingFactor whereCreatedAt($value)
 * @method static Builder|CommitteeRankingFactor whereDescription($value)
 * @method static Builder|CommitteeRankingFactor whereHighIsLow($value)
 * @method static Builder|CommitteeRankingFactor whereId($value)
 * @method static Builder|CommitteeRankingFactor whereMainFactorId($value)
 * @method static Builder|CommitteeRankingFactor whereSerialNumber($value)
 * @method static Builder|CommitteeRankingFactor whereShortDescription($value)
 * @method static Builder|CommitteeRankingFactor whereTitle($value)
 * @method static Builder|CommitteeRankingFactor whereUpdatedAt($value)
 * @method static Builder|CommitteeRankingFactor whereUpdatedBy($value)
 * @method static Builder|CommitteeRankingFactor whereWeight($value)
 * @mixin \Eloquent
 */
class CommitteeRankingFactor extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'short_description', 'serial_number', 'weight', 'main_factor_id', 'updated_by', 'high_is_low'];

    protected $guarded = ['id'];

    protected $casts = ['high_is_low' => 'boolean'];

    public function getSerialNumberAttribute($value): string
    {
        return formatFactorNumber($value);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeMainFactors(Builder $query): Builder
    {
        return $query->whereNull('main_factor_id');
    }

    /**
     * @param Builder $query
     * @param int|null $main_factor_id
     * @return Builder
     */
    public function scopeSubFactorsOnly(Builder $q, ?int $main_factor_id = null): Builder
    {
        return $q->when($main_factor_id, fn($q, $main_factor_id) => $q->where('main_factor_id', $main_factor_id), fn($q) => $q->whereNotNull('main_factor_id'));
    }

    /**
     * @return BelongsTo
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * @return HasMany
     */
    public function subFactors(): HasMany
    {
        return $this->hasMany(CommitteeRankingFactor::class, 'main_factor_id');
    }

    /**
     * @return BelongsTo
     */
    public function mainFactor(): BelongsTo
    {
        return $this->belongsTo(CommitteeRankingFactor::class, 'main_factor_id');
    }

    /**
     * @return BelongsToMany
     */
    public function committee(): BelongsToMany
    {
        return $this->belongsToMany(User::class, User\UserFactor::class, 'factor_id', 'user_id')->withPivot('description');
    }

    /**
     * @return HasMany
     */
    public function votes(): HasMany
    {
        return $this->hasMany(CommitteeRankingFactorVote::class, 'factor_id');
    }

    /**
     * @return BelongsToMany
     */
    public function votedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, CommitteeRankingFactorVote::class, 'factor_id', 'user_id')
            ->withPivot(['keep_it', 'current_wight_is_oky', 'suggested_weight', 'description']);
    }

}
