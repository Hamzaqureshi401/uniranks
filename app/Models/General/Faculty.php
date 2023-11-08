<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use App\Models\University\Admissions\UniversityAdmissionProgram;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\General\Faculty
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $short_description
 * @property array|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\Major[] $programs
 * @property-read int|null $programs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityAdmissionProgram[] $universityPrograms
 * @property-read int|null $university_programs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Faculty extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];
    protected $fillable = ['title','description','short_description','translated_name'];

    public function universityPrograms(): HasMany
    {
        return $this->hasMany(UniversityAdmissionProgram::class);
    }
    public function programs(): HasMany
    {
        return $this->hasMany(Major::class,'faculty_id');
    }

}
