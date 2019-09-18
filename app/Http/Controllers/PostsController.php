<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;
use Image;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('posts.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required|min:3',
            'body' => 'required',
            'photo' =>  'image|mimes:jpg,png,jpeg'
        ]);

        $user = Auth::user();

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $now = date('YmdH');
        $post->slug = str_replace('','-', strtolower($post->title)).'-'.$now;
        $post->user_id = $user->id;

        if ($request->hasFile('photo')){
            $photo = $request->photo;
            
            $filename = time() .'-'. $photo->getClientOriginalName();

            $location = public_path('images/posts' .$filename);
            Image::make($photo)->save($location);
            $post->photo = $filename;
        }

        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $userId = Auth::id();
        if($post->user_id !== $userId){
            return redirect('/posts')->with('error', 'impossible');
        }
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title'  => 'required|min:3',
            'body' => 'required',
        ]);
        
        $post = Post::where('slug',$slug)->first();
       $post->title = $request->input('title');
        $post->body = $request->input('body');
        $userId = Auth::id();
        if($post->user_id !== $userId){
            return redirect('/posts')->with('error', 'impossible');
        }
        $post->save();

        return redirect('/posts/'.$post->slug)->with('success','Your Post Update Successfullt');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::find($id);
        $userId = Auth::id();
        
        if($post->user_id !== $userId){
            return redirect('/posts')->with('error', 'impossible');
        }
        $post->delete();

        return redirect('/posts')->with('success','Your Post Deleted Successfullt');

    }
}
