<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityHousingLocationType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingLocationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingLocationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingLocationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingLocationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingLocationType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingLocationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingLocationType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingLocationType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityHousingLocationType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
