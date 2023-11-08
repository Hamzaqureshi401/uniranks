<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\EventPackage
 *
 * @property int $id
 * @property string $title
 * @property array|null $translated_name
 * @property string|null $description
 * @property string|null $short_description
 * @property int|null $university_fair_schools_campus
 * @property int|null $international_virtual_events
 * @property int|null $career_talks_school_campus
 * @property int|null $work_shops_university_campus
 * @property int|null $open_days_university_campus
 * @property int|null $student_for_a_day_university_campus
 * @property int|null $compilation_university_campus
 * @property int|null $repositories_credit
 * @property int|null $schools_tours
 * @property int|null $countries
 * @property float $cost_per_event
 * @property float|null $discount_percentage
 * @property float $full_price
 * @property int|null $updated_by_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereCareerTalksSchoolCampus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereCompilationUniversityCampus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereCostPerEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereCountries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereFullPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereInternationalVirtualEvents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereOpenDaysUniversityCampus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereRepositoriesCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereSchoolsTours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereStudentForADayUniversityCampus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereUniversityFairSchoolsCampus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereUpdatedByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPackage whereWorkShopsUniversityCampus($value)
 * @mixin \Eloquent
 */
class EventPackage extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];
    protected $fillable = ['title','translated_name','description','short_description',
        'university_fair_schools_campus',
        'international_virtual_events',
        'career_talks_school_campus',
        'work_shops_university_campus',
        'open_days_university_campus',
        'student_for_a_day_university_campus',
        'compilation_university_campus',
        'repositories_credit',
        'schools_tours',
        'countries',
        'cost_per_event',
        'discount_percentage',
        'full_price',
        'updated_by_user_id'
    ];
}
