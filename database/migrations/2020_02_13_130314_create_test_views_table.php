<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW test_view as 
        Select competency_actions_selections.value, competency_actions.description FROM competency_actions INNER JOIN competency_actions_selections on competency_actions_selections.value = competency_actions.level_value AND competency_actions_selections.competency = competency_actions.competency_id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_views');
    }
}
