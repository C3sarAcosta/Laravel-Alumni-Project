<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_ones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('first_name');
            $table->string('fathers_surname');
            $table->string('mothers_surname');
            $table->string('control_number');
            $table->string('birthday');
            $table->string('curp');
            $table->string('sex');
            $table->string('marital_status');
            $table->string('address');
            $table->string('zip_code');
            $table->string('suburb');
            $table->string('state');
            $table->string('city');
            $table->string('municipality');
            $table->string('phone');
            $table->string('cellphone');
            $table->string('email');
            $table->string('career');
            $table->string('specialty');
            $table->string('qualified');
            $table->string('month');
            $table->string('year');
            $table->string('percent_english');
            $table->string('another_language');
            $table->string('percent_another_language');
            $table->string('software');
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
        Schema::dropIfExists('survey_ones');
    }
}
