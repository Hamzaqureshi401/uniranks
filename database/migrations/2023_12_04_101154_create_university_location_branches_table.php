<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityLocationBranchesTable extends Migration
{
    public function up()
    {
        Schema::create('university_location_branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('campus_type')->default(0)->comment('0 = Branch, 1 = Main');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('campus_name')->nullable();
            $table->text('campus_address_txt')->nullable();
            $table->string('campus_map_link')->nullable();
            $table->text('branch_name_other_lang')->nullable();
            $table->text('branch_address_other_lang')->nullable();
            $table->timestamps();
            $table->foreign('university_id')->references('id')->on('universities');
            $table->foreign('user_id')->references('id')->on('users');
            // Define other foreign keys if necessary...
        });
    }

    public function down()
    {
        Schema::dropIfExists('university_location_branches');
    }
}
