<?php

namespace App\Models\Research;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Research\UniversityResearchSubject
 *
 * @property int $id
 * @property int $university_research_id
 * @property int $research_subject_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchSubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchSubject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchSubject query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchSubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchSubject whereResearchSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchSubject whereUniversityResearchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchSubject whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityResearchSubject extends Model
{
    use HasFactory;
}
