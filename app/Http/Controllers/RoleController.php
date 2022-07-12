<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    public function store(Request $request){

        $product=new Role();
        $product->name=$request->name;
        $product->slug=$request->slug;
        $product->save();
        return redirect()->route('role.index')->with('message','added successfully');
    }

    public function index()
    {
        $data=Role::all();
        return view('role.index',compact('data'));
}
   public function edit($id)
{
    $data=Role::find($id);
    return view('role.edit',compact('data'));
}

public function update (Request $request,$id)
{
     $product=Role::find($id);
     $product->name=$request->name;
     $product->slug=$request->slug;
     $product->update();
     return redirect()->route('role.index')->with('message','update successfully');
}

public function delete($id)
{
    $user=Role::find($id);
    $user->delete();
    return redirect()->route('role.index')->with('message','delete successfully');
}
}

