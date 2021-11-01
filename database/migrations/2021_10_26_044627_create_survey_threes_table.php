<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyThreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_threes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('do_for_living');
            $table->string('speciality')->nullable();
            $table->string('school')->nullable();
            $table->string('long_take_job')->nullable();
            $table->string('hear_about')->nullable();         
            $table->tinyInteger('competence1')->nullable();
            $table->tinyInteger('competence2')->nullable();
            $table->tinyInteger('competence3')->nullable();
            $table->tinyInteger('competence4')->nullable();
            $table->tinyInteger('competence5')->nullable();
            $table->tinyInteger('competence6')->nullable();
            $table->string('language_most_spoken')->nullable();
            $table->string('speak_percent')->nullable();
            $table->string('write_percent')->nullable();
            $table->string('read_percent')->nullable();
            $table->string('listen_percent')->nullable();
            $table->string('seniority')->nullable();
            $table->string('year')->nullable();
            $table->string('salary')->nullable();
            $table->string('management_level')->nullable();
            $table->string('job_condition')->nullable();
            $table->string('job_relationship')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_activity')->nullable();
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            $table->string('suburb')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('municipality')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('web_page')->nullable();
            $table->string('boss_email')->nullable();
            $table->string('business_structure')->nullable();
            $table->string('company_size')->nullable();
            $table->string('business_activity_selector')->nullable();
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
        Schema::dropIfExists('survey_threes');
    }
}
