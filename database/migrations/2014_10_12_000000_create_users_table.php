<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedInteger('position_id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('ref_user_id');
            $table->unsignedInteger('reporting_user_id');
            $table->unsignedInteger('supervisor_user_id');
            $table->string('last_company_name');
            $table->string('last_company_position');
            $table->date('joining_date');
            $table->date('ending_date');
            $table->double('per_month_pay');
            $table->double('per_week_pay');
            $table->string('paypal_email');
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
        Schema::dropIfExists('users');
    }
}
