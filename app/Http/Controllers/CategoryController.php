<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request){

        $category=new Category();
        $category->name=$request->name;
        $category->status=$request->status;
        $category->save();
        return redirect()->route('category.index')->with('message','added successfully');
    }

    public function index()
    {
        $data=Category::all();
        return view('category.index',compact('data'));
}
   public function edit($id)
{
    $data=Category::find($id);
    return view('category.edit',compact('data'));
}

public function update (Request $request,$id)
{
     $category=Category::find($id);
     $category->name=$request->name;
     $category->status=$request->status;
     $category->update();
     return redirect()->route('category.index')->with('message','update successfully');
}

public function delete($id)
{
    $category=Category::find($id);
    $category->delete();
    return redirect()->route('category.index')->with('message','delete successfully');
}
}
