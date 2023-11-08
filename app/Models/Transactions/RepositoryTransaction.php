<?php

namespace App\Models\Transactions;

use App\Models\Institutes\Agent;
use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transactions\RepositoryTransaction
 *
 * @property int $id
 * @property int|null $agent_id
 * @property int|null $university_id
 * @property string|null $description
 * @property float|null $avg_ur_cost
 * @property float $quantity_purchased
 * @property float|null $ur_credit_out
 * @property float|null $ur_credit_in
 * @property int|null $by_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Agent|null $agent
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction selectAgentBalance()
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction selectUniversityBalance()
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction whereAvgUrCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction whereByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction whereQuantityPurchased($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction whereUrCreditIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepositoryTransaction whereUrCreditOut($value)
 * @mixin \Eloquent
 */
class RepositoryTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['university_id','agent_id','description','avg_ur_cost','quantity_purchased','ur_credit_out','ur_credit_in','by_user_id'];
    public function agent(){
        return $this->belongsTo(Agent::class,'agent_id');
    }

    public function scopeSelectAgentBalance($query){
        return $query->selectRaw('* ,COALESCE(((SELECT SUM(ur_credit_in) FROM repository_transactions b WHERE b.id <= repository_transactions.id and b.agent_id = repository_transactions.agent_id) - (SELECT SUM(ur_credit_out) FROM repository_transactions b WHERE b.id <= repository_transactions.id  and b.agent_id = repository_transactions.agent_id)), 0) as ur_balance');
    }

    public function scopeSelectUniversityBalance($query){
        return $query->selectRaw('* ,COALESCE(((SELECT SUM(ur_credit_in) FROM repository_transactions b WHERE b.id <= repository_transactions.id and b.university_id = repository_transactions.university_id) - (SELECT SUM(ur_credit_out) FROM repository_transactions b WHERE b.id <= repository_transactions.id  and b.university_id = repository_transactions.university_id)), 0) as ur_balance');
    }

    public function university(){
        return $this->belongsTo(University::class,'university_id');
    }
}
