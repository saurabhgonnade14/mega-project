<?php

namespace App\Http\Controllers;

use App\Models\Secret;
use Illuminate\Http\Request;

class SecretController extends Controller
{
    public function store (Request $request)
    {
        $secret=new Secret();
        $secret->name=$request->name;
        $secret->save();
        return redirect()->route('secret.index')->with('message','added successfully');
       }

       public function index()
       {
           $data=Secret::all();
           return view('secret.index',compact('data'));
       }

       public function edit($id)
       {
           $data=Secret::find($id);
           return view('secret.edit',compact('data'));
       }

       public function update (Request $request,$id)
       {
            $secret=Secret::find($id);
            $secret->name=$request->name;
            $secret->update();
            return redirect()->route('secret.index')->with('message','update successfully');
       }

       public function delete($id)
       {
           $secret=Secret::find($id);
           $secret->delete();
           return redirect()->route('secret.index')->with('message','delete successfully');

       }
    }

