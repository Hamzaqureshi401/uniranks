<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\BookingRepresentative
 *
 * @property int $id
 * @property int $user_id
 * @property int $university_id
 * @property string|null $shift_start
 * @property string|null $shift_end
 * @property string|null $week_days
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative query()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereShiftEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereShiftStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereWeekDays($value)
 * @mixin \Eloquent
 */
class BookingRepresentative extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'university_id',
        'shift_start',
        'shift_end',
        'week_days',
    ];
}

