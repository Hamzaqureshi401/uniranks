<?php

namespace App\Models\Academic;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;
    use HasTranslations;
    
    public $translatable = ['description'];

     protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'position',
        'country_id',
        'city_id',
        'university_id',
        'is_associated',
        'email',
        'password',
        'user_id',
        'school_id',
        'college_id',
        'department_id',
        'profile_page_web_url',
        'orcid',
        'web_of_science_research_id',
        'scopus_author_id',
        'research_gate_link',
        'google_scholar_link',
        'linkedin_url',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class); 
    }
}


