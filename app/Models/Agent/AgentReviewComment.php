<?php

namespace App\Models\Agent;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentReviewComment
 *
 * @property int $id
 * @property int $review_id
 * @property int|null $by_user_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $byUser
 * @property-read \App\Models\Agent\AgentReview|null $review
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewComment whereByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewComment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewComment whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewComment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewComment whereReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentReviewComment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgentReviewComment extends Model
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
