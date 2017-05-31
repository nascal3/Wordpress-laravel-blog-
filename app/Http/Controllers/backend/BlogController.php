<?php

namespace App\Http\Controllers\backend;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\Facades\Image;


class BlogController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    protected $limit = 5;
    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory'));

    }


    public function index(Request $request)
    {
        if(($status = $request->get('status')) && $status== 'trash'){
            $posts = Post::onlyTrashed()->with('category','author')->latest()->paginate($this->limit);
            $postsCount = Post::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        } else {
            $posts = Post::with('category','author')->latest()->paginate($this->limit);
            $postsCount = Post::count();
            $onlyTrashed = FALSE;
        }
        return view('backend.blog.index', compact('posts','postsCount', 'onlyTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {

       return view('backend.blog.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostRequest $request)
    {
        $data = $this->handleRequest($request);
        $request->user()->posts()->create($data);

        return redirect(route('backend.blog.index'))->with('message', 'Your new blog created successfully');
    }

    private function handleRequest($request){
        $data = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $destination = $this->uploadPath;
            $successUploaded = $image->move($destination, $fileName);

            if($successUploaded){
                $width = config('cms.image.thumbanil.width');
                $height = 170;

                $extention = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extention}","_thumb.{$extention}", $fileName);

                Image::make($destination.'/'.$fileName)
                    ->resize($width, $height)
                    ->save($destination.'/'.$thumbnail);
            }

            $data['image'] = $fileName;
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
       $post = Post::FindOrFail($id);
       return view('backend.blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostRequest $request, $id)
    {
        $post = Post::FindOrFail($id);
        $data = $this->handleRequest($request);
        $post->update($data);
        return redirect(route('backend.blog.index'))->with('message', 'Your blog edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::FindOrFail($id)->delete();
        return redirect(route('backend.blog.index'))->with('trash-message', ['Your post was moved to trash', $id]);
    }

    public function restore($id){
        $post = Post::withTrashed()->FindOrFail($id);
        $post->restore();
        return redirect(route('backend.blog.index'))->with('message', 'Your post has been restored from trash.');
    }

    public function forceDestroy($id) {
        Post::withTrashed()->FindOrFail($id)->forceDelete();
        return redirect('backend/blog?status=trash')->with('message', 'Your post has been destroyed.');
    }
}
