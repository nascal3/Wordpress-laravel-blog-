<?php

use Illuminate\Database\Seeder;
use \App\Tag;
use \App\Post;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();

        $php = new Tag();
        $php->name = 'PHP';
        $php->slug = 'PHP';
        $php->save();

        $laravel = new Tag();
        $laravel->name = 'Laravel';
        $laravel->slug = 'laravel';
        $laravel->save();

        $symphony = new Tag();
        $symphony->name = 'Symphony';
        $symphony->slug = 'symphony';
        $symphony->save();

        $vue = new Tag();
        $vue->name = 'Vue Js';
        $vue->slug = 'vueJS';
        $vue->save();

        $tags = [
            $php->id,
            $laravel->id,
            $symphony->id,
            $vue->id
        ];


        foreach (Post::all() as $posts) {
            shuffle($tags);
            for($i=1; $i < rand(0, count($tags)-1); $i++){
                $posts->tags()->detach($tags[$i]);
                $posts->tags()->attach($tags[$i]);
            }

        }
    }
}
