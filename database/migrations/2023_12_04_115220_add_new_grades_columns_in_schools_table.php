<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewGradesColumnsInSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->integer('number_grade8')->after('number_grade12')->nullable()->comment('Number of students');
            $table->integer('number_grade9')->after('number_grade8')->nullable()->comment('Number of students');
            $table->integer('number_grade10')->after('number_grade9')->nullable()->comment('Number of students');
            $table->foreignId('fees_grade8')->after('fees_grade12')->nullable()->comment('fee range id');
            $table->foreignId('fees_grade9')->after('fees_grade8')->nullable()->comment('fee range id');
            $table->foreignId('fees_grade10')->after('fees_grade9')->nullable()->comment('fee range id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->dropColumn(['number_grade8','number_grade9','number_grade10','fees_grade8','fees_grade9','fees_grade10']);
        });
    }
}
