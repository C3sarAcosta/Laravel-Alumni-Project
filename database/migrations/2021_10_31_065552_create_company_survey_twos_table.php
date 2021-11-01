<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySurveyTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_survey_twos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('number_graduates');
            $table->string('congruence');
            $table->string('requirements');
            $table->string('most_demanded_career');
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
        Schema::dropIfExists('company_survey_twos');
    }
}
