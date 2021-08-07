<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions_students', function (Blueprint $table) {
            $table->id();
            $table->integer('students_id', false, true)->length(10);
            $table->biginteger('promotions_id', false, true)->length(20);
            $table->string('year')->length(4);
            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('promotions_id')->references('id')->on('promotions')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['students_id','promotions_id','year']);
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
        Schema::dropIfExists('promotions_students');
    }
}
