<?php

namespace App\Models\University\Information;

use App\Models\General\DomainType;
use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UniversityInfo\UniversityDomains
 *
 * @property int $id
 * @property int $university_id
 * @property string|null $description
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read University $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomains newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomains newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomains query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomains whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomains whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomains whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomains whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomains whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomains whereUrl($value)
 * @property int|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomains whereCreatedBy($value)
 * @property int|null $domain_type_id
 * @property-read User|null $createdByUser
 * @property-read DomainType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityDomains whereDomainTypeId($value)
 * @mixin \Eloquent
 */
class UniversityDomains extends Model
{
    use HasFactory;

    protected $fillable = ['university_id','description','url','created_by','domain_type_id'];
    protected $guarded = ['id'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(DomainType::class,'domain_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function createdByUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
