<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingFieldsToAcademicsTable extends Migration
{
    public function up()
    {
        Schema::table('academics', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable();
            $table->foreignId('school_id')->nullable();
            $table->foreignId('college_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->string('profile_page_web_url')->nullable();
            $table->string('orcid')->nullable();
            $table->string('web_of_science_research_id')->nullable();
            $table->string('scopus_author_id')->nullable();
            $table->string('research_gate_link')->nullable();
            $table->string('google_scholar_link')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->text('description')->nullable();
            
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
                
            ]);
        });
    }
}
