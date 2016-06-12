<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        Post::truncate();
        Post::create([
            'title' => 'Amazing First Post',
        ]);
        Post::create([
            'title' => 'Foo Bar Article',
        ]);
    }
}
