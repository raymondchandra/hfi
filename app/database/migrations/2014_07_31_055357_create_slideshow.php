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