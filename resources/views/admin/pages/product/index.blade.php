@extends('adminlte::page')

@section('title', 'Produto')

@section('content_header')
    <h1>Produto <a href="{{route("product.create")}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("product.index")}}">Produto</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
      @include('admin.pages.product.filter')
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Titulo</th>
                   
                    <th>Ação</th>
                </tr>
            </thead>

   
            
       
            <tbody>
                @foreach ($product as $products)
                <tr>

                    <td><img src="{{url("storage/$products->image")}}" style="max-width:90px"></td>
                    <td>{{$products->title}}</td>
                   
                    <td >
                        <a href="{{route('product.category',[$products->id])}}" class="btn btn-info"><i class="fas fa-layer-group"></i></a>
                        <a href="{{route('product.show',[$products->id])}}" class="btn btn-warning">Ver</a>
                        <a href="{{route('product.edit',[$products->id])}}" class="btn btn-info">Edit</a>
                    
                    </td>
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
       @if (isset($filter))
       {{$product->appends([$filter])->links()}}
           
       @else
       {{$product->links()}}
           
       @endif
    </div>
   </div>
@stop
