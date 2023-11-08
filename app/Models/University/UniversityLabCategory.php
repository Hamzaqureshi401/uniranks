<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityLabCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityLabCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
