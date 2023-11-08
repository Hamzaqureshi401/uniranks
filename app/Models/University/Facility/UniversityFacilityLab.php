<?php

namespace App\Models\University\Facility;

use App\Models\Institutes\University;
use App\Models\Multimedia\Media;
use App\Models\Traits\HasTranslations;
use App\Models\University\UniversityLabCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\University\Facility\UniversityFacilityLab
 *
 * @property int $id
 * @property int $university_id
 * @property int $university_lab_category_id
 * @property string|null $name
 * @property array|null $translated_name
 * @property int $no_labs Number Of labs
 * @property array|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $student_capacity Number of students
 * @property string|null $size Lab size in M
 * @property \Illuminate\Support\Carbon|null $created_date created or renewed_date
 * @property int|null $created_by_id
 * @property string|null $video_url
 * @property string|null $panorama_url
 * @property int|null $status
 * @property-read User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read University|null $university
 * @property-read UniversityLabCategory|null $universityLabCategory
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereCreatedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereNoLabs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab wherePanoramaUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereStudentCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereUniversityLabCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityLab whereVideoUrl($value)
 * @property-read bool $is_disabled
 * @property-read bool $is_enabled
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @mixin \Eloquent
 */
class UniversityFacilityLab extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name','description'];

    protected $fillable = [
        'university_id',
        'university_lab_category_id',
        'name', 'translated_name', 'student_capacity',
        'size', 'created_date', 'created_by_id',
        'no_labs',
        'description','video_url','panorama_url','status'
    ];
    protected $guarded = ['id'];
    protected $casts = ['created_date'=>'datetime'];
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
    public function universityLabCategory(): BelongsTo
    {
        return $this->belongsTo(UniversityLabCategory::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by_id');
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediaable');
    }
}
