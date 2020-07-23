<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class AdminController extends Controller
{
    //mostrar las vista de admistrador
    public function index()
    {
         $search = '';
         $categorias = Category::all();
         $productos = Product::all();
         //return $productos;
         return view('plantilla.admin', compact('productos', 'categorias', 'search'));
       
    }



}
