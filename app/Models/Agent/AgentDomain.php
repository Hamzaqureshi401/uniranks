<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentDomain
 *
 * @property int $id
 * @property int|null $domain_type_id
 * @property int $university_id
 * @property string|null $description
 * @property string $url
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AgentDomain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentDomain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentDomain query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentDomain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentDomain whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentDomain whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentDomain whereDomainTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentDomain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentDomain whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentDomain whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentDomain whereUrl($value)
 * @mixin \Eloquent
 * @property int $agent_id
 * @method static \Illuminate\Database\Eloquent\Builder|AgentDomain whereAgentId($value)
 */
class AgentDomain extends Model
{
    use HasFactory;
}
