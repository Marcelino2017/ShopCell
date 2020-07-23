<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product; 

class MovilController extends Controller
{
    public function index()
    {
        $categorias = Category::all();
        $productos = Product::all();
        //return $productos;
        return view('movil', compact('categorias', 'productos'));
    }

  
}