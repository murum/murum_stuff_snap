<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration {

	public function up()
	{
        Schema::create("admins", function($table) {
            $table->increments("id");
            $table->string("username", 50);
            $table->string("password", 60);
            $table->string("remember_token", 100)->nullable();
            $table->string("role", 100)->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
        Schema::dropIfExists("admins");
	}
}
