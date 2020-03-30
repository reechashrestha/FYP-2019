<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bookings_details', function (Blueprint $table) {
            $table->integer('booking_details_id');
            $table->unsignedInteger('bookings_id')->nullable();
            $table->foreign('bookings_id')->references('bookings_id')->on('bookings');
            $table->rememberToken();
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
        Schema::dropIfExists('tbl_bookings_details');
    }
}
