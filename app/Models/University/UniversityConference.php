<?php

namespace App\Models\University;

use App\Models\Institutes\University;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\University\UniversityConference
 *
 * @property int $id
 * @property int $university_id
 * @property int $university_conference_type_id
 * @property string $title
 * @property string|null $translated_name
 * @property string|null $description
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $url
 * @property string|null $rectangle_logo_path
 * @property string|null $square_logo_path
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $logo_url
 * @property-read string $rectangle_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\University\UniversityConferenceSubject[] $subjects
 * @property-read int|null $subjects_count
 * @property-read \App\Models\University\UniversityConferenceType|null $type
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereRectangleLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereSquareLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereUniversityConferenceTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConference whereUrl($value)
 * @property-read array $translations
 * @mixin \Eloquent
 */
class UniversityConference extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];
    protected $fillable = ['university_id','university_conference_type_id','title','translated_name',
        'description','start_date','end_date','url','rectangle_logo_path','square_logo_path','created_by'];

    protected $appends = ['logo_url','rectangle_logo_url'];
    public function getLogoUrlAttribute(): string
    {
        return \AppConst::IMAGES_CDN_URL.'/'.$this->square_logo_path;
    }

    public function getRectangleUrlAttribute(): string
    {
        return \AppConst::IMAGES_CDN_URL.'/'.$this->rectangle_logo_path;
    }

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(UniversityConferenceType::class,'university_conference_type_id');
    }

    public function subjects(): HasMany
    {
        return $this->hasMany(UniversityConferenceSubject::class,'university_conference_id');
    }
}
