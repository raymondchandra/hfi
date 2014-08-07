<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengurus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pengurus', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('periode');
            $table->string('file_path');
			$table->string('uploaded_by');
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
		Schema::table('pengurus', function (Blueprint $table) {
            $table->drop();
        });
	}

}