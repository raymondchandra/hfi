<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatan2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kegiatan2', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('nama');
			$table->string('tempat');
			$table->date('waktu_mulai');
			$table->date('waktu_selesai');
			$table->tinyInteger('tipe');
			$table->tinyInteger('openRegistration');
			$table->string('pass_admin');
			$table->tinyInteger('admin_aktif');
			$table->date('early_start');
			$table->date('early_finish');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('kegiatan2', function (Blueprint $table) {
            $table->drop();
        });
	}

}