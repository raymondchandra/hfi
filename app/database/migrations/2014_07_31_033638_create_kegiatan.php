<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kegiatan', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('id_konten')->unsigned();
            $table->string('nama_kegiatan');
			$table->string('brosur_kegiatan');
			$table->string('uploaded_by');
			$table->dateTime('tanggal_date');
			
			$table->foreign('uploaded_by')->references('id')->on('profile');
			$table->foreign('id_konten')->references('id')->on('konten');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('kegiatan', function (Blueprint $table) {
            $table->drop();
        });
	}

}