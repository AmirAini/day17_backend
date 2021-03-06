<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigInteger('id');
            
            //foreign key
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('department_id');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone_number');
            $table->decimal('salary');
            $table->timestamps();

            //relate
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('job_id')->references('id')->on('departments');
            $table->foreign('department_id')->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
