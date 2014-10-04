<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHargaRevisi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('harga', function (Blueprint $table) {
            $table->drop();
            $table->create();
			$table->increments('id');
			$table->integer('id_kegiatan')->unsigned();
			$table->string('kategori');
			$table->string('harga_early');
			$table->string('harga_normal');
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
		//
	}

}