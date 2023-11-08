<?php

namespace App\Models\Research;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Research\ResearchField
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property array|null $translated_name
 * @property int|null $research_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Research\UniversityResearch[] $universityResearches
 * @property-read int|null $university_researches_count
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchField query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchField whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchField whereResearchTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchField whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchField whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchField whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ResearchField extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name','description'];

    protected $fillable = ['title','description','translated_name'];

    public function universityResearches(): HasMany
    {
        return $this->hasMany(UniversityResearch::class,'research_field_id');
    }
}
