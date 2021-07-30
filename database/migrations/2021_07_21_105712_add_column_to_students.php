<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('potrait1',250)->nullable();
            $table->string('potrait2',250)->nullable();
            $table->string('primary_year',4);
            $table->string('primary_grade',4);
            $table->string('secondary_grade',4)->nullable();
            $table->string('secondary_year',4)->nullable();
            $table->string('hair_color',4);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('potrait1');
            $table->dropColumn('potrait2');
            $table->dropColumn('primary_year');
            $table->dropColumn('primary_grade');
            $table->dropColumn('secondary_grade');
            $table->dropColumn('secondary_year');

        });
    }
}
