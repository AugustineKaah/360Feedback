<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackSelectionViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW feedback_selection_views as 
        Select competency_actions_selections.value, competency_actions.description, competency_actions.core_value, competency_actions_selections.competency FROM competency_actions INNER JOIN competency_actions_selections on competency_actions_selections.value = competency_actions.level_value AND competency_actions_selections.competency = competency_actions.competency_id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_selection_views');
    }
}
