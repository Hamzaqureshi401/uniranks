<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttendanceMethodIdToUniversityPresentationRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('university_presentation_requests', function (Blueprint $table) {
            $table->foreignId('attendance_method_id')->nullable();

            // Foreign key constraint
            $table->foreign('attendance_method_id')->references('id')->on('attendance_methods');
        });
    }

    public function down()
    {
        Schema::table('university_presentation_requests', function (Blueprint $table) {
            $table->dropForeign(['attendance_method_id']);
            $table->dropColumn('attendance_method_id');
        });
    }
}
