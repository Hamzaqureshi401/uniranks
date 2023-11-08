<?php

namespace App\Models\University\Information;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\University\Information\UniversityFrontBanners
 *
 * @property int $id
 * @property int $university_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $image_path
 * @property string|null $title
 * @property string|null $translated_name json date: {"en":"...","ar":"..."}
 * @property int $status 0->Disabled 1->Enabled
 * @property int|null $created_by_id
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBanners newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBanners newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBanners query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBanners whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBanners whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBanners whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBanners whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBanners whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBanners whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBanners whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBanners whereUpdatedAt($value)
 * @property-read User|null $createdBy
 * @property-read mixed $image_url
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBanners whereCreatedById($value)
 * @property-read bool $is_disabled
 * @property-read bool $is_enabled
 * @mixin \Eloquent
 */
class UniversityFrontBanners extends Model
{
    use HasFactory;


    protected $fillable = [
        'image_path','title','translated_name','university_id','status','created_by_id',
    ];

    protected $appends = ['image_url','is_enabled','is_disabled'];

    public function getImageUrlAttribute(){
        return \AppConst::CDN_PATH.'/'.$this->image_path;
    }

    public function getIsEnabledAttribute(): bool
    {
        return $this->status == \AppConst::ENABLED;
    }

    public function getIsDisabledAttribute(): bool
    {
        return $this->status == \AppConst::DISABLED;
    }
    public function createdBy(){
        return $this->belongsTo(User::class,'created_by_id');
    }

    public function deletePhotoFromDisk()
    {
        if (empty($this->image_path)) {
            return;
        }
        Storage::disk( 's3')->delete($this->image_path);
    }

    public function delete()
    {
        $this->deletePhotoFromDisk();
        return parent::delete();
    }

}
