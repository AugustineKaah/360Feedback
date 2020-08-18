<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackResultsView2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW feedback_results_view_2 AS
        SELECT core_value, s.competency, competency_level, s.user_id, feedback_type, rating
        FROM competency_actions_selections_view as s RIGHT JOIN feedback_results_view as r 
        on s.competency = r.competency AND s.level_value = r.competency_level
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_results_view_2s');
    }
}
