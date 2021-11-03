<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PDO;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        foreach (range(1,200) as $index){
            DB::table('jobs')->insert([
                'title'=>$faker->title,
                'text'=>$faker->title,
                // 'min_salary'=>$faker->min_salary,
                // 'max_salary'=>$faker->max_salary,
            ]);
        }
    }
}
