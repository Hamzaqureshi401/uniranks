<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityProgramFeeTerm
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramFeeTerm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramFeeTerm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramFeeTerm query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramFeeTerm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramFeeTerm whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramFeeTerm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramFeeTerm whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramFeeTerm whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityProgramFeeTerm extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
