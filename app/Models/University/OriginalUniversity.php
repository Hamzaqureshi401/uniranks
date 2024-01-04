<?php

namespace App\Models\University;

use App\Models\General\Language;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OriginalUniversity extends Model
{
    protected $fillable = [
        'university_id',
        'name',
        'name_language',
        'name_type',
        'website',
        'country',
        'status',
    ];


   public function language()
{
    return $this->belongsTo(Language::class, 'name_language', 'code');
}


    // Other model properties and relationships here
}