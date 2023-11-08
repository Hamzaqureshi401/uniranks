<?php

namespace App\Models\University\Facility;

use App\Models\Traits\HasTranslations;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\University\Facility\UniversityTransportStop
 *
 * @property int $id
 * @property int $university_transport_id
 * @property string $title
 * @property array|null $translated_name
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\University\Facility\UniversityTransportStopTime> $times
 * @property-read int|null $times_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStop query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStop whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStop whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStop whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStop whereUniversityTransportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportStop whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\University\Facility\UniversityTransportStopTime> $times
 * @mixin \Eloquent
 */
class UniversityTransportStop extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];

    protected $fillable = ['university_transport_id','title','translated_name','created_by'];

    public function times(): HasMany
    {
        return $this->hasMany(UniversityTransportStopTime::class,'stop_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }


}
