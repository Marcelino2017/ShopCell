@extends('layouts.app')

@section('content')

<div class="row row-cols-1 row-cols-md-3">
  
  @foreach ($productos as $item)
  <div class="col mb-4">
    <div class="card">
        <img src="{{ Storage::url($item->imagen) }}" class="card-img-top"  width="400px" height="341px" alt="{{ $item->nombre }}">
        <div class="card-body">
          <h3 class="card-title"> <span> {{ $item->nombre }}</span></h3>
          <p class="card-text">${{ $item->precio }}</p>
          <hr>
        
           <a class="text-light btn btn-block btn-lg btn-success text-light" href="/productos/{{ $item->id }}">
             Ver Más
           </a>
        
          
        </div>
      </div>
  </div>
  @endforeach   
</div>
@endsection
