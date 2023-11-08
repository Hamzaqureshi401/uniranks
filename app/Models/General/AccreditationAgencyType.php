<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use App\Models\University\Admissions\UniversityAccreditationAgency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\General\AccreditationAgencyType
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property array|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityAccreditationAgency[] $universityAccreditationAgencies
 * @property-read int|null $university_accreditation_agencies_count
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgencyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgencyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgencyType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgencyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgencyType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgencyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgencyType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgencyType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccreditationAgencyType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AccreditationAgencyType extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];

    protected $fillable = ['title','description','translated_name'];

    public function universityAccreditationAgencies(): HasMany
    {
        return $this->hasMany(UniversityAccreditationAgency::class,'agency_type_id');
    }
}
