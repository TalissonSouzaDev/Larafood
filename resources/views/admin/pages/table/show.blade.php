@extends('adminlte::page')

@section('title', "Preview da Mesa {{$table->name}}")

@section('content_header')
    <h1>Preview da Categoria {{$table->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        <ul>
            <li><b>Identificação: </b>{{$table->identify}}</li>
            <li><b>Descrição: </b>{{$table->description}}</li>
            <li><b>Empresa: </b> {{$table->tenant->name}}</li>
            
        </ul>
    </div>

    <div class="card-footer">
       
        <form action="{{route('table.destroy',[$table->id])}}" method="post">
        @csrf
        @method("DELETE")
        <a href="{{route("table.index")}}" class="btn btn-dark">Volta</a>
        <button  type='submit' class="btn btn-danger">Delete</button>
    
    </form>
    </div>
   </div>
@stop
