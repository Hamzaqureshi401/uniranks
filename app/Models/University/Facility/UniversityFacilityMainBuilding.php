<?php

namespace App\Models\University\Facility;

use App\Models\General\AreaUnit;
use App\Models\Institutes\University;
use App\Models\Multimedia\Media;
use App\Models\Multimedia\MediaUpdateRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\University\Facility\UniversityFacilityMainBuilding
 *
 * @property int $id
 * @property int $university_id
 * @property string|null $description
 * @property int|null $no_building
 * @property int|null $no_collage_buildings
 * @property int|null $no_campuses
 * @property int|null $no_schools
 * @property int|null $no_libraries
 * @property float|null $total_land_area
 * @property int|null $area_unit_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $no_labs
 * @property int|null $no_classrooms
 * @property int|null $no_auditoriums
 * @property int|null $created_by_id
 * @property-read AreaUnit|null $areaUnit
 * @property-read User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|Media[] $images
 * @property-read int|null $images_count
 * @property-read University|null $university
 * @property-read \Illuminate\Database\Eloquent\Collection|MediaUpdateRequest[] $updateMediaRequest
 * @property-read int|null $update_media_request_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereAreaUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereNoAuditoriums($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereNoBuilding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereNoCampuses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereNoClassrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereNoCollageBuildings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereNoLabs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereNoLibraries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereNoSchools($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereTotalLandArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuilding whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityFacilityMainBuilding extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'description',
        'no_building',
        'no_collage_buildings',
        'no_campuses',
        'no_schools',
        'no_libraries',
        'total_land_area',
        'area_unit_id',
        'created_by_id',
        'no_labs',
        'no_classrooms',
        'no_auditoriums'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function university(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,"created_by_id");
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function areaUnit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AreaUnit::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediaable');
    }

    public function updateMediaRequest(): MorphMany
    {
        return $this->morphMany(MediaUpdateRequest::class, 'mediaable');
    }
}
