<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name'=> 'Htike Htike Kyaw',
            'email'=> 'htikekyaw2018@gmail.com',
            'password'=> Hash::make('password'),

        ]);
        


        $categories = ['It News','Food & Drink','Travel','Artist'];

        foreach($categories as $c){
            Category::factory()->create([
                'title' => $c,
                'slug' => Str::slug($c),
                'user_id' => User::inRandomOrder()->first()->id
            ]);
        }

        Post::factory(250)->create();
        
    }
}
