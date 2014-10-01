<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReply extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reply', function (Blueprint $table) {
            $table->create();
			$table->increments('id');
			$table->integer('pesan_id')->unsigned();

			$table->longText('message');
			$table->string('attachment');
			$table->dateTime('created_at');

			$table->foreign('pesan_id')->references('id')->on('pesan');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reply', function (Blueprint $table) {
            $table->drop();
        });
	}

}