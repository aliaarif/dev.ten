<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{

    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('vendor_id');
            $table->text('booking_dates');
            $table->date('booking_from_date');
            $table->date('booking_to_date');
            $table->string('client_name')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('address_zip')->nullable();
            $table->integer('days');
            $table->integer('hours');
            $table->float('unit_price');
            $table->float('sub_total');
            $table->float('tax');
            $table->float('total_amount');
            $table->text('description')->nullable();
            $table->integer('booking_status')->default(0);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
