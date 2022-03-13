<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpayments', function (Blueprint $table) {
            $table->string('transid')->primaryKey();
            $table->string('property_id');
            $table->string('userid');
            $table->decimal('amount_due', 10, 2);
            $table->decimal('amount_paid');
            $table->decimal('balance');
            $table->string('payment_mode');
            $table->string('reference')->nullable();
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
        Schema::dropIfExists('tblpayments');
    }
}
