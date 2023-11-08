<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityHousingTerm
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingTerm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingTerm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingTerm query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingTerm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingTerm whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingTerm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingTerm whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingTerm whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityHousingTerm extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
