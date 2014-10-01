<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHarga extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('harga', function (Blueprint $table) {
            $table->create();
			$table->increments('id');
			$table->integer('id_kegiatan')->unsigned();
			$table->tinyInteger('early');
			$table->string('kategori');
			$table->string('harga');
			$table->tinyInteger('isHeader');
			

			
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
		Schema::table('harga', function (Blueprint $table) {
            $table->drop();
        });
	}

}