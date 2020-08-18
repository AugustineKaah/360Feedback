<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetencyActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('competency_actions');
        Schema::create('competency_actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('level_id');
            $table->string('competency_id');
            //$table->foreign('level_id')->references('level_id')->on('competency_levels');
            //$table->foreign('competency_id')->references('competency_id')->on('competencies');
            $table->longText('description');
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
        Schema::dropIfExists('competency_actions');
    }
}
