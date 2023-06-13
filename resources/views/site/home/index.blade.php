@extends('site.layout.app')

@section('title','Home')

@section('template')

<!-- Carousel -->
<div id="demo" class=" container-fluid carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>
  
    <!-- The slideshow/carousel -->
    <div class="carousel-inner" style="height: 500px">
      <div class="carousel-item active">
        <img src="{{asset('img/slide/bife.jpg')}}" alt="bide" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/slide/pastel.jpg')}}" alt="pastel" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="https://mazer.dev/pt-br/laravel/visao-geral/componentes-de-arquitetura-do-framework-laravel/featured-laravel_hu3769fdde211cec892c1d22aeaa807e50_30091_0x480_resize_box_3.png" alt="New York" class="d-block w-100">
      </div>
    </div>
  
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

@stop

@section('plano')
<div class="plan-content">


    @foreach ($plan as $planos)
    <div class="card card-plan">
      <img class="card-img-top" src="{{asset('img/fundo.jpg')}}" alt="New York" class="d-block w-100" alt="Card image">
      <div class="card-img-overlay">
        <h4 class="card-title"><strong>Plano:</strong> {{$planos->name}}</h4>
        <p class="card-text"><strong>Preço:</strong> R$ {{number_format($planos->price,2,'.',',')}}</p>
        <h4 class="card-title"><strong>Detalhes:</strong></h4>
        @foreach ($planos->details()->get() as $detail)
           
                  <p class="card-text">{{$detail->name}}</p>
            
        @endforeach
        <a href="{{route("plan.subscription",$planos->url)}}" class="btn btn-primary">Comprar o plano {{$planos->name}}</a>
      </div>
    </div>
        
    @endforeach
    
  
    
    
  
</div>

  @endsection





