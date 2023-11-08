<?php

namespace App\Models\University\Facility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\Facility\UniversityTransportStopTime
 *
 * @property int $id
 * @property int $stop_id
 * @property string $time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStopTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStopTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStopTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStopTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStopTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStopTime whereStopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStopTime whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStopTime whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityTransportStopTime extends Model
{
    use HasFactory;

    protected $fillable = ['stop_id','time'];

}
