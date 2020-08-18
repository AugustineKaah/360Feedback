<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // Schema::dropIfExists('profiles');
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id',40);
            $table->string('firstname',40);
            $table->string('middlename',40);
            $table->string('surname',40);
            $table->string('job_title',40);
            $table->string('department_id',40);
            $table->string('grade',40);
            $table->string('email',40);
            $table->string('mobile_number',40);
            $table->string('manager',40);
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
        Schema::dropIfExists('profiles');
    }
}
