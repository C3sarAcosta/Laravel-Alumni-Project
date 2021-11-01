<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyFivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_fives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->tinyText('courses_yes_no');
            $table->string('courses')->nullable();
            $table->tinyText('master_yes_no');
            $table->string('master')->nullable();
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
        Schema::dropIfExists('survey_fives');
    }
}
