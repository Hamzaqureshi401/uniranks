<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityLabName
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabName newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabName newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabName query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabName whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabName whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabName whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabName whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLabName whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityLabName extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
