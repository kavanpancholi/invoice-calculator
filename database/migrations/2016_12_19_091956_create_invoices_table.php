<?php

use Illuminate\Support\Facades\Schema;
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
            $table->unsignedInteger('user_id');
            $table->integer('per_week_pay');
            $table->timestamp('last_invoice_at')->nullable();
            $table->date('from_date');
            $table->date('to_date');
            $table->unsignedInteger('no_of_weeks');
            $table->double('total_amount');
            $table->string('paypal_email');
            $table->timestamps();
        });

        Schema::table('invoices', function ($table) {
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
