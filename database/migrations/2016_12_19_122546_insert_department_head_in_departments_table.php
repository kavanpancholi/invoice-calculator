<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDepartmentHeadInDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->integer('department_head_user_id')->unsigned()->nullable();
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->foreign('department_head_user_id','department_head_user_id_user_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments', function ($table) {
            $table->dropForeign('department_head_user_id_user_user_id');
            $table->dropColumn('department_head_user_id');
        });
    }
}
