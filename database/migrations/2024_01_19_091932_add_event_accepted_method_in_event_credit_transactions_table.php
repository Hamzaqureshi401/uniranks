<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventAcceptedMethodInEventCreditTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_credit_transactions', function (Blueprint $table) {
            $table->string('event_accepted_method')->nullable()->index()->comment('email OR portal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_credit_transactions', function (Blueprint $table) {
            $table->dropColumn(['event_accepted_method']);
        });
    }
}
