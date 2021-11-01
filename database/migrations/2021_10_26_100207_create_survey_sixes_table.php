<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveySixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_sixes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->tinyText('organization_yes_no');
            $table->string('organization')->nullable();
            $table->tinyText('agency_yes_no');
            $table->string('agency')->nullable();
            $table->tinyText('association_yes_no');
            $table->string('association')->nullable();            
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
        Schema::dropIfExists('survey_sixes');
    }
}
