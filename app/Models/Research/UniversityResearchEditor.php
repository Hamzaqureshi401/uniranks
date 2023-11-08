<?php

namespace App\Models\Research;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Research\UniversityResearchEditor
 *
 * @property int $id
 * @property int $university_research_id
 * @property string $name
 * @property string|null $email
 * @property string|null $orcid
 * @property string|null $profile_url
 * @property string|null $photo_path
 * @property int $is_associate 0->no, 1->yes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Research\UniversityResearch|null $universityResearch
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor whereIsAssociate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor whereOrcid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor wherePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor whereProfileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor whereUniversityResearchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchEditor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityResearchEditor extends Model
{
    use HasFactory;

    protected $fillable = ['university_research_id','name','email','orcid','profile_url','photo_path','is_associate'];

    public function universityResearch(): BelongsTo
    {
        return $this->belongsTo(UniversityResearch::class,'university_research_id');
    }
}
