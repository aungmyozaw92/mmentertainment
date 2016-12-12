<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersSeeder extends Seeder
 {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		App\User::create
		([
			'username'=>'admin',
			'email'   => 'aungmyozaw.dev@gmail.com',
			'role_id' => 1,
			'password' => Hash::make('mmadmin')
		]);
	}

}
