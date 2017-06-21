<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();



        $posts = [];
        $faker = Factory::create();
        $date = Carbon::now()->modify('-1 year');

        for($i=1; $i<=36; $i++){

            $date->addDays(10);
            $publishedDate = clone ($date);
            $creation_date =  clone($date);
            $image = "Post_image_".rand(1, 5).".jpg";

            $posts[] = [
                'author_id' => rand(1, 3),
                'title' => $faker->sentence(rand(8, 12)),
                'excerpt' => $faker->text(rand(250, 300)),
                'body' => $faker->paragraphs(rand(10, 15), true),
                'slug' => $faker->slug(),
                'image' => rand(0, 1) == 1 ? $image : NULL,
                'created_at' => $creation_date,
                'updated_at' => $creation_date,
                'published_at' => $i < 30 ? $publishedDate : (rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4))

            ];
        }

        DB::table('posts')->insert($posts);
    }
}
