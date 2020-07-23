<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Category;

class ProductController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resques $request)
    {   
        
       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */        
    public function store(Request $request)
    {
        $prod = new Product();
        
        $prod->nombre = $request->nombre;
        $prod->category_id = $request->category_id;
        $prod->imagen = $request->file('imagen')->store('public');
        $prod->cantidad = $request->cantidad;
        $prod->precio = $request->precio;
        $prod->caracteristica = $request->caracteristica;
        $prod->activo = $request->activo;
        //return $prod;

        $prod->save();
        
        $productos = Product::all();
        $categorias = Category::all();
        //return view('plantilla.admin', compact('categorias','productos'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Mostrar el recurso especificado.
    public function show(Product $producto )
    {

        //return json_encode($producto);
        $search = '';
        return view('plantilla.movil', compact('producto', 'search'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Mostrar el formulario para editar el recurso especificado.
    public function edit($id)
    {
        //
        $search = '';
        $producto = Product::findOrFail($id);
        $categorias = Category::all();
       // return $producto;
        return view('plantilla.editar', compact('categorias','producto', 'search'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Actualiza el recurso especificado en el almacenamiento.
    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required',
            'category_id' => 'required',
           // 'imagen' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'caracteristica' => 'required',
            'activo' => 'required'
        ]);

        $producto = Product::findOrFail($id);

        $producto->nombre = $request->get('nombre');
        $producto->category_id = $request->get('category_id');
        // if ($request->hasFile('imagen')) {
        //     $producto->imagen = $request->get('imagen')->file('imagen')->store('public');
        // }
       
        $producto->cantidad = $request->get('cantidad');
        $producto->precio = $request->get('precio');
        $producto->caracteristica = $request->get('caracteristica');
        $producto->activo = $request->get('activo');
        
        $producto->update();

        
        return redirect('admin');
        //return view('plantilla.admin'); 


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Eliminar el recurso especificado del almacenamiento.
    public function destroy($id)
    {
        Product::destroy($id);
        // return json_encode($id);
        // Product::where('id', $id)->delete();
        // return redirect()->black()->whith('success','Delete Successfully');
        return redirect('admin');
    }
}
