<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyFoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_fours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('efficiency_work_activities');
            $table->string('academic_training');
            $table->string('usefulness_professional_residence');
            $table->smallInteger('study_area');
            $table->smallInteger('title');
            $table->smallInteger('experience');
            $table->smallInteger('job_competence');
            $table->smallInteger('positioning');
            $table->smallInteger('languages');
            $table->smallInteger('recommendations');
            $table->smallInteger('personality');
            $table->smallInteger('leadership');
            $table->smallInteger('others');            
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
        Schema::dropIfExists('survey_fours');
    }
}
