<?php

namespace App\Models\University;

use App\Models\General\Countries;
use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\University\UniversityContactNumber
 *
 * @property int $id
 * @property int $university_id
 * @property string|null $dial_code
 * @property string $phone_number
 * @property string $ext
 * @property int|null $type
 * @property int|null $created_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Countries|null $country
 * @property-read User|null $createdBy
 * @property-read string $full_phone_number
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityContactNumber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityContactNumber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityContactNumber query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityContactNumber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityContactNumber whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityContactNumber whereDialCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityContactNumber whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityContactNumber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityContactNumber wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityContactNumber whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityContactNumber whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityContactNumber whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityContactNumber extends Model
{
    use HasFactory;

    protected $fillable = ['university_id', 'dial_code', 'phone_number', 'ext', 'created_by_id', 'type'];

    protected $appends = ['full_phone_number'];

    /**
     * full phone numbers with country dial_code
     * @return string
     */
    public function getFullPhoneNumberAttribute(): string
    {
        return '+'.$this->dial_code.' '.$this->phone_number;
    }
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Countries::class, 'dial_code','country_code');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }


}
