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
			$table->integer('id_rate')->unsigned();
			$table->string('kategori');
			$table->string('harga');
			$table->tinyInteger('isHeader');
			

			
			$table->foreign('id_kegiatan')->references('id')->on('kegiatan');
			$table->foreign('id_rate')->references('id')->on('rate');
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