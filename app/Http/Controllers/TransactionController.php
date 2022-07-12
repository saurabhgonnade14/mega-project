<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
   public function store (Request $request)
   {
    $transaction=new Transaction();
    $transaction->order_id=$request->order_id;
    $transaction->mode=$request->mode;
    $transaction->type=$request->type;
    $transaction->save();
    return redirect()->route('transaction.index')->with('message','added successfully');
   }

   public function index()
   {
       $data=Transaction::all();
       return view('transaction.index',compact('data'));
   }

   public function edit($id)
   {
       $data=Transaction::find($id);
       return view('transaction.edit',compact('data'));
   }

   public function update (Request $request,$id)
   {
        $transaction=Transaction::find($id);
        $transaction->order_id=$request->order_id;
        $transaction->mode=$request->mode;
        $transaction->type=$request->type;
        $transaction->update();
        return redirect()->route('transaction.index')->with('message','update successfully');
   }

   public function delete($id)
   {
       $user=Transaction::find($id);
       $user->delete();
       return redirect()->route('transaction.index')->with('message','delete successfully');

   }
}

