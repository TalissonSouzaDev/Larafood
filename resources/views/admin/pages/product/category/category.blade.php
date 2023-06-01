@extends('adminlte::page')

@section('title', "Produto da Categoria")

@section('content_header')
    <h1>Produto da Categoria  {{$product->name}} <a href="{{route("product.category.available",[$product->id])}}" class="btn btn-dark">ADD NOVA CATEGORIA</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("product.index")}}">Produtos</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
    
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width="50px">#</th>

                </tr>
            </thead>

   
            
       
            <tbody>
                @foreach ($category as $categorys)
                <tr>
                    <td>{{$categorys->name}}</td>
                    <td>
                     <a href="{{route('product.category.detach',[$product->id,$categorys->id])}}" class="btn btn-danger">Desvincular</a>
                    
                    </td>
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
       @if (isset($filter))
       {{$category->appends([$filter])->links()}}
           
       @else
       {{$category->links()}}
           
       @endif
    </div>
   </div>
@stop
