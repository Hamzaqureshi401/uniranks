<?php

namespace App\Models\University\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UniversityInfo\UniversityLanguages
 *
 * @property int $id
 * @property int $university_id
 * @property int $language_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguages query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguages whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguages whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLanguages whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityLanguages extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'language_id',
    ];
}
