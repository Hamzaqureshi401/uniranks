<?php

namespace App\Models\University\Facility\UpdateRequestsModals;

use App\Models\General\AreaUnit;
use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Facility\UniversityFacilityMainBuilding;
use App\Models\UniversityFacility\UniversityFacilityMainBuildingImages;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityFacility\UpdateRequestsModals\UniversityFacilityMainBuildingUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property string|null $description
 * @property int|null $no_building
 * @property int|null $no_collage_buildings
 * @property int|null $no_campuses
 * @property int|null $no_schools
 * @property int|null $no_libraries
 * @property float|null $total_land_area
 * @property int|null $area_unit_id
 * @property int|null $related_record_id
 * @property string|null $old_value
 * @property string|null $what_changed
 * @property int $status
 * @property string|null $remarks
 * @property int $type add,update,delete
 * @property int $requested_by_id
 * @property int $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $approvedBy
 * @property-read AreaUnit|null $areaUnit
 * @property-read AreaUnit|null $areaUnitOld
 * @property-read UniversityFacilityMainBuilding|null $originalData
 * @property-read User|null $requestedBy
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereAreaUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereNoBuilding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereNoCampuses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereNoCollageBuildings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereNoLibraries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereNoSchools($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereTotalLandArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityMainBuildingUpdateRequest whereWhatChanged($value)
 * @mixin \Eloquent
 */
class UniversityFacilityMainBuildingUpdateRequest extends Model implements UpdateRequest
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
        'related_record_id','old_value','what_changed',
        'status',
        'remarks',
        'type',
        'requested_by_id',
        'approved_by_id'
    ];
    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => "datetime:Y-m-d H:i:s",
        'updated_at' => "datetime:Y-m-d H:i:s",
    ];

    /**
     * @return BelongsTo
     */
    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by_id');
    }

    /**
     * @return BelongsTo
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    /**
     * @return BelongsTo
     */
    public function originalData(): BelongsTo
    {
        return $this->belongsTo(UniversityFacilityMainBuilding::class, 'related_record_id');
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
    public function areaUnit(): BelongsTo
    {
        return $this->belongsTo(AreaUnit::class);
    }
    /**
     * @return BelongsTo
     */
    public function areaUnitOld(): BelongsTo
    {
        return $this->belongsTo(AreaUnit::class,'old_value');
    }
}
