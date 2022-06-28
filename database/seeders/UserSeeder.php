<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[
            [
                'name'=>'Admin',
                'email'=>'admin@gmai.com',
                'role_as'=>'1',
                'password'=> bcrypt(11223344)
            ],
            [
                'name'=>'User',
                'email'=>'user1@gmai.com',
                'role_as'=>'0',
                'password'=> bcrypt(12345678)
            ],
        ];

        foreach($users as $key => $value)
        {
            User::create($value);
        }
    }
}
