<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = BlogPost::all();

        if(!Auth::check()){
            return redirect('/blog/login');
        }
       
        return view('home') ->with('posts',$posts); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(!Auth::check()){
            return redirect('/blog/login');
        }

        return view('blog.create') ;
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

        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'name'=>$request->name,
            'author_id'=>$request->author_id,
            ]);
        
        return redirect('/blog/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @re
     * turn \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        if(!Auth::check()){
            return redirect('/blog/login');
        }

        if(!is_numeric($id)){
            return redirect('/blog');
        }

    
        $post=BlogPost::find($id);


        return view('singlepost') ->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        //
        if(!Auth::check()){
            return redirect('/blog/login');
        }

        return view('blog.edit', ['post'=>$blogPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //
        if(!Auth::check()){
            return redirect('/blog/login');
        }

        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('blog/' . $blogPost->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        //
        $blogPost -> delete();

        return redirect('/blog/home');
    }
}
