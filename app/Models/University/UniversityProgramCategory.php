<?php

namespace App\Models\University;

use App\Models\General\Countries;
use App\Models\General\Programs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityProgramCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Programs[] $programs
 * @property-read int|null $programs_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgramCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityProgramCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function programs(){
        return $this->hasMany(Programs::class, 'program_category_id');
    }
}
