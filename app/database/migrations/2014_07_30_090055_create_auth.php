<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuth extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cabang', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('tipe');
            $table->string('kode');
			$table->string('nama')->unique();
			$table->string('alamat');
			$table->string('telp');
			$table->string('fax');
			$table->string('email');
			$table->string('link');
			
        });
		
		Schema::table('profile', function (Blueprint $table) {
            $table->create();
			$table->increments('id');
            $table->string('no_anggota');
            $table->string('nama');
			$table->date('tanggal_lahir');
			$table->string('tempat_lahir');
			$table->tinyInteger('gender');
			$table->date('tanggal_revisi');
            $table->integer('id_cabang')->unsigned();
            $table->string('tema_penelitian');
			$table->string('spesialisasi');
            $table->string('profesi');
            $table->string('institusi');
			$table->string('alamat');
			$table->string('kota');
			$table->string('kodepos');
			$table->string('negara');
			$table->string('telepon');
			$table->string('hp');
			$table->string('fax');
			$table->string('email');
            $table->string('situs');
            $table->string('keterangan');
            $table->string('foto_profile');
			
			
			//$table->primary('id');
			$table->foreign('id_cabang')->references('id')->on('cabang');
        });
		
		Schema::table('auth', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
			$table->integer('profile_id')->unsigned();
			$table->date('batas_aktif');
			$table->string('status_aktif');
			$table->string('remember_token')->nullable();
			$table->tinyInteger('role');
			
			$table->foreign('profile_id')->references('id')->on('profile');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('auth', function (Blueprint $table) {
            $table->drop();
        });
	}

}