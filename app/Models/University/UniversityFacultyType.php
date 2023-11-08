<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityFacultyType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacultyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacultyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacultyType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacultyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacultyType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacultyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacultyType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityFacultyType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityFacultyType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
