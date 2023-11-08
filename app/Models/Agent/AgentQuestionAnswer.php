<?php

namespace App\Models\Agent;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentQuestionAnswer
 *
 * @property int $id
 * @property int $question_id
 * @property int|null $by_user_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $byUser
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestionAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestionAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestionAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestionAnswer whereByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestionAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestionAnswer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestionAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestionAnswer whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestionAnswer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestionAnswer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentQuestionAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgentQuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['question_id','by_user_id','name','description','review_point','country_id','ip_address'];

    public function byUser(){
        return $this->belongsTo(User::class,'by_user_id');
    }
}
