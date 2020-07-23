<?php

use Illuminate\Support\Facades\Route;
use App\Product;
use App\Category;

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

// Route::get('/', function(){
//     $categorias = Category::all();
//     $productos = Product::all();
//     return view('home', compact('productos', 'categorias'));
//    // return view('home');
// });
Route::get('/', 'HomeController@index');

Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');

Route::resource('admin', 'AdminController');
Route::resource('categorias', 'CategoryController');
Route::resource('productos', 'ProductController');
Route::get('compra', 'CompraController@index')->name('compra');
//Route::get('home/{id}', 'MovilController');