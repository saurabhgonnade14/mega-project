<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Secret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function create()
    {
        $secrets = Secret::all();
        return view('product.create',compact('secrets'));
    }
  public function store(Request $request)
  {
      $product=new Product();
      $product->product=$request->product;
      $product->price=$request->price;
      $product->description=$request->description;
      $product->discount=$request->discount;
      $product->secret_id=$request->secret_id;
      $product->status=$request->status;
      if($request->hasfile('profile_image'))
      {
          $file = $request->file('profile_image');
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'.$extention;
          $file->move('uploads/products/', $filename);
          $product->profile_image = $filename;
      }
      $product->save(); 
    //   dd($product);
      return redirect()->route('product.index')->with('message','added successfully');




  }

  public function index(Request $request)
  {
    $product_name = $request->input('product_search');


    //   dd($request);
    //   $data=Product::all();
      $data =Product::with('secret')->where('product', 'LIKE', '%' . $product_name . '%')
                                    ->orWhere('description', 'LIKE', '%' . $product_name . '%')
                                    ->get();
      return view('product.index',compact('data'));
  }

  public function edit($id)
  {
      $data=Product::find($id);
      return view('product.edit',compact('data'));
  }

  public function update (Request $request,$id)
  {
       $product=Product::find($id);
       $product->product=$request->product;
       $product->price=$request->price;
      $product->description=$request->description;
      $product->discount=$request->discount;
      $product->secret_id=$request->secret_id;
      $product->status=$request->status;


      if($request->hasfile('profile_image'))
      {
          $destination = 'uploads/products/'.$product->profile_image;
          if(File::exists($destination))
          {
              File::delete($destination);
          }
          $file = $request->file('profile_image');
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'.$extention;
          $file->move('uploads/products/', $filename);
          $product->profile_image = $filename;
      }
       $product->update();
       return redirect()->route('product.index')->with('message','update successfully');
  }

  public function delete($id)
  {
      $user=Product::find($id);
      $destination = 'uploads/products/'.$user->profile_image;
      if(File::exists($destination))
      {
          File::delete($destination);
      }
      $user->delete();
      return redirect()->route('product.index')->with('message','delete successfully');

  }
}


