<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityTransportType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityTransportType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityTransportType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
