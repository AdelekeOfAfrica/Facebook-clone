<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Resources\AllPostCollection;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts =Post::orderBy('created_at', 'desc')->get();

        return Inertia::render('Posts',[
            'posts'=> new AllPostCollection($posts)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $request->validate(['text'=>'required']);
        $post = new Post;

        if($request->hasFile('image')){
            $request->validate(['image' => 'required|mimes:jpeg,jpg,png']);
            $post = (new ImageService)->updateImage($post, $request);
        }
        $post->user_id = auth()->user()->id;
        $post->text = $request->input('text');
        $post->save();


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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $post = Post::find($id);

        if(!empty($post->image)) {
            $currentImage = public_path() . $post->image;

            if(file_exists($currentImage)) {
                unlink($currentImage);

            }
        }
        $post->delete();
    }
}
