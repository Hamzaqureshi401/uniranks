<?php

namespace App\Models\PointingSystem;

use App\Models\Institutes\School;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\PointingSystem\PointWithdrawalType
 *
 * @property int $id
 * @property string $title
 * @property array|null $translated_name
 * @property string|null $short_description
 * @property string|null $description
 * @property int $bank_account_required Bank account needed to use this withdraw method
 * @property int $cash_out if this type is cash out
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $schools
 * @property-read int|null $schools_count
 * @property-read \App\Models\PointingSystem\PointWithdrawalRequest|null $withdrawalRequests
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalType whereBankAccountRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalType whereCashOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalType whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointWithdrawalType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PointWithdrawalType extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['translated_name'];

    protected $fillable = ['title', 'short_description', 'description', 'min_amount', 'max_amount', 'bank_account_required',
        'cash_out'];

    //TODO:APPEND ATTRIBUTE FOR IS_CASHOUT

    public function withdrawalRequests(): BelongsTo
    {
        return $this->belongsTo(PointWithdrawalRequest::class, 'withdrawal_type_id');
    }

    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class, PointWithdrawalRequest::class, 'withdrawal_type_id', 'school_id');
    }
}
