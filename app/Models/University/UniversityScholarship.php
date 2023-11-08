<?php

namespace App\Models\University;

use App\Models\General\ScholarshipType;
use App\Models\Institutes\University;
use App\Models\Traits\HasTranslations;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\University\UniversityScholarship
 *
 * @property int $id
 * @property int $university_id
 * @property int $scholarship_type_id
 * @property string|null $title
 * @property array|null $translated_name
 * @property array|null $description
 * @property float|null $coverage
 * @property float|null $international_acceptance
 * @property float|null $local_acceptance
 * @property int|null $status
 * @property int|null $created_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $createdBy
 * @property-read ScholarshipType|null $scholarshipType
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereCoverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereInternationalAcceptance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereLocalAcceptance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereScholarshipTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityScholarship whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityScholarship extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name','description'];

    protected $fillable = ['university_id','scholarship_type_id','title','translated_name','description',
       'coverage','international_acceptance','local_acceptance','status','created_by_id'];

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id');
    }
    public function scholarshipType(): BelongsTo
    {
        return $this->belongsTo(ScholarshipType::class,'scholarship_type_id');
    }
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by_id');
    }
}
