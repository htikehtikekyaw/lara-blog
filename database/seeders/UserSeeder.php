<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name'=> 'Htike Htike Kyaw',
            'email'=> 'htikekyaw2018@gmail.com',
            'role'=> 'admin',
            'password'=> Hash::make('password'),
        ]);

        \App\Models\User::factory()->create([
            'name'=> 'Text Editor',
            'email'=> 'editor@gmail.com',
            'role'=> 'admin',
            'password'=> Hash::make('password'),
        ]);

        \App\Models\User::factory()->create([
            'name'=> 'Test Author',
            'email'=> 'author@gmail.com',
            'role'=> 'author',
            'password'=> Hash::make('password'),
        ]);
        
        \App\Models\User::factory()->create([
            'name'=> 'Test Admin',
            'email'=> 'admin@gmail.com',
            'role'=> 'admin',
            'password'=> Hash::make('password'),
        ]);
    }
}
