<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentSocialMediaLink
 *
 * @property int $id
 * @property int|null $agent_id
 * @property string|null $facebook
 * @property string|null $uniranks
 * @property string|null $linkedin
 * @property string|null $youtube
 * @property string|null $whatsapp
 * @property string|null $instagram
 * @property string|null $twitter
 * @property string|null $dropbox
 * @property string|null $snapchat
 * @property string|null $behance
 * @property string|null $dribble
 * @property string|null $pinterest
 * @property string|null $vimeo
 * @property string|null $skype
 * @property string|null $google
 * @property int|null $updated_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereBehance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereDribble($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereDropbox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereGoogle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink wherePinterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereSkype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereSnapchat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereUniranks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereVimeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereWhatsapp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentSocialMediaLink whereYoutube($value)
 * @mixin \Eloquent
 */
class AgentSocialMediaLink extends Model
{
    use HasFactory;
}
