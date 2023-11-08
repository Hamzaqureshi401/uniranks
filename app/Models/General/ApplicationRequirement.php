<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\ApplicationRequirement
 *
 * @property int $id
 * @property int|null $type_id
 * @property string $title
 * @property array|null $translated_name
 * @property string|null $description
 * @property int|null $required_upload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \App\Models\General\ApplicationRequirementType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirement whereRequiredUpload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirement whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirement whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirement whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ApplicationRequirement extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['translated_name'];
    protected $fillable = ['type_id','title', 'description', 'translated_name'];

    public function type(){
        return $this->belongsTo(ApplicationRequirementType::class,'type_id');
    }

}
