<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\StudyStatus
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property array|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|StudyStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudyStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudyStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudyStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudyStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudyStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudyStatus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudyStatus whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudyStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StudyStatus extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['translated_name'];


    protected $fillable = ['title','description','translated_name'];

}
