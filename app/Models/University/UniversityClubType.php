<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityClubType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityClubType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityClubType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityClubType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityClubType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityClubType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityClubType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityClubType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityClubType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityClubType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
