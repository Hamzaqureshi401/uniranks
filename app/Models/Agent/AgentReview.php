<?php

namespace App\Models\Agent;

use App\Models\Institutes\Agent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentReview
 *
 * @property int $id
 * @property int $agent_id
 * @property int|null $by_user_id
 * @property string|null $name
 * @property string|null $description
 * @property float $review_point
 * @property int|null $country_id
 * @property string|null $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Agent|null $agent
 * @property-read User|null $byUser
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Agent\AgentReviewComment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Agent\AgentReviewLike[] $likes
 * @property-read int|null $likes_count
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview whereByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview whereReviewPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReview whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgentReview extends Model
{
    use HasFactory;
    protected $fillable = ['agent_id','by_user_id','name','description','review_point','country_id','ip_address'];



    public function agent(){
        return $this->belongsTo(Agent::class,'agent_id');
    }
    public function byUser(){
        return $this->belongsTo(User::class,'by_user_id');
    }

    public function comments(){
        return $this->hasMany(AgentReviewComment::class,'review_id');
    }

    public function likes(){
        return $this->hasMany(AgentReviewLike::class,'review_id');
    }
}
