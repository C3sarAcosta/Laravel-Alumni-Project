<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_twos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('quality_teachers');
            $table->string('syllabus');
            $table->string('study_condition');
            $table->string('experience');
            $table->string('study_emphasis');
            $table->string('participate_projects');
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
        Schema::dropIfExists('survey_twos');
    }
}
