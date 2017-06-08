<?php

namespace App\Http\Controllers\backend;

use App\category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class CategoriesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *Zxc v
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::with('posts')->orderBy('title')->paginate($this->limit);
        $categoriesCount = category::count();
        return view('backend.categories.index', compact('categories', 'categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('backend.categories.create', compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoryStoreRequest $request)
    {
       category::create($request->all());
       return redirect("/backend/categories")->with("message", "New category was created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =category::FindOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CategoryUpdateRequest $request, $id)
    {
        $post = category::FindOrFail($id);
        $post->update($request->all());
        return redirect("/backend/categories")->with("message", "Category was edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\CategoryDestroyRequest $request, $id)
    {
        $post = category::FindOrFail($id);
        Post::withTrashed()->where('category_id', $id)->update(['category_id' => config('cms.default_category_id')]);
        $post->delete();
        return redirect("/backend/categories")->with("message", "Category was deleted");
    }
}
