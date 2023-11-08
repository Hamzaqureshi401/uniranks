<?php

namespace App\Models\University;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\University\UniversityConferenceType
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\University\UniversityConference[] $universityConferences
 * @property-read int|null $university_conferences_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceType whereUpdatedAt($value)
 * @property-read array $translations
 * @mixin \Eloquent
 */
class UniversityConferenceType extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name','description'];

    protected $fillable = ['title','description','translated_name'];

    public function universityConferences(): HasMany
    {
        return $this->hasMany(UniversityConference::class,'university_conference_type_id');
    }
}
