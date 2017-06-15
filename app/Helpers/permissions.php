<?php

use App\Post;

 function check_user_permissions($request, $actionName = NULL, $id = NULL) {

     //get current user
     $currentUser = $request->user();

     //get action name
     if($actionName) {
         $currentActionName = $actionName;
     }else {
         $currentActionName = $request->route()->getActionName();
     }
     list($controller, $method) = explode('@', $currentActionName );
     $controller = str_replace(["App\\Http\\Controllers\\backend\\", "Controller"], "", $controller);

     $crusPernmissionMap = [
//            'create' => ['create', 'store'],
//            'update' => ['edit', 'update'],
//            'delete' => ['destroy', 'store', 'forceDestroy'],
//            'read' => ['index', 'view']
         'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy']

     ];

     $classesMap = [
         'Blog' => 'post',
         'categories' => 'category',
         'Users' => 'user'
     ];

     foreach ($crusPernmissionMap as $permission => $methods ){

         if(in_array($method, $methods) && isset($classesMap[$controller])) {

             $className = $classesMap[$controller];

             if ( $className == 'post' && in_array($method, ['edit', 'update', 'destroy', 'forceDestroy', 'restore']) ) {

                 $id = !is_null($id) ? $id : $request->route('blog');

                 if ( $id && (!$currentUser->can("update-others-post") || !$currentUser->can("delete-others-post")) ) {
                     $post = Post::withTrashed()->find($id);

                     if ($post->author_id !== $currentUser->id ) {
                         return false;
                     }

                 }
             }
             //if uder has no permissions dont allow request
             elseif(!$currentUser->can("{$permission}-{$className}")) {
                 return false;
             }
             break;
         }

     }

     return true;

 }