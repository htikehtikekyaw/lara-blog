<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\User;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['It News','Food & Drink','Travel','Artist'];

        foreach($categories as $c){
            Category::factory()->create([
                'title' => $c,
                'slug' => Str::slug($c),
                'user_id' => User::inRandomOrder()->first()->id
            ]);
        }
    }
}
