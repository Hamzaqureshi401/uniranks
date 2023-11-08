<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentService
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AgentService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentService query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentService whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentService whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentService whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgentService extends Model
{
    use HasFactory;
}
