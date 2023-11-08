<?php

namespace App\Models\Committee;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Committee\CommitteeRankingFactorVote
 *
 * @property int $id
 * @property int $user_id
 * @property int $factor_id
 * @property int|null $keep_it 1,true=>Yes,"0,false"=>No
 * @property int|null $current_wight_is_oky 1,true=>Yes,"0,false"=>No
 * @property float|null $suggested_weight
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read CommitteeRankingFactorVote $rankingFactor
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeRankingFactorVote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeRankingFactorVote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeRankingFactorVote query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeRankingFactorVote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeRankingFactorVote whereCurrentWightIsOky($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeRankingFactorVote whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeRankingFactorVote whereFactorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeRankingFactorVote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeRankingFactorVote whereKeepIt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeRankingFactorVote whereSuggestedWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeRankingFactorVote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeRankingFactorVote whereUserId($value)
 * @mixin \Eloquent
 */
class CommitteeRankingFactorVote extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['user_id','factor_id','keep_it','current_wight_is_oky','suggested_weight','description'];

    protected  $guarded = ['id'];

//    protected $casts = [
//        'keep_it'=>'boolean',
//        'current_wight_is_oky'=>'boolean',
//    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function rankingFactor(): BelongsTo
    {
        return $this->belongsTo(CommitteeRankingFactor::class,'factor_id');
    }
}
