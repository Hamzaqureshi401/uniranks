<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentProvingService
 *
 * @property int $id
 * @property int $agent_id
 * @property int $agent_service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AgentProvingService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentProvingService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentProvingService query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentProvingService whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentProvingService whereAgentServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentProvingService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentProvingService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentProvingService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgentProvingService extends Model
{
    use HasFactory;
}
