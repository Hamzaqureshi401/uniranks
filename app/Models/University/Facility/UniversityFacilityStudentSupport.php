<?php

namespace App\Models\University\Facility;

use App\Models\Institutes\University;
use App\Models\Multimedia\Media;
use App\Models\Traits\HasTranslations;
use App\Models\University\UniversitySupportOfficeType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\University\Facility\UniversityFacilityStudentSupport
 *
 * @property int $id
 * @property int $university_id
 * @property int $office_type_id university_support_office_types_id
 * @property array|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string $contact_name
 * @property string|null $contact_email
 * @property array $translated_contact_name
 * @property array|null $translated_name
 * @property string|null $video_url
 * @property string|null $panorama_url
 * @property int|null $status
 * @property int|null $created_by_id
 * @property-read User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read University|null $university
 * @property-read UniversitySupportOfficeType|null $universitySupportOffice
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereContactName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereOfficeTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport wherePanoramaUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereTranslatedContactName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityStudentSupport whereVideoUrl($value)
 * @property-read bool $is_disabled
 * @property-read bool $is_enabled
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @mixin \Eloquent
 */
class UniversityFacilityStudentSupport extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name','translated_contact_name','description'];

    protected $fillable = [
        'university_id',
        'support_name',
        'description',
        'office_type_id',
        'support_name',
        'title',
        'contact_name','contact_email','translated_contact_name','translated_name','video_url','panorama_url','created_by_id','status'
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

    public function universitySupportOffice(): BelongsTo
    {
        return $this->belongsTo(UniversitySupportOfficeType::class, 'office_type_id');
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
