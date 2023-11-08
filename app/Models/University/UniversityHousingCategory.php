<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityHousingCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityHousingCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
