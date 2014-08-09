<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reports', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('ip_address', 45); //The one who reported...
			$table->text('reason');
			$table->timestamps();
			$table->softDeletes();
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('reports');
	}

}
