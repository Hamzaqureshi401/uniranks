<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Currency
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property array|null $translated_name json date: {"en":"...","ar":"..."}
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereTranslatedName($value)
 */
class Currency extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];
    protected $fillable = ['name', 'code', 'icon'];

    public function getNameAttribute($value){
        return $this->translated_name ?: $value;
    }
}
