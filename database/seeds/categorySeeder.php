<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\category;

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
               'title' => 'Uncategorized',
               'slug' => 'uncategorized'
           ],
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

       foreach(Post::pluck('id') as $postId){
           $categories = category::pluck('id');
           $categoryId =  $categories[rand(0,  $categories->count()-1)];
           DB::table('posts')->where('id',$postId)->update(['category_id'=> $categoryId]);
       }

    }
}
