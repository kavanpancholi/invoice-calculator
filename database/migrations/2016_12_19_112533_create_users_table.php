<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->integer('role_id')->unsigned();
            $table->integer('position_id')->unsigned()->nullable();
            $table->integer('department_id')->unsigned()->nullable();
            $table->integer('ref_user_id')->nullable();
            $table->integer('reporting_user_id')->nullable();
            $table->integer('supervisor_user_id')->nullable();
            $table->string('last_company_name')->nullable();
            $table->string('last_company_position')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('ending_date')->nullable();
            $table->decimal('per_month_pay', 15, 2)->nullable();
            $table->decimal('per_week_pay', 15, 2)->nullable();
            $table->string('paypal_email')->nullable();
            $table->string('remember_token')->nullable();
            
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
