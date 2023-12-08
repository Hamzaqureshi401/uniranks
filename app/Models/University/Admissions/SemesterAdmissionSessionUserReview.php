<?php

namespace App\Models\University\Admissions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterAdmissionSessionUserReview extends Model
{
    //protected $table = 'semester_admission_session_user_review';

    protected $fillable = [
        'university_admission_requirement_update_request_id',
        'user_id',
        'reviewed_by',
        'remarks',
        // Add other fillable fields as needed
    ];

    // Define relationships or other methods related to this model here
}