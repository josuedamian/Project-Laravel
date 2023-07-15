<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Usuario N1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('123456')
         ]);
 
         User::create([
             'name' => 'Usuario N2',
             'email' => 'user2@gmail.com',
             'password' => bcrypt('123456')
          ]);
    }
}
