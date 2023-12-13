<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceMethodsTable extends Migration
{
    public function up()
    {
        Schema::create('attendance_methods', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('translated_name')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance_methods');
    }
}
