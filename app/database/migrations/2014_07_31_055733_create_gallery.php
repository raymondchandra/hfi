<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGallery extends Migration {

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
				$table->string('kapsion');
				$table->string('file_path');
				$table->string('uploaded_by');
				$table->integer('type')->unsigned();
				$table->dateTime('tanggal_upload');
				
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
		Schema::table('gallery', function (Blueprint $table) {
            $table->drop();
        });
	}

}