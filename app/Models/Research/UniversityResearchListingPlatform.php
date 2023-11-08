<?php

namespace App\Models\Research;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Research\UniversityResearchListingPlatform
 *
 * @property int $id
 * @property int $university_research_id
 * @property int $listing_platform_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchListingPlatform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchListingPlatform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchListingPlatform query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchListingPlatform whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchListingPlatform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchListingPlatform whereListingPlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchListingPlatform whereUniversityResearchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityResearchListingPlatform whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityResearchListingPlatform extends Model
{
    use HasFactory;
}
