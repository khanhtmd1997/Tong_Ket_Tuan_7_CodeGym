<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('_blog')->insert([
            'title' => "Nguyễn Văn Khánh",
            'summary' => 'Tóm tắt Nguyễn Văn Khánh',
            'content' => 'Nội Dung Của Nguyễn Văn Khánh',
            'picture' => 'fgdfdsjfh.png'
        ]);
    }
}
