<?php

use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->truncate();
       DB::table('categories')->insert([

           [
               'title' => 'Web Development',
               'slug' => 'web-development'
           ],
           [
               'title' => 'Web Design',
               'slug' => 'web-design'
           ],
           [
               'title' => 'General',
               'slug' => 'general'
           ],
           [
               'title' => 'DIY',
               'slug' => 'diy'
           ],
           [
               'title' => 'Facebook Development',
               'slug' => 'facebook-development'
           ],

        ]);

       for($post_id=1; $post_id<=10; $post_id++){
           $category_id = rand(1,  5);
           DB::table('posts')->where('id',$post_id)->update(['category_id'=> $category_id]);
       }

    }
}
