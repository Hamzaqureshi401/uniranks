<?php

namespace App\Models\School;

use App\Models\Institutes\School;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\School\SchoolType
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $short_description
 * @property string|null $translated_name json date: {"en":"...","ar":"..."}
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolType whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $schools
 * @property-read int|null $schools_count
 */
class SchoolType extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];
    protected $fillable = ['title','translated_name','short_description','description'];

    public function schools(): HasMany
    {
        return $this->hasMany(School::class,'school_type_id');
    }
}
