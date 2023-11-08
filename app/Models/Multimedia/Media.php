<?php

namespace App\Models\Multimedia;

use App\Models\General\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\Features;

/**
 * App\Models\Multimedia\Media
 *
 * @property int $id
 * @property string $mediaable_type
 * @property int $mediaable_id
 * @property int $media_type 1=>Image, 2=>Video, 3=>panorama
 * @property string|null $title
 * @property string $url
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $image_url
 * @property-read Model|\Eloquent $mediaable
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMediaType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMediaableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMediaableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUrl($value)
 * @property-read bool $is_image
 * @property-read bool $is_panorama
 * @property-read bool $is_video
 * @property-read User|null $createdByUser
 * @property int|null $language_id
 * @property-read Language|null $language
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereLanguageId($value)
 * @mixin \Eloquent
 */
class Media extends Model
{
    use HasFactory;

    protected $fillable = ['mediaable_type', 'mediaable_id', 'media_type', 'title', 'url', 'created_by','language_id'];
    protected $appends = ['image_url', 'is_image', 'is_video', 'is_panorama'];

    const TYPE_IMAGE = 1;
    const TYPE_VIDEO = 2;
    const TYPE_PENORAMA = 3;

    public function getImageUrlAttribute(): string
    {
        return \AppConst::CDN_PATH . '/' . $this->url;
    }

    /**
     * @return bool
     */
    public function getIsImageAttribute(): bool
    {
        return $this->media_type == self::TYPE_IMAGE;
    }

    public function getIsVideoAttribute(): bool
    {
        return $this->media_type == self::TYPE_VIDEO;
    }

    public function getIsPanoramaAttribute():  bool
    {
        return $this->media_type == self::TYPE_PENORAMA;
    }

    public function mediaable(): MorphTo
    {
        return $this->morphTo();
    }

    public function createdByUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class,'language_id');
    }

    public function deletePhotoFromDisk()
    {
        if (empty($this->url) || $this->media_type != self::TYPE_IMAGE) {
            return;
        }
        Storage::disk( 's3')->delete($this->url);
    }

//    public function delete()
//    {
//        $this->deletePhotoFromDisk();
//        return parent::delete();
//    }
}
