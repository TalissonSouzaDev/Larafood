@extends('adminlte::page')

@section('title', "Permissão do perfil {{$product->title}}")

@section('content_header')

<h1 class="text"> Produto da Categoria</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route("product.index")}}">Produto</a></li>
    </ol>
@stop

@section('content')
   <div class="card">
    @include('admin.alert.index')
    <div class="card-header">
        <form action="{{route('product.category.available',[$product->id])}}" method="post" class="form form-inline">

            @csrf
            
            <div class="form-group">
                <input type="text" class="form-control" title="filter">
                <button class="btn btn-dark" type="submit">Busca</button>
            </div>
            </form>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th >#</th>
                    <th>Nome</th>
                    <th style="position:relative;left:330px">Ação</th>
                </tr>
            </thead>

   
            
       
            <tbody>
              <form action="{{route('product.category.attach',[$product->id])}}" method="post">
                @csrf

                @foreach ($category as $categorys)
                <tr>
                    <td>
                        <input type="checkbox" name="category[]" value="{{$categorys->id}}">
                    </td>
                    <td>{{$categorys->name}}</td>
                    
                 
                </tr>
                @endforeach
                <tr>
                    <td colspan="500">
                        <button class="btn btn-success">Vincular</button>
                    </td>
                </tr>
              </form>
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
