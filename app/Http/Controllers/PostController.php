<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{


    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        return view('post.create',compact('categories'));
    }
    public function store(Request $request){

        $post=new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->featured=$request->featured;
        $post->status=$request->status;
        $post->category_id=$request->category_id;
        if($request->hasfile('profile_image'))
        {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/products/', $filename);
            $post->profile_image = $filename;
        }


        $post->save();

        return redirect()->route('post.index')->with('message','added successfully');
    }

    public function index()
    {
        $data=Post::with('category')->get();

        return view('post.index',compact('data'));
}
   public function edit($id,Request $request)
{
    $categories = Category::all();
    $data=Post::find($id);

    return view('post.edit',compact('data', 'categories'));
}

public function update (Request $request,$id)
{
     $post=Post::find($id);
     $post->title=$request->title;
     $post->description=$request->description;
     $post->featured=$request->featured;
     $post->status=$request->status;
     $post->category_id=$request->category_id;


     if($request->hasfile('profile_image'))
     {
         $destination = 'uploads/products/'.$post->profile_image;
         if(File::exists($destination))
         {
             File::delete($destination);
         }
         $file = $request->file('profile_image');
         $extention = $file->getClientOriginalExtension();
         $filename = time().'.'.$extention;
         $file->move('uploads/products/', $filename);
         $post->profile_image = $filename;
     }
    //  dd($post);
     $post->update();
     return redirect()->route('post.index')->with('message','update successfully');
}

public function delete($id)
{
    $post=Post::find($id);
    $destination = 'uploads/products/'.$post->profile_image;
    if(File::exists($destination))
    {
        File::delete($destination);
    }
    $post->delete();
    return redirect()->route('post.index')->with('message','delete successfully');
}

public function show($id){
    $post = Post::find($id);
    return view('post.show', compact('post'));


}
}

