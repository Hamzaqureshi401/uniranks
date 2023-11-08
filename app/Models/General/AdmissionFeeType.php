<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\AdmissionFeeType
 *
 * @property int $id
 * @property string $title
 * @property array|null $translated_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionFeeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionFeeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionFeeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionFeeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionFeeType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionFeeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionFeeType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionFeeType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionFeeType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdmissionFeeType extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];
    protected $fillable = ['title','description','translated_name'];
}
