<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblusers', function (Blueprint $table) {
            $table->increments('transid')->primaryKey();
            $table->string('userid')->unique();
            $table->string('username', 50)->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('mname')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role', 20);
            $table->string('picture')->nullable();
            $table->boolean('deleted')->default(0);
            $table->string('createuser');
            $table->dateTime('createdate');
            $table->string('modifyuser')->nullable();
            $table->dateTime('modifydate')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblusers');
    }
}
