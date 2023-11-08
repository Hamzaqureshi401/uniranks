<?php

namespace App\Models\University\Information;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\Information\UniversityFrontVideos
 *
 * @property int $id
 * @property int $university_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $url
 * @property string|null $title
 * @property string|null $translated_name json date: {"en":"...","ar":"..."}
 * @property int $status 0->Disabled 1->Enabled
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideos query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideos whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideos whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideos whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideos whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideos whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideos whereUrl($value)
 * @property int|null $created_by_id
 * @property-read User|null $createdBy
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideos whereCreatedById($value)
 * @property-read bool $is_disabled
 * @property-read bool $is_enabled
 * @mixin \Eloquent
 */
class UniversityFrontVideos extends Model
{
    use HasFactory;

    protected $fillable = [
        'url','title','translated_name','university_id','status','created_by_id',
    ];

    protected $appends = ['is_enabled','is_disabled'];

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by_id');
    }

    public function getIsEnabledAttribute(): bool
    {
        return $this->status == \AppConst::ENABLED;
    }

    public function getIsDisabledAttribute(): bool
    {
        return $this->status == \AppConst::DISABLED;
    }
}
