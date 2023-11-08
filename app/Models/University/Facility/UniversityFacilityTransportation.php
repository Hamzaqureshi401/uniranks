<?php

namespace App\Models\University\Facility;

use App\Models\General\VehicleType;
use App\Models\Institutes\University;
use App\Models\Multimedia\Media;
use App\Models\Traits\HasTranslations;
use App\Models\University\UniversityTransportType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\University\Facility\UniversityFacilityTransportation
 *
 * @property int $id
 * @property int $university_id
 * @property int $transport_type_id
 * @property int $vehicle_type_id
 * @property array|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property array|null $translated_name
 * @property int $gender_based
 * @property int $wifi_available
 * @property int|null $created_by_id
 * @property string|null $video_url
 * @property string|null $panorama_url
 * @property int|null $status
 * @property-read User|null $createdBy
 * @property-read bool $is_disabled
 * @property-read bool $is_enabled
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\University\Facility\UniversityTransportStop> $stops
 * @property-read int|null $stops_count
 * @property-read University|null $university
 * @property-read UniversityTransportType|null $universityTransportType
 * @property-read VehicleType|null $vehicleType
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereGenderBased($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation wherePanoramaUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereTransportTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereVehicleTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereVideoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityTransportation whereWifiAvailable($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $media
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\University\Facility\UniversityTransportStop> $stops
 * @mixin \Eloquent
 */
class UniversityFacilityTransportation extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name','description'];

    protected $fillable = [
        'university_id',
        'transport_type_id',
        'vehicle_type_id',
        'description',
        'gender_based','wifi_available',
        'title','translated_name','gender_based','wifi_available','created_by','video_url','panorama_url','created_by_id','status'
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
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function universityTransportType(): BelongsTo
    {
        return $this->belongsTo(UniversityTransportType::class, 'transport_type_id');
    }

    public function vehicleType(): BelongsTo
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediaable');
    }

    public function stops(): HasMany
    {
        return $this->hasMany(UniversityTransportStop::class,'university_transport_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by_id');
    }
}
