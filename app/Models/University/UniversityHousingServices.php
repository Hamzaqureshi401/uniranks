<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityHousingServices
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingServices newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingServices newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingServices query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingServices whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingServices whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingServices whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingServices whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityHousingServices whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityHousingServices extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
