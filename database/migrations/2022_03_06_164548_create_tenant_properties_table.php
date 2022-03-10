<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbltenant_properties', function (Blueprint $table) {
            $table->increments('transid')->primaryKey();
            $table->string('tenant_id');
            $table->string('property_id');
            $table->boolean('deleted')->default(0);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('tbltenant_properties');
    }
}
