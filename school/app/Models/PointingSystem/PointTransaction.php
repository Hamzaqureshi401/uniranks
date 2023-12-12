<?php

namespace App\Models\PointingSystem;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\PointingSystem\PointTransaction
 *
 * @property int $id
 * @property string $recipient_type
 * @property int $recipient_id
 * @property int|null $point_type_id
 * @property int|null $withdrawal_id
 * @property string|null $description
 * @property float|null $points_in
 * @property float|null $points_out
 * @property int|null $by_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $recipient
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction whereByUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction wherePointTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction wherePointsIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction wherePointsOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction whereRecipientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction whereRecipientType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction whereWithdrawalId($value)
 * @mixin \Eloquent
 * @property string $earned_for_type
 * @property int $earned_for_id
 * @property-read \App\Models\PointingSystem\PointType|null $pointType
 * @property-read \App\Models\PointingSystem\PointWithdrawalRequest|null $pointWithdrawal
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction whereEarnedForId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointTransaction whereEarnedForType($value)
 * @property-read Model|\Eloquent $earned_for
 */
class PointTransaction extends Model
{

    use HasFactory;

    use HasFactory;

    protected $fillable = ['recipient_type', 'recipient_id', 'point_type_id', 'withdrawal_id', 'description', 'points_in', 'points_out',
        'by_user', 'earned_for_type', 'earned_for_id'];

    public function recipient(): MorphTo
    {
        return $this->morphTo();
    }

    public function earned_for(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return BelongsTo
     */
    public function pointType(): BelongsTo
    {
        return $this->belongsTo(PointType::class, 'point_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function pointWithdrawal(): BelongsTo
    {
        return $this->belongsTo(PointWithdrawalRequest::class, 'withdrawal_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'by_user');
    }
}
