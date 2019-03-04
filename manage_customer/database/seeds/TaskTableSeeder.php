<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArray = [];
     	for ($i = 0; $i < 20; $i++) {
          	array_push($dataArray, [
              	'title' => str_random(30),
              	'content' => str_random(1000),
              	'picture' => str_random(255)
          	]);
      	}
     	DB::table('task')->insert($dataArray);
    }
}
