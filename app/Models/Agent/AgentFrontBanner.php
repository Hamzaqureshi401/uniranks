<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentFrontBanner
 *
 * @property int $id
 * @property int $agent_id
 * @property string $image_path
 * @property string|null $title
 * @property string|null $translated_name json date: {"en":"...","ar":"..."}
 * @property int $status 0->Disabled 1->Enabled
 * @property int|null $created_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFrontBanner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFrontBanner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFrontBanner query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFrontBanner whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFrontBanner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFrontBanner whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFrontBanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFrontBanner whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFrontBanner whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFrontBanner whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFrontBanner whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFrontBanner whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgentFrontBanner extends Model
{
    use HasFactory;
}
