<?php

namespace App\Models\AttendanceMethod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AttendanceMethod extends Model
{
    use HasTranslations;
    use HasFactory;

    protected $fillable = ['name', 'translated_name'];
    public $translatable = ['name', 'translated_name'];
}