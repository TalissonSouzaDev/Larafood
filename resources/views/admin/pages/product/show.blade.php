@extends('adminlte::page')

@section('title', "Preview do Produto {{$product->name}}")

@section('content_header')
    <h1>Preview do Produto {{$product->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        <ul>
            <li><b>Tiulo: </b>{{$product->title}}</li>
            <li><b>Flag: </b>{{$product->flag}}</li>
            <li><b>Preço: </b>{{number_format($product->price,2,',','.')}}</li>
            <li><b>Image: </b> <br> <img src="{{url("storage/$product->image")}}" alt="{{$product->name}}" style="max-width:200px"></li>
            <li><b>Empresa: </b> {{$product->tenant->name}}</li>
            
        </ul>
    </div>

    <div class="card-footer">
       
        <form action="{{route('product.destroy',[$product->id])}}" method="post">
        @csrf
        @method("DELETE")
        <a href="{{route("product.index")}}" class="btn btn-dark">Volta</a>
        <button  type='submit' class="btn btn-danger">Delete</button>
    
    </form>
    </div>
   </div>
@stop
