<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransalatedNameColumnInSchoolSponsoredEventTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_sponsored_event_types', function (Blueprint $table) {
            $table->text('translated_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_sponsored_event_types', function (Blueprint $table) {
            $table->dropColumn(['translated_name']);
        });
    }
}
