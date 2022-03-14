<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblproperties', function (Blueprint $table) {
            $table->string('transid', 50)->primaryKey();
            $table->string('status');
            $table->boolean('ownership_status')->default(0);
            $table->string('title');
            $table->text('slug');
            $table->longText('description');
            $table->string('country', 20);
            $table->string('state', 20);
            $table->string('city');
            $table->string('building_type');
            $table->longText('address')->nullable();
            $table->string('gpsaddress')->nullable();
            $table->decimal('price', 10, 2); 
            $table->integer('bedrooms')->default(0);
            $table->integer('baths')->default(0);
            $table->integer('floors')->default(0);
            $table->integer('garages')->default(0);
            $table->string('area')->nullable();
            $table->json('misc')->nullable();
            $table->json('amenities')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->longText('schools_neighbourhood')->nullable();
            $table->json('pictures')->nullable();
            $table->boolean('deleted')->default(0);
            $table->boolean('featured')->default(1);
            $table->boolean('popular')->default(1);
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
        Schema::dropIfExists('tblproperties');
    }
}
