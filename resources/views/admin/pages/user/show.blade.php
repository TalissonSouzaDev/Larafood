@extends('adminlte::page')

@section('title', "Preview do Usuario {{$user->name}}")

@section('content_header')
    <h1>Preview do Usuario {{$user->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        <ul>
            <li><b>NOME: </b>{{$user->name}}</li>
            <li><b>E-mail: </b>{{$user->email}}</li>
            <li><b>Empresa: </b> {{$user->tenant->name}}</li>
            
        </ul>
    </div>

    <div class="card-footer">
       
        <form action="{{route('user.destroy',[$user->id])}}" method="post">
        @csrf
        @method("DELETE")
        <a href="{{route("user.index")}}" class="btn btn-dark">Volta</a>
        <button  type='submit' class="btn btn-danger">Delete</button>
    
    </form>
    </div>
   </div>
@stop
