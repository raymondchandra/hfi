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

		$acc = new Account();
		$acc->timestamps = false;
	    $acc->username = 'ketua';
	    $acc->password = Hash::make('ketua');
		$acc->status_aktif = 1;
		$acc->role = 1;
	    $acc->save();
		
		$acc = new Account();
		$acc->timestamps = false;
	    $acc->username = 'wakil';
	    $acc->password = Hash::make('wakil');
		$acc->status_aktif = 1;
		$acc->role = 1;
	    $acc->save();
		
		$acc = new Account();
		$acc->timestamps = false;
	    $acc->username = 'sekertaris';
	    $acc->password = Hash::make('sekertaris');
		$acc->status_aktif = 1;
		$acc->role = 1;
	    $acc->save();
		
		$acc = new Account();
		$acc->timestamps = false;
	    $acc->username = 'bendahara';
	    $acc->password = Hash::make('bendahara');
		$acc->status_aktif = 1;
		$acc->role = 1;
	    $acc->save();
		
		$cabang = new Cabang();
		$cabang->nama = 'Pusat';
		$cabang->telp = 123;
		$cabang->fax = 123;
		$cabang->email = 'asd@asd.com';
		$cabang->link = 'www.asd.com';
		$cabang->alamat = 'asdf';
		$cabang->timestamps = false;
		$cabang->save();
	}

}