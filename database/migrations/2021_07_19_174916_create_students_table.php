<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('name_chi',100);
            $table->string('name_eng',100);
            $table->date('entry_date');
            $table->string('entry_level',5);
            $table->string('sex',10);
            $table->string('birth_no',12);
            $table->string('identity_no',20);
            $table->date('birth_date');
            $table->string('race',5);
            $table->string('student_type',5);
            $table->string('region',5);
            $table->string('country',40);
            $table->string('school_mail',100);
            $table->string('personal_email',100)->nullable();
            $table->string('personal_phone',20)->nullable();
            $table->string('primary_school',100);
            $table->string('secondary_school',100)->nullable();
            $table->string('home_address',300)->nullable();

            $table->string('fathername_chi',100)->nullable();
            $table->string('fathername_eng',100)->nullable();
            $table->string('father_identity',20)->nullable();
            $table->string('father_contact',20)->nullable();
            $table->string('father_email',100)->nullable();
            $table->string('father_edulevel',20)->nullable();
            $table->string('father_occupation',40)->nullable();

            $table->string('mothername_chi',100)->nullable();
            $table->string('mothername_eng',100)->nullable();
            $table->string('mother_identity',20)->nullable();
            $table->string('mother_contact',20)->nullable();
            $table->string('mother_email',100)->nullable();
            $table->string('mother_edulevel',20)->nullable();
            $table->string('mother_occupation',40)->nullable();

            $table->string('guardianname_chi',100)->nullable();
            $table->string('guardianname_eng',100)->nullable();
            $table->string('guardian_identity',20)->nullable();
            $table->string('guardian_contact',20)->nullable();
            $table->string('guardian_email',100)->nullable();
            $table->string('guardian_edulevel',20)->nullable();
            $table->string('guardian_occupation',40)->nullable();

            $table->string('main_contact',20);
            $table->string('primary_malay_comprehensive',2)->nullable();
            $table->string('primary_malay_essay',2)->nullable();
            $table->string('primary_english_comprehensive',2)->nullable();
            $table->string('primary_english_essay',2)->nullable();
            $table->string('primary_math',2)->nullable();
            $table->string('primary_chinese_comprehensive',2)->nullable();
            $table->string('primary_chinese_essay',2)->nullable();
            $table->string('primary_sains',2)->nullable();
            $table->string('primary_mark',2)->nullable();

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
        Schema::dropIfExists('students');
    }
}
