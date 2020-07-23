<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Route;
use App\Http\Controllers\URL;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //Mostrar en el home los productos
    public function index(Request $request)
    {
        //busqueda
        if($request){
            //buscador normal
            $query = trim($request->get('search'));
            if($request->get('preciomin') && $request->get('preciomax')){

                $preciomin = $request->get('preciomin');
                $preciomax = $request->get('preciomax');

                //$productos = Product::where('precio','BETWEEN', $preciomin. 'AND' .$preciomax )->orderBy('id', 'asc')->get(); 
                $productos = Product::whereBetween('precio', [$preciomin, $preciomax])->get();
                //busqueda por precio
            }else if($request->get('preciomin')){
                $preciomin = $request->get('preciomin');
              //  $preciomax = $request->get('preciomax');
                $productos = Product::where('precio', '>=', $preciomin)->get();
            }else if($request->get('preciomax')){
              //  $preciomin = $request->get('preciomin');
                $preciomax = $request->get('preciomax');
                $productos = Product::where('precio', '<=', $preciomax )->get();
            }else if($request->get('marca')){
                $marca = $request->get('marca');
                //$productos = Product::where('category_id','=' )->join('marca', '%' .  $marca . '%' )->orderBy('id', 'asc')->get();
               $productos = DB::select('
                    SELECT * 
                    FROM products INNER JOIN categories ON categories.id = products.category_id  
                    WHERE categories.marca = ?
                ', [$marca]);
            }else{
                               
                $productos = Product::where('nombre','LIKE', '%' .  $query . '%')->orderBy('id', 'asc')->get();
            }

         
            $categorias = Category::all();
           // $cualquiera = $request->route()->getName() == 'login' || $request->route()->getName() == 'register';
            
            //return json_encode($request->path());
            return view('home', ['productos'=>$productos, 'search'=>$query, 'categorias'=>$categorias]);
        }
 
    
    }


}
