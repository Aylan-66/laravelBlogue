<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::get();	
        return view('dashboard')->with('produits', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost(Request $request)
    {
        $post = new Post;

        $post->title = $request->get('title');
		$post->content = $request->get('content');
        $post->user_id = Auth::user()->id;

		$post->save();
        $post = Post::get();	
        return view('dashboard')->with('posts', $post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function seecreatePost(Request $request)
    {
        return view('post.createpost');
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
    public function editpost($id)
    {
		return view('post.updatepost')->with('posts', Post::GetById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updatepost(Request $request, $id)
    {
        Post::where('id', $id)
                ->update(['title' => $request->get('title'),
                         'content'=>$request->get('content')]
                        );
        return view('dashboard')->with('posts', Post::get());
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return view('dashboard')->with('posts', Post::get());
    }
}
