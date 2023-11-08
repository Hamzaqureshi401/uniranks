<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use App\Models\University\UniversityScholarship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\ScholarshipType
 *
 * @property int $id
 * @property string $title
 * @property array|null $translated_name
 * @property array|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UniversityScholarship> $universityScholarships
 * @property-read int|null $university_scholarships_count
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ScholarshipType extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name','description'];

    public $fillable = ['translated_name','title','description'];

    public function universityScholarships(){
        return $this->hasMany(UniversityScholarship::class,'scholarship_type_id');
    }
}
