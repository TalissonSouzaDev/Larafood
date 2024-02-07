@extends('adminlte::page')

@section('title', "Preview do Cargo {{$role->name}}")

@section('content_header')
    <h1>Preview do Cargo {{$role->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        <ul>
            <li><b>NOME: </b>{{$role->name}}</li>
            <li><b>DESCRIÇÃO: </b>{{$role->description}}</li>
        </ul>
    </div>

    <div class="card-footer">
       
        <form action="{{route('role.destroy',[$role->id])}}" method="post">
        @csrf
        @method("DELETE")
        <a href="{{route("role.index")}}" class="btn btn-dark">Volta</a>
        <button  type='submit' class="btn btn-danger">Delete</button>
    
    </form>
    </div>
   </div>
@stop
