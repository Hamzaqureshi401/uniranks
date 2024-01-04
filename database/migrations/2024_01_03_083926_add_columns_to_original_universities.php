<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOriginalUniversities extends Migration
{
    public function up()
    {
        Schema::table('original_universities', function (Blueprint $table) {
            // Add name_language column
            $table->string('name_language')->nullable()->after('name');

            // Add name_type column
            $table->unsignedTinyInteger('name_type')->default(1)->after('name_language');
            // You might also consider foreign key constraints if required.
        });
    }

    public function down()
    {
        Schema::table('original_universities', function (Blueprint $table) {
            $table->dropColumn('name_language');
            $table->dropColumn('name_type');
        });
    }
}
