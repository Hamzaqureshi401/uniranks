<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingFieldsToAcademicsTable extends Migration
{
    public function up()
    {
        Schema::table('academics', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->unsignedBigInteger('college_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('profile_page_web_url')->nullable();
            $table->string('orcid')->nullable();
            $table->string('web_of_science_research_id')->nullable();
            $table->string('scopus_author_id')->nullable();
            $table->string('research_gate_link')->nullable();
            $table->string('google_scholar_link')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->text('description')->nullable();
            
            // Foreign key constraint
           
            // Add other missing fields here

            // Foreign keys
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            // $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('academics', function (Blueprint $table) {
            $table->dropColumn([
                'user_id',
                'school_id',
                'college_id',
                'department_id',
                'profile_page_web_url',
                'orcid',
                'web_of_science_research_id',
                'scopus_author_id',
                'research_gate_link',
                'google_scholar_link',
                'linkedin_url',
                'description',
               
                // Drop other added columns here
            ]);
        });
    }
}
