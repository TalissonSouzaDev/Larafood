@extends('adminlte::page')

@section('title', "Atualizar Categoria {{$table->identify}}")

@section('content_header')
    <h1>Atualizar Mesa {{$table->identify}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body"><form action="{{route("table.update",[$table->id])}}" method="post" class="form">
            @csrf
            @method("PUT")
        @include('admin.pages.table.form')

        <button type="submit" class="btn btn-dark">Atualizar</button>
         
        </form>
            
        </div>
    </div>
@stop