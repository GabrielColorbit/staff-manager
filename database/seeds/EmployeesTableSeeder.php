<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Employee::create([
                'name' => $faker->name,
                'card_id' => $faker->isbn13,
                'address' => $faker->streetAddress,
                'email' => $faker->email,
                'phone' => $faker->tollFreePhoneNumber,
                'gender' => $faker->randomDigit > 5 ? 'M' : 'F',
                'dependents' => $faker->randomDigit,
                'hired_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'fired_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ]);
        }
    }
}
