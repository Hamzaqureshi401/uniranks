<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityEventCurriculum
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventCurriculum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventCurriculum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventCurriculum query()
 * @property int $id
 * @property int|null $university_event_id
 * @property int|null $curriculum_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventCurriculum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventCurriculum whereCurriculumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventCurriculum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventCurriculum whereUniversityEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventCurriculum whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityEventCurriculum extends Model
{
    use HasFactory;
    protected $table = 'university_event_curriculums';
    protected $fillable = ['university_event_id','curriculum_id'];
}
