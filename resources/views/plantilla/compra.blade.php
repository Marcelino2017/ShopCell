@extends('layouts.app')

@section('content')

<div class="container col-12">
    <div class=" row col-lg-auto justify-content-center  ">
        <div class="card col-8 col-12 mb-3 compra-cell" style="max-width: 540px;">
           
        </div>
        
    </div>

</div>

<div class="container col-12">
    <div class=" row  justify-content-center">
        <div class="card col-8 ">
            <h3 class="text-center mt-3">Pagar con Tarjeta de Creditos</h3>
            <div class="card-body float-center">
                <form action="" class="form-inline">
                <div class="form-row">
                    <div class="col-12 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-credit-card"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Número de la Tarjeta">
                        </div>
                    </div>
                    <div class="col-12 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Nombre del titular la Tarjeta">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                <option selected>Mes</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                                <option value="6">06</option>
                                <option value="7">07</option>
                                <option value="8">08</option>
                                <option value="9">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>          
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                <option selected>Año</option>
                                <option value="1">20</option>
                                <option value="2">21</option>
                                <option value="3">22</option>
                                <option value="4">23</option>
                                <option value="5">24</option>
                                <option value="6">25</option>
                                <option value="7">26</option>
                                <option value="8">27</option>
                                <option value="9">28</option>
                                <option value="10">29</option>
                                <option value="11">30</option>
                                <option value="12">31</option>
                                <option value="1">32</option>
                                <option value="2">33</option>
                                <option value="3">34</option>
                                <option value="4">35</option>
                                <option value="5">36</option>
                                <option value="6">37</option>
                                <option value="7">38</option>
                                <option value="8">40</option>
                                <option value="9">41</option>
                                <option value="10">42</option>
                                <option value="11">43</option>
                                <option value="12">44</option>
                                <option value="13">45</option>
                                <option value="14">46</option>
                                <option value="15">47</option>
                                <option value="16">49</option>
                                <option value="17">50</option>
                                <option value="18">51</option>
                                <option value="">52</option>
                            </select>                      
                        <input type="email" class="form-control" id="inputEmail3" placeholder="CVC">
                            <br>
                            <select class="custom-select mt-2">
                                <option selected>1 Cuota de $140</option>
                                <option value="1">2  Cuota de $70</option>
                                <option value="2">3  Cuota de $46</option>
                                <option value="3">3  Cuota de $35</option>
                              </select>
                              
                              <br><hr>
                              <button type="button" class="btn btn-success float-left btn-lg ">Pagar</button>
                       </div> 
                    </div>
                    
                </div>

                
            </form> 
                
            </div>
        </div>
    </div>
</div>

@endsection


<script>
    // const showCelCompra = document.querySelector('.compra-cell');
    // console.log(showCelCompra);

    //listener
    cargarEventlinsteners();

    function cargarEventlinsteners(){
        //Al cargar el documento, mostrar LocalStoraje
        document.addEventListener('DOMContentLoaded', mostrarCarrito);

    }
   

    function obtenerCelularesLocalStorage(){
        let celularLS;

        //comprovamos si hay algo en el localStorega
        if(localStorage.getItem('celulares') === null){
            celularLS = [];
        } else{
            celularLS = JSON.parse( localStorage.getItem('celulares') );
           // console.log(celularLS);
        }
        return celularLS;
    }
   
    

    function mostrarCarrito(){
        let showCel;

        showCel = obtenerCelularesLocalStorage();
        console.log(showCel);
        showCel.forEach((element)=>{   
            const row = document.createElement('div');
            row.innerHTML = `
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="${element.imagen}" class="card-img"  width="50px" alt="${element.titulo}">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">${element.titulo}</h5>
                        <p class="card-text">${element.precio}</p>
                        
                    </div>
                    </div>
                </div>
            `;          
            showCelCompra.appendChild(row);       
        }); 
        
    }

</script>