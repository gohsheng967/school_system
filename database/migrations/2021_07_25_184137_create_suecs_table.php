<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suecs', function (Blueprint $table) {
            $table->id();
            $table->string('year', 4);
            $table->integer('students_id', false, true)->length(10);
            $table->string('chinese',2)->nullable();
            $table->string('malay',2)->nullable();
            $table->string('english',2)->nullable();
            $table->string('math',2)->nullable();
            $table->string('addmath',2)->nullable();
            $table->string('addmath1',2)->nullable();
            $table->string('addmath2',2)->nullable();
            $table->string('history',2)->nullable();
            $table->string('geo',2)->nullable();
            $table->string('bio',2)->nullable();
            $table->string('che',2)->nullable();
            $table->string('fizik',2)->nullable();
            $table->string('business',2)->nullable();
            $table->string('bk',2)->nullable();
            $table->string('economic',2)->nullable();
            $table->string('computer',2)->nullable();
            $table->string('art',2)->nullable();
            $table->string('art_work',2)->nullable();
            $table->string('art_practical',2)->nullable();
            $table->string('account',2)->nullable();
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
        Schema::dropIfExists('suecs');
    }
}
