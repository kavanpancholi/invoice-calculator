<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->decimal('per_week_pay', 15, 2);
            $table->date('from_date');
            $table->date('to_date');
            $table->integer('no_of_weeks');
            $table->integer('holidays_after_limit')->nullable();
            $table->integer('subtotal')->nullable();
            $table->integer('remaining')->nullable();
            $table->integer('bonus')->nullable();
            $table->integer('total_amount');
            $table->string('paypal_email');
            $table->integer('email_sent')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
