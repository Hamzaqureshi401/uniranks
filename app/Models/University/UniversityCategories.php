<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityCategories
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCategories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCategories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCategories query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCategories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCategories whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCategories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCategories whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCategories whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityCategories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
