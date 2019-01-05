<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Category;
use App\Post;
use Session;
use Auth;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::All();
        if($categories->count() == 0 || $tags->count() == 0)
        {
            Session::flash('info','You must have some categories and tags to create a post.');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $this->validate($request, [
            'title' => 'required|',
            'featured' => 'required|image',
            'content'  => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);
        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->content =  $request->content;
        $post->featured = 'uploads/posts/' . $featured_new_name;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);
        $post->save();
        
        
        $post->tags()->attach($request->tags);
        Session::flash('success', 'you succesfully created a post');

        return redirect()->route('index');
        
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
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
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
        
        $this->validate($request, [
            'title' => 'required|',
            
            'content'  => 'required',
            'category_id' => 'required',
        
        ]);
         
        $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        
        $post->Category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);

        Session::flash('success', 'you succesfully updated the post');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','the post was trashed');
        return redirect()->back();
    }

    public function trashed() {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post deleted permanently');
        return redirect()->back();
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post restored successfully');
        return redirect()->route('posts');
    }
}
