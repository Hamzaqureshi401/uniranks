<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterAdmissionSessionUserReviewTable extends Migration
{
    public function up()
    {
        Schema::create('semester_admission_session_user_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_admission_requirement_update_request_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('reviewed_by')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();

            // Define foreign key constraints with custom names (shortened)
            $table->foreign('university_admission_requirement_update_request_id', 'fk_university_admission_requirement_update_request')
                  ->references('id')
                  ->on('university_admission_session_update_requests')
                  ->onDelete('restrict');

            $table->foreign('user_id', 'fk_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('reviewed_by', 'fk_reviewer')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('semester_admission_session_user_reviews');
    }
}
