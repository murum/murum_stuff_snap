<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockedIpTable extends Migration {

	public function up()
	{
        Schema::create("blocked_ips", function($table) {
            $table->string("ip", 20);
            $table->string("reason")->nullable();
            $table->timestamps();

            $table->primary("ip");
        });
	}

	public function down()
	{
        Schema::dropIfExists("blocked_ips");
	}

}
