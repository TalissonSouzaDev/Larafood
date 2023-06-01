@extends('adminlte::page')

@section('title', "Preview do Permissão {{$permission->name}}")

@section('content_header')
    <h1>Preview do Perfil {{$permission->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        <ul>
            <li><b>NOME: </b>{{$permission->name}}</li>
            <li><b>DESCRIÇÃO: </b>{{$permission->description}}</li>
        </ul>
    </div>

    <div class="card-footer">
       
        <form action="{{route('permission.destroy',[$permission->id])}}" method="post">
        @csrf
        @method("DELETE")
        <a href="{{route("permission.index")}}" class="btn btn-dark">Volta</a>
        <button  type='submit' class="btn btn-danger">Delete</button>
    
    </form>
    </div>
   </div>
@stop
