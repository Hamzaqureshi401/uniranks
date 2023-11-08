<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\TestType
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $short_description
 * @property array|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\Test[] $tests
 * @property-read int|null $tests_count
 * @method static \Illuminate\Database\Eloquent\Builder|TestType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestType query()
 * @method static \Illuminate\Database\Eloquent\Builder|TestType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestType whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TestType extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['translated_name'];
    protected $fillable = ['type_id', 'title','description', 'short_description', 'translated_name'];

    public function tests(){
        return $this->hasMany(Test::class,'type_id');
    }

}
