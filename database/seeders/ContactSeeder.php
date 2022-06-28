<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\User;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect(User::all()->modelKeys());
        $faker = Faker::create();
        foreach(range(1,50) as $index){
            DB::table('contacts')->insert([
                'user_id'=> $users->random(),
                'name'=> $faker->sentence(2),
                'email'=> 'user@gmail.com',
                'phone'=> '01710100100',
                'message'=> $faker->sentence(5),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ]);
        }
    }
}
