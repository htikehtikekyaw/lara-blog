<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Nation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PostSeeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            NationSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
        ]);

        // $photos = Storage::allFiles('public');
        // array_shift($photos);
        // Storage::delete($photos);

        // echo "storage clean";
        
        
    }
}
