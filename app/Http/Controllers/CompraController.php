<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $search = '';
        $prductos = Product::all();
        $categorias = Category::all();
        return view('plantilla.compra', compact('prductos',  'categorias', 'search' ));
        //    return view('home', compact('products','categories'));
    }
}
