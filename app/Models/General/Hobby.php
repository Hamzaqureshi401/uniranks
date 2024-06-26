<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Hobby
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereUpdatedAt($value)
 * @property string|null $name
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereName($value)
 * @property string|null $translated_name json data
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereTranslatedName($value)
 * @mixin \Eloquent
 */
class Hobby extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['translated_name'];

    protected $guarded = [];

    public function getNameAttribute($value){
        return $this->translated_name ?: $value;
    }

}
