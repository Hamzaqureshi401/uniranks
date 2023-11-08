<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityCompareHistory
 *
 * @property int $id
 * @property string|null $compare_slugs
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCompareHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCompareHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCompareHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCompareHistory whereCompareSlugs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityCompareHistory whereId($value)
 * @mixin \Eloquent
 */
class UniversityCompareHistory extends Model
{
    use HasFactory;
    protected $fillable = ['compare_slugs'];
    public $timestamps  = false;
}
