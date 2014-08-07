<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContent extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('konten', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('konten');
            $table->string('judul_konten');
			$table->dateTime('tanggal_edit');
			$table->string('edited_by');
			
			$table->foreign('edited_by')->references('id')->on('profile');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('konten', function (Blueprint $table) {
            $table->drop();
        });
	}

}