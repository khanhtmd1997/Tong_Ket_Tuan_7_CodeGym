<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
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
  		$post->title = 'Hà Nội';
  		$post->summary = 'Lối sống Hà Nội';
  		$post->content = 'Hà Nội là thủ đô nước Cộng Hòa xã hội chủ nghĩa Việt Nam';
  		$post->picture = '';
  		$post->category_id = '1';
  		$post->save();

  		$post = new Post();
  		$post->id = 2;
  		$post->title = 'Huế';
  		$post->summary = 'Lối sống Huế';
  		$post->content = 'Huế là thành phố thuộc nước Cộng Hòa xã hội chủ nghĩa Việt Nam';
  		$post->picture = '';
  		$post->category_id = '2';
  		$post->save();

    }
}
