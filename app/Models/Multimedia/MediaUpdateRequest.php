<?php

namespace App\Models\Multimedia;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Multimedia\MediaUpdateRequest
 *
 * @property-read string $image_url
 * @property-read Model|\Eloquent $mediaable
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest query()
 * @property-read bool $is_image
 * @property-read bool $is_panorama
 * @property-read bool $is_video
 * @property-read User|null $requestedBy
 * @property int $id
 * @property string $mediaable_type
 * @property int $mediaable_id
 * @property int $media_type 1=>Image, 2=>Video, 3=>panorama
 * @property string|null $title
 * @property string $url
 * @property string|null $old_value
 * @property string|null $what_changed
 * @property int $status
 * @property string|null $remarks
 * @property int $type add,update,delete
 * @property int $requested_by_id
 * @property int|null $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereMediaType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereMediaableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereMediaableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 */
class MediaUpdateRequest extends Model
{
    use HasFactory;
    protected $fillable = ['mediaable_type','mediaable_id','media_type','title','url','created_by','related_record_id', 'old_value', 'what_changed',
        'status',
        'remarks',
        'type',
        'requested_by_id',
        'approved_by_id'];

    protected $appends = ['image_url','is_image','is_video','is_panorama'];
    public function getImageUrlAttribute(): string
    {
        return \AppConst::CDN_PATH.'/'.$this->url;
    }

    public function getIsImageAttribute(): bool
    {
        return $this->media_type == Media::TYPE_IMAGE;
    }

    public function getIsVideoAttribute(): bool
    {
        return $this->media_type == Media::TYPE_VIDEO;
    }

    public function getIsPanoramaAttribute():  bool
    {
        return $this->media_type == Media::TYPE_PENORAMA;
    }

    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'requested_by_id');
    }

    public function mediaable(): MorphTo
    {
        return $this->morphTo();
    }
}
