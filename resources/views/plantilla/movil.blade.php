@extends('layouts.app')

@section('content')
<h2>{{ $producto->nombre }}</h2>

<div class="row " id="lista-product">
<div class="col-md-6 img">
    <img src="{{ Storage::url($producto->imagen) }}"  class="img-fluid" alt="">
</div>
<div class="col-md-6">
    <div class="container">
        <div class="row">
            <div class="card  col-ml-4 mt-1">
                <div class="card-header">
                    <h3>Especificaciones</h3>
                </div> 
                 <div class="card-body">
                        <h4 class="nombre">{{ $producto->nombre }}</h4> <br>
                        Precio:<p class="precio" class="text-uppercase"> ${{ $producto->precio }}</p>
                        Cantidad:<p class="text-uppercase">  {{ $producto->cantidad }}</p>
                        Categoria:<p class="text-uppercase">  {{ $producto->category->marca }}</p>
                        Disponible:<p class="text-uppercase"> {{ $producto->activo}}</p>
                        Caracteristicas:<p>{{ $producto->caracteristica }}</p>
                                    
                   
                </div>
                
                    <a class="text-light btn btn-block btn-lg btn-success text-light agregar-carrito" href="#" data-id="{{ $producto->id }}">
                        <i class="fas fa-shopping-cart mr-2 "></i>Agregar al Carrito
                    </a>
                 
            </div>
        </div>
    </div>
</div>
</div>

@endsection