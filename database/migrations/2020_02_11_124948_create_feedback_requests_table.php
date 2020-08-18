<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('employee_id');
            $table->text('feedback_type');
            $table->text('feedback_provider');
            $table->text('status');
            $table->text('performance_year');
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
        Schema::dropIfExists('feedback_requests');
    }
}
