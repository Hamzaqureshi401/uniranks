<?php

namespace App\Models\General;

use App\Models\Fairs\Fair;
use App\Models\Institutes\School;
use App\Models\Traits\HasTranslations;
use App\Models\University\UniversityEvent;
use App\Models\University\UniversityEventCurriculum;
use App\Models\University\UniversityEventMajor;
use App\Models\User;
use App\Models\User\UserBio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\General\Curriculum
 *
 * @property int $id
 * @property string $title
 * @property string|null $short_description
 * @property string|null $description
 * @property array|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read School|null $schools
 * @property-read \Illuminate\Database\Eloquent\Collection|UserBio[] $userBios
 * @property-read int|null $user_bios_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Curriculum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Curriculum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Curriculum query()
 * @method static \Illuminate\Database\Eloquent\Builder|Curriculum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curriculum whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curriculum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curriculum whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curriculum whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curriculum whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curriculum whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $students
 * @property-read int|null $students_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityEvent[] $universityEvents
 * @property-read int|null $university_events_count
 * @property-read int|null $schools_count
 * @mixin \Eloquent
 */
class Curriculum extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'curriculums';
    public $translatable = ['translated_name'];
    protected $fillable = ['title','description','short_description','translated_name'];
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class,UserBio::class,'curriculum_id','user_id');
    }

    public function getTitleAttribute($value){
        return $this->translated_name ?: $value;
    }

    public function userBios(): HasMany
    {
        return $this->hasMany(UserBio::class,'curriculum_id');
    }

    public function schools(): HasMany
    {
        return $this->hasMany(School::class,'curriculum_id');
    }

    public function fairs(){
        return $this->hasManyThrough(Fair::class,School::class,'curriculum_id','school_id');
    }

    /**
     * @return BelongsToMany
     */
    public function universityEvents(): BelongsToMany
    {
        return $this->belongsToMany(UniversityEvent::class,UniversityEventCurriculum::class,'curriculum_id','university_event_id');
    }

}
