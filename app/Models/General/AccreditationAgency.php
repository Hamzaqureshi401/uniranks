<?php

namespace App\Models\General;

use App\Models\University\Admissions\UniversityAccreditationAgency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\General\AccreditationAgency
 *
 * @property int $id
 * @property string $title
 * @property string|null $translated_name
 * @property string|null $description
 * @property string|null $url
 * @property string|null $rectangle_logo_path
 * @property string|null $square_logo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $logo_url
 * @property-read string $rectangle_url
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityAccreditationAgency[] $universityAgencies
 * @property-read int|null $university_agencies_count
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgency query()
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgency whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgency whereRectangleLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgency whereSquareLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgency whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgency whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgency whereUrl($value)
 * @mixin \Eloquent
 */
class AccreditationAgency extends Model
{
    use HasFactory;

    protected $fillable = ['title','translated_name','description','url','rectangle_logo_path','square_logo_path'];

    protected $appends = ['logo_url','rectangle_logo_url'];
    public function getLogoUrlAttribute(): string
    {
        return \AppConst::IMAGES_CDN_URL.'/'.$this->square_logo_path;
    }

    public function getRectangleLogoUrlAttribute(): string
    {
        return \AppConst::IMAGES_CDN_URL.'/'.$this->rectangle_logo_path;
    }

    public function universityAgencies(): HasMany
    {
        return $this->hasMany(UniversityAccreditationAgency::class,'accreditation_agencies_id');
    }
}
