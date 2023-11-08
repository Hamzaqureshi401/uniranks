<?php

namespace App\Models\University\Information\UpdateRequestsModals;

use App\Models\Institutes\University;
use App\Models\Interfaces\UpdateRequest;
use App\Models\University\Information\UniversityFrontBanners;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityInfo\UpdateRequestsModals\UniversityFrontBannerUpdateRequest
 *
 * @property int $id
 * @property int|null $university_id
 * @property string|null $banners Data Format Json
 * @property int|null $related_record_id
 * @property int $status
 * @property string|null $remarks
 * @property int $type add,update,delete
 * @property int $requested_by_id
 * @property int $approved_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereApprovedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereBanners($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereRelatedRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereRequestedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereUpdatedAt($value)
 * @property string|null $old_value
 * @property string|null $what_changed
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFrontBannerUpdateRequest whereWhatChanged($value)
 * @property-read User|null $approvedBy
 * @property-read UniversityFrontBanners|null $originalData
 * @property-read User $requestedBy
 * @property-read University|null $university
 * @mixin \Eloquent
 */
class UniversityFrontBannerUpdateRequest extends Model implements UpdateRequest
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'banners',
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
        return $this->belongsTo(UniversityFrontBanners::class, 'related_record_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id');
    }
}
