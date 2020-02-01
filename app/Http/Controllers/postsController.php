<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
class postsController extends Controller
{




     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view('posts.index')->with('posts',$posts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //form validation
        $this->validate($request, [
            'title' => 'required', 
            'body' => 'required', 
            'cover_image' => 'image|nullable|max:1991'
        ]);
            //Handle file upload
        if($request->hasFIle('cover_image')){

        //get filename with the extension
        $filenameWithExt= $request->file('cover_image')->getClientOriginalName();

        //Get just filename
        $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //Get the extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        //filename to store 

        $filenameToStore = $filename . '_' . time().'.'.$extension;
        
        //Upload Image 
        $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);

        }else{

            $filenameToStore = 'noImage.jpg';
        }
        
        //Create a new post 
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id= auth()->user()->id;
        $post->cover_image= $filenameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');



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

        $post =  Post::find($id);

        return view('posts/show')->with('post', $post);

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
        $post = Post::find($id);
        // check for correct user
        if(auth()->user()->id !== $post->user_id ){
            return redirect('/posts')->with('error', 'Unauthorized Page');

        }
        return view('posts.edit')->with('post', $post);
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
        //form validation
        $this->validate($request, [
            'title' => 'required', 
            'body' => 'required'
        ]);

         //Handle file upload
         if($request->hasFIle('cover_image')){

            //get filename with the extension
            $filenameWithExt= $request->file('cover_image')->getClientOriginalName();
    
            //Get just filename
            $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
    
            //Get the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
    
            //filename to store 
    
            $filenameToStore = $filename . '_' . time().'.'.$extension;
            
            //Upload Image 
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
    
            }
        
        //Update the post 
        $post =  Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFIle('cover_image')){
            $post->cover_image =$filenameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated!');
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
        $post = Post::find($id);
        if ($post->cover_image !== 'noImage.jpg'){
            $imageToDelete = 'public/cover_images/'.$post->cover_image;
            Storage::delete($imageToDelete);
        }
        // check for correct user
        if(auth()->user()->id !== $post->user_id ){
            return redirect('/posts')->with('error', 'Unauthorized Page');

        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post Deleted');
    }
}