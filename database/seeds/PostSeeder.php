<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        for ($i = 0;$i<100;$i++){
            Post::insert([
                'title' => $faker->name,
                'content' => $faker->sentence,
                'category_id' => rand(1,3)
            ]);
        }
    }
}
