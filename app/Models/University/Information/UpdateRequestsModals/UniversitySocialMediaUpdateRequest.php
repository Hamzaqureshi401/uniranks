<?php

namespace App\Models\University\Information\UpdateRequestsModals;

use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Information\UniversitySocialMedia;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityInfo\UpdateRequestsModals\UniversitySocialMediaUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
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
 * @property int|null $related_record_id
 * @property int $status
 * @property string|null $remarks
 * @property int $type add,update,delete
 * @property int $requested_by_id
 * @property int $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereBehance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereDribble($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereDropbox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereGoogle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest wherePinterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereSkype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereSnapchat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereVimeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereWhatsapp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereYoutube($value)
 * @property string|null $old_value
 * @property string|null $what_changed
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySocialMediaUpdateRequest whereWhatChanged($value)
 * @property-read User|null $approvedBy
 * @property-read UniversitySocialMedia|null $originalData
 * @property-read User $requestedBy
 * @property-read University|null $university
 * @mixin \Eloquent
 */
class UniversitySocialMediaUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;

    protected $fillable = [
        'university_id', 'facebook', 'linkedin', 'whatsapp', 'youtube', 'instagram', 'twitter', 'dropbox', 'snapchat',
        'behance', 'dribble', 'pinterest', 'vimeo', 'skype', 'google',
        'related_record_id', 'old_value', 'what_changed',
        'status',
        'remarks',
        'type',
        'requested_by_id',
        'approved_by_id'
    ];

    protected $casts = [
        'created_at' => "datetime:Y-m-d H:i:s",
        'updated_at' => "datetime:Y-m-d H:i:s",
    ];

    /**
     * @return BelongsTo
     */
    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by_id');
    }

    /**
     * @return BelongsTo
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    /**
     * @return BelongsTo
     */
    public function originalData(): BelongsTo
    {
        return $this->belongsTo(UniversitySocialMedia::class, 'related_record_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id');
    }
}
