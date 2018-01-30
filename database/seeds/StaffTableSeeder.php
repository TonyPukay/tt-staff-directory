<?php

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        App\Staff::truncate();

        for ($i = 0; $i < 50000; $i++) {
            App\Staff::create([
                'id_chief' => rand(1, 50000),
                'name' => $faker->name,
                'working_position' => $faker->jobTitle,
                'salary' => $faker->randomNumber(rand(4, 5), true),
                'created_at' => $faker->dateTimeBetween()
            ]);
        }
    }
}
