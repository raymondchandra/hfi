<?php

use Illuminate\Database\Migrations\Migration;

class CreateTemplate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('template', function (Blueprint $table) {
            $table->create();
			$table->increments('id');
			$table->integer('id_kegiatan')->unsigned();
			$table->string('tipe');
			$table->longText('text');

			$table->foreign('id_kegiatan')->references('id')->on('kegiatan2');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('template', function (Blueprint $table) {
            $table->drop();
        });
	}

}