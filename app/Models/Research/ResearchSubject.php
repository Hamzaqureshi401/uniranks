<?php

namespace App\Models\Research;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Research\ResearchSubject
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property array|null $translated_name
 * @property int|null $main_subject_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read ResearchSubject|null $mainSubject
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Research\UniversityResearch[] $universityResearches
 * @property-read int|null $university_researches_count
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchSubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchSubject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchSubject query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchSubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchSubject whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchSubject whereMainSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchSubject whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchSubject whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchSubject whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ResearchSubject extends Model
{
    use HasFactory;


    use HasTranslations;
    public $translatable = ['translated_name','description'];

    protected $fillable = ['title','description','translated_name','main_subject_id'];

    public function universityResearches(): BelongsToMany
    {
        return $this->belongsToMany(UniversityResearch::class,UniversityResearchSubject::class,'research_subject_id','university_research_id');
    }

    public function mainSubject(): BelongsTo
    {
        return $this->belongsTo(ResearchSubject::class,'main_subject_id');
    }
}
