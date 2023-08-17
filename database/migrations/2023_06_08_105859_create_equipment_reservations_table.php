<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('equipment_id')->nullable();
            $table->string("event");
            $table->dateTime('start');
            $table->dateTime('end');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string("remark")->nullable();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('equipment_id')->references('id')->on('equipment');
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
        Schema::dropIfExists('equipment_reservations');
    }
}
