<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Employee;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=1;$i<=100;$i++) {
			Employee::create([
				'name' => $faker->name,
				'email' => $faker->unique()->safeEmail,
				'company_id' => rand(1, 3),
			]);
		}
    }
}
