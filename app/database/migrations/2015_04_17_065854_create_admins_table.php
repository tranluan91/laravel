<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function($table) {
            $table->increments('id');
            $table->string('email', 64)->unique();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->string('forget_token')->nullable();
            $table->string('active_token')->nullable();
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
        Schema::drop('admins');
    }

}
