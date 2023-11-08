<?php

namespace App\Models\General;

use App\Models\University\Information\UniversityDomains;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\General\DomainType
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $translated_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityDomains[] $domains
 * @property-read int|null $domains_count
 * @method static \Illuminate\Database\Eloquent\Builder|DomainType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DomainType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DomainType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DomainType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DomainType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DomainType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DomainType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DomainType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DomainType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DomainType extends Model
{
    use HasFactory;

    public $translatable = ['translated_name'];

    protected $fillable = ['title','description','translated_name'];

    public function domains(): HasMany
    {
        return $this->hasMany(UniversityDomains::class);
    }
}
