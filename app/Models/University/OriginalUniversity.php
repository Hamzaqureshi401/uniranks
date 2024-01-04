<?php

namespace App\Models\University;

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

    // Other model properties and relationships here
}