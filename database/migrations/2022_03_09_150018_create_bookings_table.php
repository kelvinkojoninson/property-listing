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
            $table->string('booking_code')->unique();
            $table->string('userid');
            $table->string('property_id');
            $table->string('ifo');
            $table->string('ifo_name')->nullable();
            $table->string('ifo_phone')->nullable();
            $table->string('occupants_no');
            $table->boolean('deleted')->default(0);
            $table->boolean('status')->default(1);
            $table->boolean('is_approved')->default(1);
            $table->string('createuser');
            $table->dateTime('createdate');
            $table->string('modifyuser')->nullable();
            $table->dateTime('modifydate')->nullable();
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
