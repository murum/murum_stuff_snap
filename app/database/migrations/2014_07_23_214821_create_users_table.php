<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('snapname', 100);
			$table->string('kik', 100)->nullable();
			$table->string('instagram', 100)->nullable();
			$table->string('picture')->nullable();
			$table->tinyInteger('sex')->default(0); //0 = not known, 1 = male, 2 = female , 9 = not applicable
			$table->date('birthday');
			$table->text('description');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
