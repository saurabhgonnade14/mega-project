<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class OrderController extends Controller

{
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('order.create',compact('users','products'));
}

  public function store(Request $request)
  {
    $order=new Order();
    $order->user_id=$request->user_id;
    $order->product_id=$request->product_id;
    $order->price=$request->price;
    $order->tax=$request->tax;
    $order->delivery_charges=$request->delivery_charges;
    $order->total=$request->total;
    $order->status=$request->status;
    $order->quantity=$request->quantity;
    $order->tracking_number=$request->tracking_number;
    $order->save();
    return redirect()->route('order.index')->with('message','added successfully');
  }

  public function index()
  {
    //   $data=Order::all();
     $data =Order::with('user','products')->get();

      return view('order.index',compact('data'));

  }

  public function edit($id)
  {
      $data=Order::find($id);
    // $data =Order::with('user','products')->first();

      return view('order.edit',compact('data'));
  }

  public function update (Request $request,$id)
  {
       $order=Order::find($id);
       $order->user_id=$request->user_id;
       $order->product_id=$request->product_id;
       $order->price=$request->price;
       $order->tax=$request->tax;
       $order->delivery_charges=$request->delivery_charges;
       $order->total=$request->total;
       $order->status=$request->status;
       $order->quantity=$request->quantity;
       $order->tracking_number=$request->tracking_number;
       $order->update();
       return redirect()->route('order.index')->with('message','update successfully');
  }

  public function delete($id)       
  {
      $user=Order::find($id);
      $user->delete();
      return redirect()->route('order.index')->with('message','delete successfully');

  }
}

