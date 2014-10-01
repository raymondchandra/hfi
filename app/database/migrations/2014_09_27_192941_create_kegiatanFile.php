<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatanFile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kegiatanFile', function (Blueprint $table) {
            $table->create();
			$table->increments('id');
			$table->integer('id_kegiatan')->unsigned();

			$table->string('file_path');
			$table->string('tipe'); //header, sponsor, other
			
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
		Schema::table('kegiatanFile', function (Blueprint $table) {
            $table->drop();
        });
	}

}