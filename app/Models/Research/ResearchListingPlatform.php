<?php

namespace App\Models\Research;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Research\ResearchListingPlatform
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property array|null $translated_name
 * @property string|null $url
 * @property string|null $logo_path
 * @property int|null $research_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Research\UniversityResearch[] $universityResearches
 * @property-read int|null $university_researches_count
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchListingPlatform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchListingPlatform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchListingPlatform query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchListingPlatform whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchListingPlatform whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchListingPlatform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchListingPlatform whereLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchListingPlatform whereResearchTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchListingPlatform whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchListingPlatform whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchListingPlatform whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResearchListingPlatform whereUrl($value)
 * @mixin \Eloquent
 */
class ResearchListingPlatform extends Model
{
    use HasFactory;

    use HasTranslations;
    public $translatable = ['translated_name','description'];

    protected $fillable = ['title','description','translated_name','url','logo_path','research_type_id'];

    public function universityResearches(): BelongsToMany
    {
        return $this->belongsToMany(UniversityResearch::class,UniversityResearchListingPlatform::class,'listing_platform_id','university_research_id');
    }
}
