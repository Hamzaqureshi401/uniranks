<?php

namespace App\Models\University\Information\UpdateRequestsModals;

use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Information\UniversityLanguages;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityInfo\UpdateRequestsModals\UniversityLanguageUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $language_id
 * @property int|null $related_record_id
 * @property int $status
 * @property string|null $remarks
 * @property int $type add,update,delete
 * @property int $requested_by_id
 * @property int $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereUpdatedAt($value)
 * @property string|null $old_value
 * @property string|null $what_changed
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguageUpdateRequest whereWhatChanged($value)
 * @property-read User|null $approvedBy
 * @property-read UniversityLanguages|null $originalData
 * @property-read User $requestedBy
 * @property-read University|null $university
 * @mixin \Eloquent
 */
class UniversityLanguageUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'language_id',
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
        return $this->belongsTo(UniversityLanguages::class, 'related_record_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id');
    }
}
