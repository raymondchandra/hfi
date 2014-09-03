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
            $table->string('nama_kegiatan');
			$table->string('tempat');
			$table->dateTime('waktu_mulai');
			$table->dateTime('waktu_selesai');
			$table->string('deskripsi');
			$table->string('brosur_kegiatan');
			$table->string('uploaded_by');
			
			$table->string('link')->nullable();
			
			$table->foreign('uploaded_by')->references('id')->on('profile');
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