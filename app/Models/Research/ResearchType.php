<?php

namespace App\Models\Research;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Research\ResearchType
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property array|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Research\UniversityResearch[] $universityResearches
 * @property-read int|null $university_researches_count
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ResearchType extends Model
{
    use HasFactory;


    use HasTranslations;
    public $translatable = ['translated_name','description'];

    protected $fillable = ['title','description','translated_name'];

    public function universityResearches(): HasMany
    {
        return $this->hasMany(UniversityResearch::class,'research_type_id');
    }
}
