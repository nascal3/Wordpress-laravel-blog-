<?php

namespace App\Http\Controllers;

use App\category;
use App\Post;
use App\User;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    protected $limit = 3;

    public function index()
    {


        $posts = Post::with('author')->latestFirst()
            ->published()
            ->filter(\request('term'))
            ->simplePaginate($this->limit);
        return view('blog.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function category(Category $category){

        $categoryName = $category->title;
        $posts = $category->posts()->with('author')->latestFirst()->published()->simplePaginate($this->limit);
        return view('blog.index', compact('posts', 'categoryName'));
    }

    public function author(User $author){

        $userName = $author->name;
        $posts = $author->posts()->with('category')->latestFirst()->published()->simplePaginate($this->limit);
        return view('blog.index', compact('posts', 'userName'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
       $post->increment('view_count');
       return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
