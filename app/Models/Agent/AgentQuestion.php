<?php

namespace App\Models\Agent;

use App\Models\Institutes\Agent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentQuestion
 *
 * @property int $id
 * @property int $agent_id
 * @property int|null $by_user_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Agent|null $agent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Agent\AgentQuestionAnswer[] $answers
 * @property-read int|null $answers_count
 * @property-read User|null $byUser
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestion whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestion whereByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestion whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestion whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgentQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['agent_id','by_user_id','name','description','review_point','country_id','ip_address'];


    public function agent(){
        return $this->belongsTo(Agent::class,'agent_id');
    }
    public function byUser(){
        return $this->belongsTo(User::class,'by_user_id');
    }

    public function answers(){
        return $this->hasMany(AgentQuestionAnswer::class,'question_id');
    }
}
