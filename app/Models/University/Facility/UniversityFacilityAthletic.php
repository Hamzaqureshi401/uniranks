<?php

namespace App\Models\University\Facility;

use App\Models\General\SportsName;
use App\Models\General\SportsType;
use App\Models\Institutes\University;
use App\Models\Multimedia\Media;
use App\Models\Traits\HasTranslations;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\University\Facility\UniversityFacilityAthletic
 *
 * @property int $id
 * @property int $university_id
 * @property int $sports_type_id
 * @property int $sports_name_id
 * @property array|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $video_url
 * @property string|null $panorama_url
 * @property int|null $status
 * @property int|null $created_by_id
 * @property string $title
 * @property array|null $translated_name
 * @property-read User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read SportsName|null $sportsName
 * @property-read SportsType|null $sportsType
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic wherePanoramaUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereSportsNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereSportsTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereVideoUrl($value)
 * @property-read bool $is_disabled
 * @property-read bool $is_enabled
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property int|null $category_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityAthletic whereCategoryId($value)
 * @mixin \Eloquent
 */
class UniversityFacilityAthletic extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name','description'];
    protected $fillable = ['university_id', 'sports_type_id', 'sports_name_id',
        'title','translated_name','created_by_id','status', 'description','video_url','panorama_url',];
    protected $guarded = ['id'];

    protected $appends = ['is_enabled','is_disabled'];


    public function getIsEnabledAttribute(): bool
    {
        return $this->status == \AppConst::ENABLED;
    }

    public function getIsDisabledAttribute(): bool
    {
        return $this->status == \AppConst::DISABLED;
    }
    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    /**
     * @return BelongsTo
     */
    public function sportsType(): BelongsTo
    {
        return $this->belongsTo(SportsType::class, 'sports_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function sportsName(): BelongsTo
    {
        return $this->belongsTo(SportsName::class, 'sports_name_id');
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediaable');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by_id');
    }
}
