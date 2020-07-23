<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <script src="https://kit.fontawesome.com/a8f5f6cd76.js" crossorigin="anonymous"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>  
    <div id="app ">
        <nav class="sticky-top navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Imaster
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- <div class="justify-content-center">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div> --}}
                @if( url()->current() != 'http://127.0.0.1:8000/login' && url()->current() != 'http://127.0.0.1:8000/register'  && url()->current()  != 'http://127.0.0.1:8000/admin'  )                  
               
                    {!! Form::open(array('url'=>'/', 'method'=>'GET', 'autocomplete'=>'off','role'=>'search')) !!}
                        <div class="input-group">
        
                            <input type="text" name="search" class="form-control" placeholder="Buscar texto" value="{{$search }}">
                            <button type="submit" class="btn btn-info ml-1"><i class="fa fa-search"></i> </button>
                        </div>
                    {{Form::close()}}
                    {{-- submeno carrrito --}}
                @endif

                
                <button class="btn btn-success  ml-2" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-shopping-cart"></i>
                </button>
                <ul class="dropdown-menu float-right">
                    <li class="submenu">
                        {{-- <img src="img/cart.png" id="img-carrito"> --}}
                        <div id="carrito">
                                    

                            <table id="lista-carrito" class="table">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>c
                                <tbody>
                                    
                                </tbody>
                            </table>
                            

                            <a href="#" id="vaciar-carrito" class="btn btn-block btn-outline-success">Vaciar Carrito</a>
                        </div>
                        <div class="mt-1">
                                <a href="/compra"  id="compra" class="btn btn-block btn-outline-success">Pagar</a>
                        </div>
                  </ul>

                {{-- fin submeno carrrito --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
</form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        
            <div class="container">
                <div class="row">
                @if(url()->current() != 'http://127.0.0.1:8000/login' && url()->current() != 'http://127.0.0.1:8000/register' && url()->current() != 'http://127.0.0.1:8000/admin') 
                    <div class="mr-3 col-12">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(array('url'=>'/', 'method'=>'GET', 'autocomplete'=>'off','role'=>'marca')) !!}  
                               
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="marca" id="xaomi" value="Xaomi">
                                    <label class="form-check-label" for="xaomi">Xaomi</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="marca" id="huawei" value="Huawei">
                                    <label class="form-check-label" for="huawei">Huawei </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="marca" id="samsung" value="Samsung">
                                    <label class="form-check-label" for="samsung">Samsung</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="marca" id="realme" value="Realme">
                                    <label class="form-check-label" for="realme">Realme</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="marca" id="motorola" value="Motorola">
                                    <label class="form-check-label" for="motorola">Motorola</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="marca" id="iphone" value="iPhone">
                                    <label class="form-check-label" for="iphone">iPhone</label>
                                  </div>
                                  <div class="form-check form-check-inline float-right">
                                    <button class="btn btn-success text-uppercase btn-block float-right my-2 my-sm-0" type="submit">Filtrar por Marca</button>
                                  </div>

                                  
                                {{Form::close()}}
                            </div>
                        </div>
                        
                    </div>
                    <div class="mr-3 mt-2 col-12">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(array('url'=>'/', 'method'=>'GET', 'autocomplete'=>'off','role'=>'search')) !!}
                               
                                <form>
                                    <div class="form-row">
                                      <div class="col-4">
                                        <input class="form-control mr-sm-2" name="preciomin"  type="search" placeholder="Precio Min" aria-label="Search">
                                      </div>
                                      <div class="col">
                                        <input class="form-control mr-sm-2" name="preciomax" type="search" placeholder="Precio Max" aria-label="Search">
                                      </div>
                                      <div class="col float-right">
                                        <button class="btn btn-success text-uppercase float-right btn-block my-2 my-sm-0" type="submit">Filtrar por Precio</button>
                                      </div>
                                    </div>
                                  </form>
                                  
                                  
                                {{Form::close()}}
                            </div>
                        </div>
                        
                    </div>
                    @endif
                    <div class=" mt-3 jumbotron  col-sm-12" >

                        @yield('content')
                    
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

<style>
.color{
    background: #e3f2fd;
}
</style>

<script>
    //VARIABLE 
    const celda = document.getElementById('lista-product');
    const listaCelular = document.querySelector('#lista-carrito tbody');
    const carrito = document.getElementById('carrito');
    const vaciarCarritoBtn = document.querySelector('#vaciar-carrito');
    const showCelCompra = document.querySelector('.compra-cell');
    // console.log(showCelCompra);

    
    //listener
    cargarEventlinsteners();

    function cargarEventlinsteners(){
        if(celda)
            celda.addEventListener('click', cromprarCell);

        //cuando se elimina un curso del carrito
        carrito.addEventListener('click', eliminarCell);

        //Al Vaciar celulares del carrito
        vaciarCarritoBtn.addEventListener('click', limpiarCarrito)

        //Al cargar el documento, mostrar LocalStoraje
        document.addEventListener('DOMContentLoaded', leerLocalStorge);

    }


    // //Funcion que añade el cursos al carrito
    function cromprarCell(e){
        e.preventDefault();

        //console.log(e.target.classList);
        

        if(e.target.classList.contains('agregar-carrito')){
            const preduCell = e.target.parentElement.parentElement.parentElement.parentElement.parentElement;
            //console.log(preduCell);

            leerDatosCuros(preduCell)
            
        }
    }
    

//Lee los datos del curso
    function leerDatosCuros(preduCell){
        const infoCell = {
            imagen: preduCell.querySelector('img').src,
            titulo: preduCell.querySelector('h4').textContent,
            precio: preduCell.querySelector('.precio').textContent,
            id : preduCell.querySelector('a').getAttribute('data-id')

        }
      //  console.log(infoCell);
        insertarCarrito(infoCell)
    }


    function insertarCarrito(infoCell) {
        const row = document.createElement('tr');
        row.innerHTML = `
            <th>
                <img src="${ infoCell.imagen }" width="50px">
            </th>
            <th>${infoCell.titulo}</th>
            <th>${ infoCell.precio }</th>
            </th>
                <a href="#" class="borrar-celular justify-content-center btn-danger btn mt-1" data-id="${infoCell.id}">X</a>
            </th>
        `;
       // console.log(row);
        
        listaCelular.appendChild(row);

        guardarCursoLocalStore(infoCell);
        
    }
    
    //Eliminar del elemento del carrito carrito
    function eliminarCell(e) {
        console.log(e.target);
        

        e.preventDefault();
       // console.log('eliminado');
         
         let celular,
             celularId;
         if(e.target.classList.contains('borrar-celular')){
            e.target.parentElement.remove();
            celular = e.target.parentElement;
            celularId = celular.querySelector('a').getAttribute('data-id');
           // console.log(celularId);
            
            
         }

        eliminarCellLocalSroege(celularId)
        
    }

        
    //Elimina los cursos del carrito en el DOM
    function limpiarCarrito(){
        //console.log('hola que pasa');
        
        while(listaCelular.firstChild){
            listaCelular.removeChild(listaCelular.firstChild)
        }

        //Vacial localStorage
        vaciarLocalStorage()

        return false;


    }

    function guardarCursoLocalStore(celular) {
        let celulares;

        //toma el calor de un arreglo con datos de LS o Vacio
        celulares = obtenerCelularesLocalStorage();

        //console.log(celulares);

        //el celular selecionando se agrega al arreglo
        celulares.push(celular);
       // console.log(celulares);
        
        localStorage.setItem('celulares', JSON.stringify(celulares));
        
    }

    //comprueba que haya elemento en el local storage
    function obtenerCelularesLocalStorage(){
        let celularLS;

        //comprovamos si hay algo en el localStorega
        if(localStorage.getItem('celulares') === null){
            celularLS = [];
        } else{
            celularLS = JSON.parse( localStorage.getItem('celulares') );
        }
       // mostrarCompra(celularLS)
        return celularLS;
    }

   

    //imprime Los cursos de localStorage en el carrito
    function leerLocalStorge() {
        let celularLS;

        celularLS = obtenerCelularesLocalStorage();

        
        
    //  console.log(celularLS);
        celularLS.forEach(function(celulares){
            
            
            const row = document.createElement('tr');
             row.innerHTML = `
                <th>
                    <img src="${ celulares.imagen }" width="50px">
                </th>
                <th>${celulares.titulo}</th>
                <th>${ celulares.precio }</th>
                </th>
                    <a href="#" class="borrar-celular justify-content-center btn-danger btn mt-1" data-id="${celulares.id}">X</a>
                </th>
            `;
       // console.log(row);
        
             listaCelular.appendChild(row);

        }); 

    }

    //ellimna el curso por Id en LocalStorage
    function eliminarCellLocalSroege(celular) {
        let celularLocaStora;
        
        celularLocaStora = obtenerCelularesLocalStorage();
        console.log(celularLocaStora);
        
        //Iteramos comparmos el ID del celular barramos con los de LS
        celularLocaStora.forEach((celularStora, index) => {
        // Iteramos comparando el ID del curso borrado con los del LS       
            if (celularStora.id === celular) {
                //console.log(celularLocaStora.id);                
                celularLocaStora.splice(index,1);                
            }
        });
        
        //Añadimos el arreglo actual a storage
        localStorage.setItem('celulares', JSON.stringify(celularLocaStora));
        
    }

    // Elimina todos los cursos de Local Storage
    function vaciarLocalStorage() {
        localStorage.clear();   
    }

</script>

</html>
