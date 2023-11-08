<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\TestScoreType
 *
 * @property int $id
 * @property int|null $type_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $short_description
 * @property array|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|TestScoreType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestScoreType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestScoreType query()
 * @method static \Illuminate\Database\Eloquent\Builder|TestScoreType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestScoreType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestScoreType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestScoreType whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestScoreType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestScoreType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestScoreType whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestScoreType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TestScoreType extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['translated_name'];
    protected $fillable = ['type_id', 'title','description', 'short_description', 'translated_name'];
}
