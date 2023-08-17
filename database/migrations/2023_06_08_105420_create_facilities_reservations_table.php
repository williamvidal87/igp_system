<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitiesReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('facility_id')->nullable();
            $table->string("event");
            $table->dateTime('start');
            $table->dateTime('end');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string("remark")->nullable();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('facility_id')->references('id')->on('school_facilities');
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
        Schema::dropIfExists('facilities_reservations');
    }
}
