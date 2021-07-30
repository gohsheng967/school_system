<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table -> string('identity',20);
            $table -> string('personal_email',100)->nullable();
            $table -> string('contact_home',15)->nullable();
            $table -> string('personal_contact',15)->nullable();
            $table -> string('home_address', 250)->nullable();
            $table -> string('ex_studentSMJK')->nullable();
            $table -> string('ex_studentIND')->nullable();
            $table -> string('ex_studentPrimary')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
