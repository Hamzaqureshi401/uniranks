<?php

namespace App\Models\Transactions;

use App\Models\Fairs\Fair;
use App\Models\Institutes\Agent;
use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transactions\EventCreditTransaction
 *
 * @property int $id
 * @property int|null $agent_id
 * @property int|null $university_id
 * @property int|null $event_id
 * @property string|null $event_name
 * @property int $credit_out
 * @property int $credit_in
 * @property int|null $by_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $event_package_client_id
 * @property string|null $event_type
 * @property-read Agent|null $agent
 * @property-read Fair|null $event
 * @property-read \App\Models\Transactions\EventPackageClient|null $eventPackageClient
 * @property-read bool $is_reverse
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction selectAgentBalance()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction selectUniversityBalance()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction whereByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction whereCreditIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction whereCreditOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction whereEventName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction whereEventPackageClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction whereEventType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCreditTransaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventCreditTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['agent_id', 'university_id', 'event_id','event_package_client_id','event_type', 'event_name', 'credit_out', 'credit_in', 'by_user_id',];

    protected $appends = ['is_reverse'];

    public function getIsReverseAttribute(): bool
    {
        return !empty($this->event_id) && $this->credit_in > 0;
    }
    public function scopeSelectAgentBalance($query)
    {
        return  $query->selectRaw('* ,COALESCE(((SELECT SUM(credit_in) FROM event_credit_transactions b WHERE b.id <= event_credit_transactions.id and b.agent_id = event_credit_transactions.agent_id) - (SELECT SUM(credit_out) FROM event_credit_transactions b WHERE b.id <= event_credit_transactions.id and b.agent_id = event_credit_transactions.agent_id)), 0) as balance');
    }
    public function scopeSelectUniversityBalance($query)
    {
        return  $query->selectRaw('* ,COALESCE(((SELECT SUM(credit_in) FROM event_credit_transactions b WHERE b.id <= event_credit_transactions.id and b.university_id = event_credit_transactions.university_id) - (SELECT SUM(credit_out) FROM event_credit_transactions b WHERE b.id <= event_credit_transactions.id and b.university_id = event_credit_transactions.university_id)), 0) as balance');
    }



    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    public function event()
    {
        return $this->belongsTo(Fair::class, 'event_id');
    }

    public function eventPackageClient(){
        return $this->belongsTo(EventPackageClient::class,'event_package_client_id');
    }

}
