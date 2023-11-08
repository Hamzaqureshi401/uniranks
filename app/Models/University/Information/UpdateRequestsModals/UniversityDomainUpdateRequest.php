<?php

namespace App\Models\University\Information\UpdateRequestsModals;

use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Information\UniversityDomains;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityInfo\UpdateRequestsModals\UniversityDomainUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property string|null $description
 * @property string|null $url
 * @property int|null $related_record_id
 * @property int $status
 * @property string|null $remarks
 * @property int $type add,update,delete
 * @property int $requested_by_id
 * @property int $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereUrl($value)
 * @property string|null $old_value
 * @property string|null $what_changed
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomainUpdateRequest whereWhatChanged($value)
 * @property-read User|null $approvedBy
 * @property-read University|null $originalData
 * @property-read User $requestedBy
 * @property-read University|null $university
 * @mixin \Eloquent
 */
class UniversityDomainUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;
    public string $actual_name = 'University Domain';

    protected $fillable = [
        'university_id',
        'description',
        'url',
        'related_record_id', 'old_value', 'what_changed',
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
        return $this->belongsTo(UniversityDomains::class, 'related_record_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }
}
