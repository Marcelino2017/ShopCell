@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card ">
            <h3 class="text-center mt-3">Editar Producto</h3>
            <div class="card-body ">
                <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data" id="form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" value="{{ $producto->nombre }}" name="nombre"placeholder="Nombre del Producto" required>
                      </div>
                      <div class="col">
                        <label for="cantidad">Cantidad</label>
                        <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ $producto->cantidad }}" placeholder="Cantidad" required>
                      </div>
                      <div class="col">
                        <label for="category_id">Categoria</label>
                        <select class="custom-select" name="category_id" id="category_id" required>
                          <option selected disabled value=" ">..</option> 
                          @foreach ($categorias as $cat)
                            <option value="{{ $cat->id}}">{{ $cat->marca }}</option>
                            
                          @endforeach
                          
                        </select>
                      </div>
                    </div>
                  
                    <div class="row mt-3">
                      <div class="col">
                        <label for="precio">Precio</label>
                        <input type="text" class="form-control" name="precio"  value="{{ $producto->precio }}" placeholder="Precio" required>
                      </div>
                      <div class="col">
                        <label for="activo">Activo</label>
                        <select class="custom-select" name="activo"   required>
                          <option selected disabled value=""></option>
                          <option>Si</option>
                          <option>No</option>
                        </select>
                      </div>
                    </div>
                    {{-- <div class="container mt-3">
                      <div class="form-group mt-3" >
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control-file"  value="{{ $producto->imagen }}" name="imagen">
                        
                      </div>
                    </div> --}}
                    <div class="container mt-3">
                      <div class="form-group">
                        <label for="caracteristica" >Caracteristica del Producto</label>
                        <textarea  type="input" class="form-control" name="caracteristica" rows="3" value="" required>{{ $producto->caracteristica }}</textarea>
                      </div>
                    </div>          
                    <button type="submit" class="btn btn-success float-right" id="guardar" ><i class="fas fa-save mr-2"></i>Actualizar Datos</button>
                </form>
            </div>
        </div>
    </div>

</div>
    
@endsection