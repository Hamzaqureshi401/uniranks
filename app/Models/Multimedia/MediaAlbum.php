<?php

namespace App\Models\Multimedia;

use App\Models\Institutes\University;
use App\Models\Traits\HasTranslations;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use phpDocumentor\Reflection\Types\Self_;

/**
 * App\Models\Multimedia\MediaAlbum
 *
 * @property int $id
 * @property array $title json date: {"en":"...","ar":"..."}
 * @property array $description json date: {"en":"...","ar":"..."}
 * @property int|null $content_type 1=>Image, 2=>Video, 3=>panorama
 * @property int|null $created_by
 * @property int|null $university_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $createdByUser
 * @property-read bool $for_image
 * @property-read bool $for_panorama
 * @property-read bool $for_video
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Multimedia\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $university
 * @property-read int|null $university_count
 * @method static Builder|MediaAlbum newModelQuery()
 * @method static Builder|MediaAlbum newQuery()
 * @method static Builder|MediaAlbum query()
 * @method static Builder|MediaAlbum whereContentType($value)
 * @method static Builder|MediaAlbum whereCreatedAt($value)
 * @method static Builder|MediaAlbum whereCreatedBy($value)
 * @method static Builder|MediaAlbum whereDescription($value)
 * @method static Builder|MediaAlbum whereId($value)
 * @method static Builder|MediaAlbum whereTitle($value)
 * @method static Builder|MediaAlbum whereUniversityId($value)
 * @method static Builder|MediaAlbum whereUpdatedAt($value)
 * @method static Builder|MediaAlbum whereContentTypeImages()
 * @method static Builder|MediaAlbum whereContentTypePanorama()
 * @method static Builder|MediaAlbum whereContentTypeVideos()
 * @property-read bool $for_images
 * @property-read bool $for_panoramas
 * @property-read bool $for_videos
 * @property int $status 0->Disabled 1->Enabled
 * @method static Builder|MediaAlbum whereStatus($value)
 * @property-read bool $is_disabled
 * @property-read bool $is_enabled
 * @mixin \Eloquent
 */
class MediaAlbum extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['title','description'];

    protected $fillable = ['title','description','created_by','university_id','content_type','status'];
    protected $appends = ['for_images', 'for_videos', 'for_panoramas','is_enabled','is_disabled'];


    public function getIsEnabledAttribute(): bool
    {
        return $this->status == \AppConst::ENABLED;
    }

    public function getIsDisabledAttribute(): bool
    {
        return $this->status == \AppConst::DISABLED;
    }


    public function scopeWhereContentTypeImages(Builder $query): Builder
    {
        return $query->whereContentType(Media::TYPE_IMAGE);
    }
    public function scopeWhereContentTypeVideos(Builder $query): Builder
    {
        return $query->whereContentType(Media::TYPE_VIDEO);
    }
    public function scopeWhereContentTypePanorama(Builder $query): Builder
    {
        return $query->whereContentType(Media::TYPE_PENORAMA);
    }

    public function getForImagesAttribute(): bool
    {
        return $this->content_type == Media::TYPE_IMAGE;
    }

    public function getForVideosAttribute(): bool
    {
        return $this->content_type == Media::TYPE_VIDEO;
    }

    public function getForPanoramasAttribute():  bool
    {
        return $this->content_type == Media::TYPE_PENORAMA;
    }
    public function university(): BelongsToMany
    {
        return $this->belongsToMany(University::class,'university_id');
    }
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class,'mediaable');
    }

    public function createdByUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

//    public function delete()
//    {
//        $this->media()->delete();
//        return parent::delete(); // TODO: Change the autogenerated stub
//    }
}
