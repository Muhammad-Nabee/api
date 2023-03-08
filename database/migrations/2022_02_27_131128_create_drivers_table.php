<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid',50);
            $table->string('dr_name');
            $table->string('dr_join');
            $table->string('dr_mobile');
            $table->string('dr_licence');
            $table->string('dr_licence_valid');
            $table->string('dr_address');
            $table->string('dr_photo');
            $table->string('dr_available');
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
        Schema::dropIfExists('drivers');
    }
}
