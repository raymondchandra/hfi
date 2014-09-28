<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatanKonten extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kegiatanKonten', function (Blueprint $table) {
            $table->create();
			$table->increments('id');
			$table->integer('id_kegiatan')->unsigned();
            $table->longText('konten');       
			$table->string('tipe');
			$table->dateTime('tanggal_edit');
			
			$table->foreign('id_kegiatan')->references('id')->on('kegiatan');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('kegiatanKonten', function (Blueprint $table) {
            $table->drop();
        });
	}

}