<?php

namespace App\Models\University;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\University\UniversityConferenceSubject
 *
 * @property int $id
 * @property int $university_conference_id
 * @property string $title
 * @property string|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\University\UniversityConference|null $universityConference
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceSubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceSubject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceSubject query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceSubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceSubject whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceSubject whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceSubject whereUniversityConferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityConferenceSubject whereUpdatedAt($value)
 * @property-read array $translations
 * @mixin \Eloquent
 */
class UniversityConferenceSubject extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];
    protected $fillable = ['university_conference_id','title','translated_name'];

    public function universityConference(): BelongsTo
    {
        return $this->belongsTo(UniversityConference::class,'university_conference_id');
    }
}
