<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuth extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('auth', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
			$table->dateTime('batas_aktif');
			$table->string('status_aktif');
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
		Schema::table('auth', function (Blueprint $table) {
            $table->drop();
        });
	}

}