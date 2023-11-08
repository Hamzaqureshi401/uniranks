<?php

namespace App\Models\Agent;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentReviewLike
 *
 * @property int $id
 * @property int $review_id
 * @property int|null $by_user_id
 * @property string|null $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $byUser
 * @property-read \App\Models\Agent\AgentReview|null $review
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewLike whereByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewLike whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewLike whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewLike whereReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewLike whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgentReviewLike extends Model
{
    use HasFactory;


    protected $fillable = ['review_id','by_user_id','name','description','ip_address'];

    public function review(){
        return $this->belongsTo(AgentReview::class,'review_id');
    }

    public function byUser(){
        return $this->belongsTo(User::class,'by_user_id');
    }
}
