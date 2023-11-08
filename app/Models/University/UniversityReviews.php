<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityReviews
 *
 * @property int $id
 * @property int $university_id
 * @property int|null $user_id
 * @property int|null $language_id
 * @property string|null $full_name
 * @property string|null $review
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityReviews newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityReviews newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityReviews query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityReviews whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityReviews whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityReviews whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityReviews whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityReviews whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityReviews whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityReviews whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityReviews whereUserId($value)
 * @mixin \Eloquent
 */
class UniversityReviews extends Model
{
    use HasFactory;

    protected $fillable = ['university_id', 'review', 'user_id', 'full_name', 'language_id'];
}
