<?php

namespace App\Models\University\Preferences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\Preferences\UniversityPreferredMajor
 *
 * @property int $id
 * @property int $university_id
 * @property int $major_id
 * @property int|null $created_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPreferredMajor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPreferredMajor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPreferredMajor query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPreferredMajor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPreferredMajor whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPreferredMajor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPreferredMajor whereMajorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPreferredMajor whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPreferredMajor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityPreferredMajor extends Model
{
    use HasFactory;

    protected $fillable = ['university_id','major_id','created_by_id'];
}
