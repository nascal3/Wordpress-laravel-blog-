<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'BlogController@index',
    'as' => 'blog'
]);

Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as' => 'blog.show'
]);

Route::get('/category/{category}', [
    'uses' => 'BlogController@category',
    'as' => 'category'
]);

Route::get('/author/{author}', [
   'uses' => 'BlogController@author',
    'as' => 'author'
]);

Route::get('/tags/{tag}', [
    'uses' => 'BlogController@tag',
    'as' => 'tag'
]);

Auth::routes();

Route::get('/home', 'backend\HomeController@index')->name('home');
Route::get('/edit-account', 'backend\HomeController@edit');
Route::put('/edit-account', 'backend\HomeController@update');

Route::put('backend/blog/restore/{blog}', [
    'uses' => 'backend\BlogController@restore',
    'as' => 'backend.blog.restore'
    ]);

Route::delete('backend/blog/force-destroy/{blog}', [
    'uses' => 'backend\BlogController@forceDestroy',
    'as' => 'backend.blog.force-destroy'
]);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('/backend/blog', 'backend\BlogController', ['as' => 'backend']);

Route::resource('/backend/categories', 'backend\CategoriesController', ['as' => 'backend']);
Route::resource('/backend/users', 'backend\UsersController', ['as' => 'backend']);

Route::get('/backend/user/confirm/{confirm}', [
   'uses' => 'backend\UsersController@confirm',
    'as' => 'backend.users.confirm'
]);