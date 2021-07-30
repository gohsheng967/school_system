<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsPrimaryprizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_primaryprizes', function (Blueprint $table) {
            $table->id();
            $table->integer('students_id', false, true)->length(10);
            $table->string('competition_title',150);
            $table->string('organizer',100);
            $table->string('prize',100);
            $table->date('competition_date');
            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_primaryprizes');
    }
}
