<?php

namespace App\Models\University\Facility;

use App\Models\University\UniversityHousingServices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\Facility\UniversityFacilityHousingServices
 *
 * @property int $id
 * @property int $housing_id
 * @property int $service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read UniversityHousingServices|null $services
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingServices newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingServices newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingServices query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingServices whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingServices whereHousingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingServices whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingServices whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacilityHousingServices whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityFacilityHousingServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'housing_id',
        'service_id',
    ];

    public function services()
    {
        return $this->belongsTo(UniversityHousingServices::class, 'service_id');
    }
}
