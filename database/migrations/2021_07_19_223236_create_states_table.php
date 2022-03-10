<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblstates', function (Blueprint $table) {
            $table->increments('transid')->primaryKey();
            $table->string('name');
            $table->string('country_id');
            $table->boolean('deleted')->default(0);
            $table->string('createuser')->default('admin');
            $table->dateTime('createdate')->default(date('Y-m-d H:i:s'));
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
        Schema::dropIfExists('tblstates');
    }
}
