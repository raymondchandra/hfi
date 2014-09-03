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
			$table->integer('uploaded_by')->unsigned();
			$table->dateTime('tanggal_upload');
			$table->integer('id_cabang')->unsigned();
			
			$table->foreign('uploaded_by')->references('id')->on('auth');
			$table->foreign('id_cabang')->references('id')->on('cabang');
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