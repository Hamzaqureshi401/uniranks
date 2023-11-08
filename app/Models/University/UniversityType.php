<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
