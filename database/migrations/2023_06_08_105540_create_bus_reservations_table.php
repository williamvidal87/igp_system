<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->string("purpose");
            $table->dateTime('start');
            $table->dateTime('end');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string("remark")->nullable();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('destination_id')->references('id')->on('school_bus_rentals');
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('bus_reservations');
    }
}
