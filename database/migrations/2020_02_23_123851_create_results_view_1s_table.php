<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsView1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW results_view_1s as 
        select cp.competency,
            cs.value, cs.user_id, fs.rating, fq.feedback_type,cp.core_value_id
            FROM feedback_results AS fs INNER JOIN feedback_requests AS fq
            ON fs.feedback_id = fq.id
            INNER JOIN competency_actions_selections as cs on fq.user_id = cs.user_id
            INNER JOIN competencies as cp on cs.value = cp.competency_id
            ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results_view_1s');
    }
}
