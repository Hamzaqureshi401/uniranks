<?php

namespace App\Models\University\Information\UpdateRequestsModals;

use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Information\UniversityFrontVideos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityInfo\UpdateRequestsModals\UniversityFrontVideoUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property string|null $videos
 * @property int|null $related_record_id
 * @property int $status
 * @property string|null $remarks
 * @property int $type add,update,delete
 * @property int $requested_by_id
 * @property int $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereVideos($value)
 * @property string|null $old_value
 * @property string|null $what_changed
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontVideoUpdateRequest whereWhatChanged($value)
 * @property-read User|null $approvedBy
 * @property-read UniversityFrontVideos|null $originalData
 * @property-read User $requestedBy
 * @property-read University|null $university
 * @mixin \Eloquent
 */
class UniversityFrontVideoUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;


    protected $fillable = [
        'university_id',
        'videos',
        'related_record_id', 'old_value', 'what_changed',
        'status',
        'remarks',
        'type',
        'requested_by_id',
        'approved_by_id'
    ];

    protected $casts = [
        'created_at' => "datetime:Y-m-d H:i:s",
        'updated_at' => "datetime:Y-m-d H:i:s",
        'videos'=>'array'
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
        return $this->belongsTo(UniversityFrontVideos::class, 'related_record_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id');
    }
}
