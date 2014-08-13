<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBerkas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('berkas', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('nama_file');
            $table->string('path_file');
            $table->string('uploaded_by');
			$table->dateTime('uploaded_date');
			$table->string('kategori');
			$table->string('deskripsi');

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
		Schema::table('berkas', function (Blueprint $table) {
            $table->drop();
        });
	}

}