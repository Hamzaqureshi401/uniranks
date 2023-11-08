<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityDegreeType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDegreeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDegreeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDegreeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDegreeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDegreeType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDegreeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDegreeType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDegreeType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityDegreeType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
