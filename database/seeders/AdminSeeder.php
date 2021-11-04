<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    // //     //
    //     $superAdminUser= User::firstOrCreate(
    //         [
    //             'id'=>1
    //         ],
    //         [
    //         'name' => 'Super Admin',
    //         'email' => 'superadmin@invoke.com',
    //         'password' => bcrypt('password'),
    //         'role'=> 1,
            
    //         ]);
    // }

    public function run(){
        $faker = Faker::create();

        foreach(range(1,50) as $index){
            DB::table('users')->insert([
                'name' => $faker->name,
                'email'=> $faker->email,
                'password'=>$faker->password,
                // 'role'=>$faker->role,
            ]);
        }
    }
}
