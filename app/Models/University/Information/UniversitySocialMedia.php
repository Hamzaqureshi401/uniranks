<?php

namespace App\Models\University\Information;

use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityInfo\UniversitySocialMedia
 *
 * @property int $id
 * @property int $university_id
 * @property string|null $facebook
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereBehance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereDribble($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereDropbox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereGoogle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia wherePinterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereSkype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereSnapchat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereVimeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereWhatsapp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereYoutube($value)
 * @property-read University $university
 * @property string|null $uniranks
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereUniranks($value)
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMedia whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class UniversitySocialMedia extends Model
{
    use HasFactory;

//    protected $hidden = [
//        'google',
//        'university_id','id'
//    ];

    protected $guarded = [];
    protected $fillable = [
        'university_id', 'facebook', 'linkedin', 'whatsapp', 'youtube', 'instagram', 'twitter', 'dropbox', 'snapchat',
        'behance', 'dribble', 'pinterest', 'vimeo', 'skype', 'google'];

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id');
    }
}
