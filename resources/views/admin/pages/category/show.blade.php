@extends('adminlte::page')

@section('title', "Preview da Categoria {{$category->name}}")

@section('content_header')
    <h1>Preview da Categoria {{$category->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        <ul>
            <li><b>NOME: </b>{{$category->name}}</li>
            <li><b>Descrição: </b>{{$category->email}}</li>
            <li><b>Empresa: </b> {{$category->tenant->name}}</li>
            
        </ul>
    </div>

    <div class="card-footer">
       
        <form action="{{route('category.destroy',[$category->id])}}" method="post">
        @csrf
        @method("DELETE")
        <a href="{{route("category.index")}}" class="btn btn-dark">Volta</a>
        <button  type='submit' class="btn btn-danger">Delete</button>
    
    </form>
    </div>
   </div>
@stop
