<?php

namespace App\Models\Research;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Research\UniversityResearchVolume
 *
 * @property int $id
 * @property int $university_research_id
 * @property string $name
 * @property string|null $issue_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Research\UniversityResearch|null $universityResearch
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchVolume newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchVolume newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchVolume query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchVolume whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchVolume whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchVolume whereIssueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchVolume whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchVolume whereUniversityResearchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchVolume whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityResearchVolume extends Model
{
    use HasFactory;

    protected $fillable = ['university_research_id','name','issue_date'];

    public function universityResearch(): BelongsTo
    {
        return $this->belongsTo(UniversityResearch::class,'university_research_id');
    }
}
