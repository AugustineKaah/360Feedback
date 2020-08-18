<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('employee_id',40);
            $table->string('firstname',40);
            $table->string('middlename',40);
            $table->string('surname',40);
            $table->string('job_title',40);
            $table->string('department_id',40);
            $table->string('grade',40);
            $table->string('mobile_number',40);
            $table->string('manager',40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
