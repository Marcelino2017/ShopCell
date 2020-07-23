@extends('layouts.app')

@section('content')
<div class="container table-responsive">
<h2>Lista Prductos <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-plus-circle mr-1"></i>Agregar Productos</button></h2>

<table class="table table-responsive text-center" id="tabla">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Categoria</th>
        <th scope="col">Imagen</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Caracteristica</th>
        <th scope="col">activo</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody id="body-tabla">
      @foreach ($productos as $pro)
            <tr id="lista-producto1">
              <th class="id"  scope="row">{{ $pro->id  }}</th>
              <td class="nombre"  >{{ $pro->nombre }}</td>
              <td class="category"  >{{ $pro->category->marca }}</td>
              <td class="imagen" ><img  width="100px" src="{{ Storage::url($pro->imagen) }}" alt=""></td>
              <td class="cantidad" >{{ $pro->cantidad }}</td>
              <td class="precio" >${{$pro->precio }}</td>
              <td class="caracteristica">{{ $pro->caracteristica }}</td>
              <td class="activo" >{{ $pro->activo }}</td>
              <td>
                <a href="{{ route('productos.edit', $pro->id) }}">
                  <button type="button" class="btn btn-success float-center mt-2 bot-edit" >
                    <i class="fas fa-edit"></i>
                  </button> 
                </a>

                <form action="/productos/{{ $pro->id }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" onclick="return confirm('¿Borrar?')" class="btn btn-danger mt-2 float-center">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>          
                
              </td>
            </tr>
      @endforeach
  
    </tbody>
  </table>
</table>
</div>

<!-- Tabla de Categoria-->
<div class="container mt-5">
  <h2>Categoria <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal1">
  <i class="fas fa-plus-circle mr-1"></i>Agregar Cartegoria</button></h2>
  <table class="table text-center" id="tabla">
    <thead class="thead-dark" >
      <tr>
        <th scope="col">#</th>
        <th scope="col">Marca</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categorias as $categoria)
        <tr text-aling-center>
          <th scope="row">{{ $categoria->id }}</th>
          <td>{{ $categoria->marca}}</td>
          <td>
              {{-- <button type="button" class="btn btn-success float-center" id="editar">
                <i class="fas fa-edit"></i>
              </button> --}}
              <form action="/categorias/{{ $categoria->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" onclick="return confirm('¿Borrar?')" class="btn btn-danger mt-2 float-center">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>   
            
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
</div>

<!-- Modal  Agregar producto-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/productos" method="POST" enctype="multipart/form-data" id="form">
          @csrf
          <div class="row">
            <div class="col">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre"placeholder="Nombre del Producto" required>
            </div>
            <div class="col">
              <label for="cantidad">Cantidad</label>
              <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" required>
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
              <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio" required>
            </div>
            <div class="col">
              <label for="activo">Activo</label>
              <select class="custom-select" name="activo"  id="activo"  required>
                <option selected disabled value="">..</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div>
          <div class="container mt-3">
            <div class="form-group mt-3" >
              <label for="imagen">Imagen</label>
              <input type="file" class="form-control-file" id="imagen"  name="imagen">
            </div>
          </div>
          <div class="container mt-3">
            <div class="form-group">
              <label for="caracteristica">Caracteristica del Producto</label>
              <textarea class="form-control" name="caracteristica" rows="3" id="caracteristica" required></textarea>
            </div>
          </div>          
          <button type="submit" class="btn btn-success float-right" id="guardar" ><i class="fas fa-save mr-2"></i>Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--fin de agregar producto-->

<!-- Modal agregar categoria -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/categorias" method="POST">
          @csrf
          <div class="row">
            <div class="col">
              <label for="marca">Categoria</label>
              <input type="text" class="form-control" name="marca"placeholder="Categoria" required>
            </div>
          </div>
          
          <button type="submit" class="btn btn-success float-right mt-3" >
            <i class="fas fa-save mr-2"></i>Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal editar producto -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">         
        
        <form action="/productos" method="POST" enctype="multipart/form-data" >
          @method('PATCH')
          @csrf
          <div class="row">
            <div class="col">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" name="nombre" value="" placeholder="Nombre del Producto" required>
            </div>
            <div class="col">
              <label for="cantidad">Cantidad</label>
              <input type="text" class="form-control" name="cantidad" placeholder="Cantidad" required>
            </div>
            <div class="col">
              <label for="category_id" >Categoria</label>
              <select class="custom-select" name="category_id" required>
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
              <input type="text" class="form-control" name="precio" placeholder="Precio" required>
            </div>
            <div class="col">
              <label for="activo">Activo</label>
              <select class="custom-select" name="activo" required>
                <option selected disabled value="">..</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </div>
          </div>
          <div class="container mt-3">
            <div class="form-group mt-3" >
              <label for="imagen">Imagen</label>
              <input type="file" class="form-control-file" name="imagen" required>
            </div>
          </div>
          <div class="container mt-3">
            <div class="form-group">
              <label for="caracteristica">Caracteristica del Producto</label>
              <textarea class="form-control" name="caracteristica" rows="3" required></textarea>
            </div>
          </div>    
             
          <button type="submit" class="btn btn-success float-right" ><i class="fas fa-save mr-2"></i>Guardar Edición</button>
        </form>

      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

{{-- <script>

$('#exampleModal3').on('show.bs.modal','.modal', function(event){
  var btn = $(event.relatedTarget)
  console.log(btn);
  console.log('asdasdad');
  
  
})


</script> --}}
@endsection


