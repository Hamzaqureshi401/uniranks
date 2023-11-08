<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentContactNumber
 *
 * @property int $id
 * @property int $agent_id
 * @property string|null $dial_code
 * @property string $phone_number
 * @property string $ext
 * @property int|null $type
 * @property int|null $created_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AgentContactNumber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentContactNumber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentContactNumber query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentContactNumber whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentContactNumber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentContactNumber whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentContactNumber whereDialCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentContactNumber whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentContactNumber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentContactNumber wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentContactNumber whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentContactNumber whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgentContactNumber extends Model
{
    use HasFactory;
}
