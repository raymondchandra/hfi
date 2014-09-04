<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendidikan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pendidikan', function (Blueprint $table) {
            $table->create();
			$table->increments('id');
			$table->integer('id_profile')->unsigned();
            $table->string('gelar');       
			$table->string('lokasi');
			
			//$table->primary('id');
			$table->foreign('id_profile')->references('id')->on('profile');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pendidikan', function (Blueprint $table) {
            $table->drop();
        });
	}

}