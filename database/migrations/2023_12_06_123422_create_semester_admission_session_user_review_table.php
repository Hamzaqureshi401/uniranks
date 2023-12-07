<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterAdmissionSessionUserReviewTable extends Migration
{
    public function up()
    {
        Schema::create('semester_admission_session_user_review', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_admission_session_id');
            $table->foreignId('user_id');
            $table->foreignId('reviewed_by');
            $table->text('remarks')->nullable();
            $table->timestamps();

            // Foreign key constraints with custom names
            $table->foreign('university_admission_session_id', 'fk_university_admission_session')
                ->references('id')
                ->on('university_admission_sessions')
                ->onDelete('cascade');

            $table->foreign('user_id', 'fk_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('reviewed_by', 'fk_reviewed_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('semester_admission_session_user_review');
    }
}
