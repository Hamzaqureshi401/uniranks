<?php

namespace App\Models\University\Facility;

use App\Models\Institutes\University;
use App\Models\Multimedia\Media;
use App\Models\Traits\HasTranslations;
use App\Models\University\UniversityClubType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\University\Facility\UniversityFacilityStudentLife
 *
 * @property int $id
 * @property int $university_id
 * @property int $club_type_id
 * @property array|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $video_url
 * @property string|null $panorama_url
 * @property int|null $category_id
 * @property string|null $title
 * @property array|null $translated_name
 * @property int|null $status
 * @property int|null $created_by_id
 * @property-read User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read University|null $university
 * @property-read UniversityClubType|null $universityClubType
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereClubTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife wherePanoramaUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereVideoUrl($value)
 * @property-read bool $is_disabled
 * @property-read bool $is_enabled
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property string $club_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentLife whereClubName($value)
 * @mixin \Eloquent
 */
class UniversityFacilityStudentLife extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name','description'];
    protected $fillable = [
        'university_id',
        'club_type_id',
        'title','category_id','translated_name','created_by_id','status', 'description',
        'video_url','panorama_url'
    ];
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
    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function universityClubType()
    {
        return $this->belongsTo(UniversityClubType::class, 'club_type_id');
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
