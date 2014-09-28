<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pesan', function (Blueprint $table) {
            $table->create();
			$table->increments('id');
			$table->integer('id_kegiatan')->unsigned();

			$table->integer('id_peserta')->unsigned();
			$table->string('subject');
			$table->longText('message');
			$table->tinyInteger('inOut'); // 1/0
			$table->string('attachment');
			$table->foreign('id_kegiatan')->references('id')->on('kegiatan');
			$table->foreign('id_peserta')->references('id')->on('peserta');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pesan', function (Blueprint $table) {
            $table->drop();
        });
	}

}