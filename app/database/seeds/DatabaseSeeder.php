<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$cabang = new Cabang();
		$cabang->nama = 'Pusat';
		$cabang->tipe = 1;
		$cabang->telp = 123;
		$cabang->fax = 123;
		$cabang->email = 'asd@asd.com';
		$cabang->link = 'www.asd.com';
		$cabang->alamat = 'asdf';
		$cabang->timestamps = false;
		$cabang->save();
		
		$profile = new Anggota();
		$profile->id_cabang = 1;
		$profile->timestamps = false;
		$profile->save();
		
		$acc = new Account();
		$acc->timestamps = false;
	    $acc->username = 'ketua';
	    $acc->password = Hash::make('ketua');
		$acc->profile_id = 1;
		$acc->status_aktif = 1;
		$acc->role = 1;
	    $acc->save();
		
		$acc = new Account();
		$acc->timestamps = false;
	    $acc->username = 'wakil';
	    $acc->password = Hash::make('wakil');
		$acc->profile_id = 1;
		$acc->status_aktif = 1;
		$acc->role = 1;
	    $acc->save();
		
		$acc = new Account();
		$acc->timestamps = false;
	    $acc->username = 'sekertaris';
	    $acc->password = Hash::make('sekertaris');
		$acc->profile_id = 1;
		$acc->status_aktif = 1;
		$acc->role = 1;
	    $acc->save();
		
		$acc = new Account();
		$acc->timestamps = false;
	    $acc->username = 'bendahara';
	    $acc->password = Hash::make('bendahara');
		$acc->profile_id = 1;
		$acc->status_aktif = 1;
		$acc->role = 1;
	    $acc->save();
		
		
	}

}