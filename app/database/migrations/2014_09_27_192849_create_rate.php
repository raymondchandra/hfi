<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rate', function (Blueprint $table) {
            $table->create();
			$table->increments('id');

			$table->integer('id_kegiatan')->unsigned();
			$table->string('tipe');
			$table->string('desc');
			

			
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
		Schema::table('rate', function (Blueprint $table) {
            $table->drop();
        });
	}

}