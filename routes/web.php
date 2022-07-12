<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SecretController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('dashboard',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::get('/',[WelcomeController::class,'index'])->name('welcome');

require __DIR__.'/auth.php';




Route::get('user/create', [UserController::class, 'create']);
Route::post('api/fetch-states', [UserController::class, 'fetchState']);
Route::post('api/fetch-cities', [UserController::class, 'fetchCity']);


// Route::view('user/create','user.create')->name('user.create');
Route::get('user/create',[UserController::class,'create'])->name('user.create');
Route::view('user/index','user.index')->name('user.index');
Route::post('user/store',[UserController::class,'store'])->name('user.store');
Route::get('user/index',[UserController::class,'index'])->name('user.index');
Route::get('user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
Route::post('user/update/{id}',[UserController::class,'update'])->name('user.update');
Route::get('user/delete/{id}',[UserController::class,'delete'])->name('user.delete');

// Route::view('product/create','product.create')->name('product.create');
Route::get('product/create',[ProductController::class,'create'])->name('product.create');

Route::view('product/index','product.index')->name('product.index');
Route::post('product/store',[ProductController::class,'store'])->name('product.store');
Route::get('product/index',[ProductController::class,'index'])->name('product.index');
Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('product/delete/{id}',[productController::class,'delete'])->name('product.delete');

Route::view('Role/create','role.create')->name('role.create');
Route::view('Role/index','role.index')->name('role.index');
Route::post('Role/store',[RoleController::class,'store'])->name('role.store');
Route::get('Role/index',[RoleController::class,'index'])->name('role.index');
Route::get('role/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
Route::post('role/update/{id}',[RoleController::class,'update'])->name('role.update');
Route::get('role/delete/{id}',[RoleController::class,'delete'])->name('role.delete');


// Route::view('Order/create','order.create')->name('order.create');
Route::get('order/create',[OrderController::class,'create'])->name('order.create');
Route::view('Order/index','order.index')->name('order.index');
Route::post('Order/store',[OrderController::class,'store'])->name('order.store');
Route::get('Order/index',[OrderController::class,'index'])->name('order.index');
Route::get('Order/edit/{id}',[OrderController::class,'edit'])->name('order.edit');
Route::post('Order/update/{id}',[OrderController::class,'update'])->name('order.update');
Route::get('Order/delete/{id}',[OrderController::class,'delete'])->name('order.delete');


Route::view('Transaction/create','transaction.create')->name('transaction.create');
Route::view('Transaction/index','transaction.index')->name('transaction.index');
Route::post('Transaction/store',[TransactionController::class,'store'])->name('transaction.store');
Route::get('Transaction/index',[TransactionController::class,'index'])->name('transaction.index');
Route::get('Transaction/edit/{id}',[TransactionController::class,'edit'])->name('transaction.edit');
Route::post('Transaction/update/{id}',[TransactionController::class,'update'])->name('transaction.update');
Route::get('Transaction/delete/{id}',[TransactionController::class,'delete'])->name('transaction.delete');

Route::view('Secret/create','secret.create')->name('secret.create');
Route::view('Secret/index','secret.index')->name('secret.index');
Route::post('Secret/store',[SecretController::class,'store'])->name('secret.store');
Route::get('Secret/index',[SecretController::class,'index'])->name('secret.index');
Route::get('Secret/edit/{id}',[SecretController::class,'edit'])->name('secret.edit');
Route::post('Secret/update/{id}',[SecretController::class,'update'])->name('secret.update');
Route::get('Secret/delete/{id}',[SecretController::class,'delete'])->name('secret.delete');



Route::view('Category/create','category.create')->name('category.create');
Route::view('Category/index','category.index')->name('category.index');
Route::post('Category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('Category/index',[CategoryController::class,'index'])->name('category.index');
Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

// Route::view('Post/create','post.create')->name('post.create');
Route::get('post/create',[PostController::class,'create'])->name('post.create');
Route::view('Post/index','post.index')->name('post.index');
Route::post('Post/store',[PostController::class,'store'])->name('post.store');
Route::get('Post/index',[PostController::class,'index'])->name('post.index');
Route::get('post/edit/{id}',[PostController::class,'edit'])->name('post.edit');
Route::post('post/update/{id}',[PostController::class,'update'])->name('post.update');
Route::get('post/delete/{id}',[PostController::class,'delete'])->name('post.delete');

Route::get('show/{id}',[PostController::class,'show'])->name('post.show');












