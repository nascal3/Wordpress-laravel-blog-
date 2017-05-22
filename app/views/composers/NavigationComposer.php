<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 5/23/2017
 * Time: 1:17 AM
 */

namespace app\views\composers;

use Illuminate\View\View;
use App\Post;
use App\category;


class NavigationComposer
{
       public function compose(View $view){
           $this->composeCategories($view);

           $this->composePopularPost($view);
       }

       private function composeCategories(View $view) {
           $categories = category::with(['posts' => function($query){
               $query->published();
           }])->orderBy('title', 'asc')->get();
           $view->with('categories', $categories);

       }

       private function composePopularPost(View $view) {
          $popularPosts = Post::published()->popular()->take(3)->get();
          $view->with('popularPosts', $popularPosts);
       }

}