@extends('adminlte::page')

@section('title', "Preview do Perfil {{$profile->name}}")

@section('content_header')
    <h1>Preview do Perfil {{$profile->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        <ul>
            <li><b>NOME: </b>{{$profile->name}}</li>
            <li><b>DESCRIÇÃO: </b>{{$profile->description}}</li>
        </ul>
    </div>

    <div class="card-footer">
       
        <form action="{{route('profile.destroy',[$profile->id])}}" method="post">
        @csrf
        @method("DELETE")
        <a href="{{route("profile.index")}}" class="btn btn-dark">Volta</a>
        <button  type='submit' class="btn btn-danger">Delete</button>
    
    </form>
    </div>
   </div>
@stop
