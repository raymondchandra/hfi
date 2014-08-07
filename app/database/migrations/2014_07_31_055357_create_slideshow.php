<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideshow extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gallery', function (Blueprint $table) {
				$table->create();
				$table->increments('id');
				$table->integer('id_kegiatan')->unsigned();
				$table->string('nama_file');
				$table->string('file_path');
				$table->string('uploaded_by');
				$table->dateTime('tanggal_upload');
				
				$table->foreign('uploaded_by')->references('id')->on('profile');
				$table->foreign('id_kegiatan')->references('id')->on('kegiatan');			
			});
			
		Schema::table('slideshow', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('id_gallery')->unsigned();
			
			$table->foreign('id_gallery')->references('id')->on('gallery');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('slideshow', function (Blueprint $table) {
            $table->drop();
        });
	}

}