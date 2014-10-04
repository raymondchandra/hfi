<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeserta extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('peserta', function (Blueprint $table) {
            $table->create();
			$table->increments('id');
			$table->integer('id_kegiatan')->unsigned();

			$table->string('username');
			$table->string('password');


			$table->string('nama');
			$table->string('institusi');
			$table->string('pekerjaan');
			$table->string('email');
			$table->string('alamat');

			$table->string('status');
			$table->tinyInteger('presentasi');
			$table->longText('abstract');
			$table->tinyInteger('status_bayar');
			$table->string('bukti_bayar');
			$table->string('paper');

			$table->tinyInteger('is_paper');


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
		Schema::table('peserta', function (Blueprint $table) {
            $table->drop();
        });
	}

}