<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post();
        $post->id = 1;
        $post->title = "Nguyễn Văn Khánh";
        $post->body = "Trường Đại học Phú Xuân";
        $post->save();
    }
}
