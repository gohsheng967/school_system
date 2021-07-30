<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juecs', function (Blueprint $table) {
            $table->id();
            $table->string('year',4);
            $table->integer('students_id', false, true)->length(10);
            $table->string('chinese',2)->nullable();
            $table->string('malay',2)->nullable();
            $table->string('english',2)->nullable();
            $table->string('math',2)->nullable();
            $table->string('sains',2)->nullable();
            $table->string('history',2)->nullable();
            $table->string('geo',2)->nullable();
            $table->string('art',2)->nullable();
            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['year','students_id']);
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
        Schema::dropIfExists('juecs');
    }
}
