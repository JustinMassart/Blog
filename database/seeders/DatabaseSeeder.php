<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->create([
            'name' => 'Justin Massart',
            'username' => 'JustinMassart',
            'email' => 'justinmassart@outlook.com',
            'password' => 'password',
        ]);

        User::factory(15)->create();
        Category::factory(7)->create();
        Post::factory(100)->create();
        Comment::factory(300)->create();
    }
}
