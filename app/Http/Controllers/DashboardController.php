<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
     public function index()
     {
         $total_user = User::all()->count();
         $total_product = Product::all()->count();
         $total_role =Role::all()->count();
         $total_order =Order::all()->count();
         $total_transaction =Transaction::all()->count();
        $users = User::all();
        $products =Product::all();

         return view('dashboard',compact('total_user', 'total_product', 'total_role', 'total_order', 'total_transaction','users','products'));
     }}






























































































































