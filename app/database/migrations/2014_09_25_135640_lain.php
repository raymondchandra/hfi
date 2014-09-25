<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lain extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lain', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->longText('konten');
            $table->string('title');
			$table->dateTime('tanggal_edit');
			$table->integer('edited_by')->unsigned();
			
			$table->foreign('edited_by')->references('id')->on('auth');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lain', function (Blueprint $table) {
            $table->drop();
        });
	}

}