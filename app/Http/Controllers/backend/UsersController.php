<?php

namespace App\Http\Controllers\backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class UsersController extends BackendController
{
    /**
     * Display a listing of the resource.
     *Zxc v
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate($this->limit);
        $usersCount = User::count();
        return view('backend.users.index', compact('users', 'usersCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('backend.users.create', compact('user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserStoreRequest $request)
    {
       $post = $this->nameSlug($request);
       User::create($post);
       return redirect("/backend/users")->with("message", "New User was created");
    }

    public function nameSlug($request) {
        $data = $request->all();

        $name = $request->input('name');

        if(!empty($name)) {
            $slug = str_replace(' ','-', $name);
            $data['slug'] = $slug;
        }

        return $data;

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
        $user = User::FindOrFail($id);
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest $request, $id)
    {
        $post = User::FindOrFail($id);
        $post->update($request->all());
        return redirect("/backend/users")->with("message", "User was edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UserDestroyRequest $request, $id)
    {
        $user = User::FindOrFail($id);
        $deleteOption = $request->delete_option;
        $selectedUser = $request->selected_user;

        if($deleteOption == 'delete') {
            $user->posts()->withTrashed()->forceDelete();
        } elseif ($deleteOption == 'attribute') {
            $user->posts()->update(['author_id' => $selectedUser]);
        }


        $user->delete();
        return redirect("/backend/users")->with("message", "User was deleted");
    }

    public function confirm(Requests\UserDestroyRequest $request, $id)
    {
        $user = User::FindOrFail($id);
        $users = User::where('id', '!=', $user->id)->pluck('name', 'id');
        return view("backend.users.confirm", compact('user', 'users'));
    }
}
