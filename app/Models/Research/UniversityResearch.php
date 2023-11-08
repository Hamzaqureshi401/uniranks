<?php

namespace App\Models\Research;

use App\Models\Institutes\University;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Research\UniversityResearch
 *
 * @property int $id
 * @property int $university_id
 * @property int $research_type_id
 * @property int|null $research_field_id
 * @property string $title
 * @property string|null $introduction
 * @property string|null $scope
 * @property string|null $url
 * @property string|null $online_ssn
 * @property string|null $print_ssn
 * @property string|null $electronic_submission_url
 * @property string|null $publish_year
 * @property int|null $language_id
 * @property array|null $translated_name
 * @property int $is_open_for_reader 0->No, 1->yes
 * @property int $is_open_for_author 0->No, 1->yes
 * @property string|null $reader_fee
 * @property string|null $author_fee
 * @property string|null $papers_start_date
 * @property string|null $papers_end_date
 * @property string|null $rectangle_logo_path
 * @property string|null $square_logo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Research\UniversityResearchEditor[] $editors
 * @property-read int|null $editors_count
 * @property-read \App\Models\Research\ResearchField|null $field
 * @property-read string $logo_url
 * @property-read string $rectangle_url
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityResearch[] $listingPlatforms
 * @property-read int|null $listing_platforms_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Research\ResearchSubject[] $subjects
 * @property-read int|null $subjects_count
 * @property-read \App\Models\Research\ResearchType|null $type
 * @property-read University|null $university
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Research\UniversityResearchVolume[] $volumes
 * @property-read int|null $volumes_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereAuthorFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereElectronicSubmissionUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereIntroduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereIsOpenForAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereIsOpenForReader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereOnlineSsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch wherePapersEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch wherePapersStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch wherePrintSsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch wherePublishYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereReaderFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereRectangleLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereResearchFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereResearchTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereScope($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereSquareLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearch whereUrl($value)
 * @mixin \Eloquent
 */
class UniversityResearch extends Model
{
    use HasFactory;

    use HasTranslations;
    public $translatable = ['translated_name','description'];

    protected $fillable = ['university_id','research_type_id','research_field_id','title','introduction',
        'translated_name','scope','url','online_ssn','print_ssn','electronic_submission_url','publish_year',
        'language_id','is_open_for_reader','is_open_for_author','reader_fee','author_fee','papers_start_date',
        'papers_end_date','rectangle_logo_path','square_logo_path'];

    protected $appends = ['logo_url','rectangle_logo_url'];
    public function getLogoUrlAttribute(): string
    {
        return \AppConst::IMAGES_CDN_URL.'/'.$this->square_logo_path;
    }

    public function getRectangleUrlAttribute(): string
    {
        return \AppConst::IMAGES_CDN_URL.'/'.$this->rectangle_logo_path;
    }
    public function type(): BelongsTo
    {
        return $this->belongsTo(ResearchType::class,'research_type_id');
    }
    public function field(): BelongsTo
    {
        return $this->belongsTo(ResearchField::class,'research_field_id');
    }

    public function volumes(): HasMany
    {
        return $this->hasMany(UniversityResearchVolume::class,'university_research_id');
    }

    public function editors(): HasMany
    {
        return $this->hasMany(UniversityResearchEditor::class,'university_research_id');
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(ResearchSubject::class,UniversityResearchSubject::class,'university_research_id','research_subject_id');
    }

    public function listingPlatforms(): BelongsToMany
    {
        return $this->belongsToMany(UniversityResearch::class,UniversityResearchListingPlatform::class,'university_research_id','listing_platform_id');
    }

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id');
    }

}
