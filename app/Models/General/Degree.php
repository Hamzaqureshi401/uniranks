<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use App\Models\University\Admissions\UniversityAdmissionProgram;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\General\Degree
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $short_description
 * @property array|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityAdmissionProgram[] $universityPrograms
 * @property-read int|null $university_programs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Degree newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Degree newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Degree query()
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Degree extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];
    protected $fillable = ['title','description','short_description','translated_name'];

    public function universityPrograms(): HasMany
    {
        return $this->hasMany(UniversityAdmissionProgram::class);
    }
}
