<?php

namespace App\Models\PointingSystem;

use App\Models\Institutes\School;
use App\Models\School\SchoolPointHistory;
use App\Models\School\SchoolPointWithdrawalType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\PointingSystem\PointWithdrawalRequest
 *
 * @property int $id
 * @property int $withdrawal_type_id withdrawal type id
 * @property int $by_user who requested to withdraw
 * @property int $school_id
 * @property int|null $bank_account_id
 * @property float $points
 * @property float|null $amount_paid amount paid if its cash out
 * @property int|null $currency_id in what currency we paid
 * @property int $status
 * @property int|null $processed_by
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PointingSystem\PointTransaction[] $pointHistories
 * @property-read int|null $point_histories_count
 * @property-read User|null $processedBy
 * @property-read User|null $requestedBy
 * @property-read School|null $school
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest whereAmountPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest whereBankAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest whereByUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest whereProcessedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalRequest whereWithdrawalTypeId($value)
 * @mixin \Eloquent
 */
class PointWithdrawalRequest extends Model
{
    use HasFactory;

    protected $fillable = ['withdrawal_type_id','by_user','school_id','bank_account_id','points','amount_paid',
        'currency_id','status','processed_by','remarks'];

    /**
     * @return HasMany
     */
    public function pointHistories(): HasMany
    {
        return $this->hasMany(PointTransaction::class,'withdrawal_id');
    }

    /**
     * @return BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class,'school_id');
    }

    /**
     * @return BelongsTo
     */
    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'by_user');
    }

    /**
     * @return BelongsTo
     */
    public function processedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'processed_by');
    }


    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(SchoolPointWithdrawalType::class,'withdrawal_type_id');
    }
}
