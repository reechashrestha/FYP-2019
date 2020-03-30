<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bookings', function (Blueprint $table) {
            $table->increments('bookings_id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('customer_id')->on('tbl_customer');
            $table->integer('payment_id')->unsigned();
            $table->foreign('payment_id')->references('payment_id')->on('tbl_payment');
            $table->integer('booking_total');
            $table->string('booking_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *x
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_bookings');
    }
}
