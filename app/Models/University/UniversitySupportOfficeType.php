<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversitySupportOfficeType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySupportOfficeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySupportOfficeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySupportOfficeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySupportOfficeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySupportOfficeType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySupportOfficeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySupportOfficeType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySupportOfficeType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversitySupportOfficeType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
