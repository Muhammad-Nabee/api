<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid',50);
            $table->string('veh_reg');
            $table->string('veh_type');
            $table->string('chesis_no');
            $table->string('company');
            $table->string('veh_color');
            $table->string('veh_reg_date');
            $table->string('veh_description');
            $table->string('veh_photo');
            $table->string('veh_available');
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
        Schema::dropIfExists('vehicles');
    }
}
