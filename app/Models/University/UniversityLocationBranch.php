<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\Institutes\University;
use Spatie\Translatable\HasTranslations;

class UniversityLocationBranch extends Model
{
    use HasTranslations;

    protected $table = 'university_location_branches';

    protected $fillable = [
        'university_id',
        'campus_type',
        'country_id',
        'city_id',
        'campus_name',
        'campus_address_txt',
        'campus_map_link',
        'branch_name_other_lang',
        'branch_address_other_lang',
        'user_id'
    ];

    public $translatable = [
        'branch_name_other_lang',
        'branch_address_other_lang',
    ];

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function country()
    {
        return $this->belongsTo(Countries::class);
    }
     public function city()
    {
        return $this->belongsTo(Cities::class);
    }

}
