<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddByUserIdColumnInInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->foreignId('by_user_id')->nullable()->index()->comment('who accepted the fair');
            $table->string('accepted_by_method')->nullable()->index()->comment('email OR portal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn(['by_user_id','accepted_by_method']);
        });
    }
}
