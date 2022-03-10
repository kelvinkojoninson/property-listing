<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblappointments', function (Blueprint $table) {
            $table->increments('transid')->primaryKey();
            $table->string('customer_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->date('meeting_date');
            $table->string('venue')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('deleted')->default(0);
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
        Schema::dropIfExists('tblappointments');
    }
}
