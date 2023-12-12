<?php

namespace App\Models\User;

use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\User\UserSessionsHistory
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $country
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property int|null $session_id
 * @property mixed|null $ended_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereEndedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereUserId($value)
 * @mixin \Eloquent
 * @property-read Session|null $activeSession
 */
class UserSessionsHistory extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','country','ip_address','user_agent','session_id','ended_at'];
    public function activeSession(): BelongsTo
    {
        return $this->belongsTo(Session::class,'session_id');
    }
}
