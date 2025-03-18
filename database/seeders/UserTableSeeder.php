<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=> 'Admin',
                'email'=> 'admin@gmail.com',
                'password'=> bcrypt('11111111'),
                'role'=>'admin',               

            ],
            [
                'name'=> 'staff',
                'email'=> 'staff@gmail.com',
                'password'=> bcrypt('11111111'),
                'role'=>'staff',  
            ],
            [
                'name'=> 'user',
                'email'=> 'user@gmail.com',
                'password'=> bcrypt('11111111'),
                'role'=>'user',  
            ],
        ]);
    }
}
