<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->smallInteger('survey_one_company_done');
            $table->smallInteger('survey_two_company_done');
            $table->smallInteger('survey_three_company_done');
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
        Schema::dropIfExists('company_surveys');
    }
}
