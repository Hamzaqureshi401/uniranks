<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToUniversityFacilityLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('university_facility_labs', function (Blueprint $table) {
            $table->string('image')->nullable(); // Add the new 'image' column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('university_facility_labs', function (Blueprint $table) {
            $table->dropColumn('image'); // Remove the 'image' column
        });
    }
}
