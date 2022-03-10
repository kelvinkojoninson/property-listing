<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcountries', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('phonecode');
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
        Schema::dropIfExists('tblcountries');
    }
}
