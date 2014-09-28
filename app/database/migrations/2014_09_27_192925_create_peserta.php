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

			$table->tinyInteger('presentasi');
			$table->longText('abstract');
			$table->tinyInteger('status_bayar');
			$table->string('invitation_letter');

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
		Schema::table('peserta', function (Blueprint $table) {
            $table->drop();
        });
	}

}