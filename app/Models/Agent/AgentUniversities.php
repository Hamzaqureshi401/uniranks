<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentUniversities
 *
 * @property int $id
 * @property int $agent_id
 * @property int $university_id
 * @property int $status
 * @property int|null $processed_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AgentUniversities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentUniversities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentUniversities query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentUniversities whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentUniversities whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentUniversities whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentUniversities whereProcessedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentUniversities whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentUniversities whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentUniversities whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgentUniversities extends Model
{
    use HasFactory;
}
