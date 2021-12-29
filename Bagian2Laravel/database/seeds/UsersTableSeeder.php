<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayUser = [
			[
				'name' => 'admin',
				'email' => 'admin@transisi.id',
				'password' => Hash::make('transisi'),
			]
		];

		foreach($arrayUser as $value) {
			User::create($value);
		}
    }
}
