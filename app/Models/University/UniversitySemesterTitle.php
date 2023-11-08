<?php

namespace App\Models\University;

use App\Models\University\Admissions\UniversitySemester;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversitySemesterTitle
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversitySemester[] $semesters
 * @property-read int|null $semesters_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterTitle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterTitle query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterTitle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterTitle whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterTitle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterTitle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversitySemesterTitle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversitySemesterTitle extends Model
{
    use HasFactory;

    protected  $fillable = ['description', 'title'];

    public function semesters()
    {
        return $this->hasMany(UniversitySemester::class, 'university_semester_title_id');
    }
}
