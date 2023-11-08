<?php

namespace App\Models\General;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\ApplicationRequirementType
 *
 * @property int $id
 * @property string $title
 * @property array|null $translated_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\ApplicationRequirement[] $applicationRequirements
 * @property-read int|null $application_requirements_count
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirementType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirementType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirementType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirementType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirementType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirementType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirementType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirementType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationRequirementType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ApplicationRequirementType extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['translated_name'];
    protected $fillable = ['title', 'description', 'translated_name'];

    public function applicationRequirements(){
        return $this->hasMany(ApplicationRequirement::class,'type_id');
    }
}
