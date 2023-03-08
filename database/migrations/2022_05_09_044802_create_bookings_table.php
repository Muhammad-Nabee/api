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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid',50);
            
            $table->string('name');
            $table->string('father_name');
            $table->string('email')->unique();
            $table->string('cnic');
            $table->string('address');
            $table->string('gender');
            $table->string('car_name');
            $table->string('service');
            $table->string('date_in');
            $table->string('date_out');
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
        Schema::dropIfExists('bookings');
    }
}
