@extends('adminlte::page')

@section('title', "Atualizar Categoria {{$category->name}}")

@section('content_header')
    <h1>Atualizar Categoria {{$category->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body"><form action="{{route("category.update",[$category->id])}}" method="post" class="form">
            @csrf
            @method("PUT")
        @include('admin.pages.category.form')

        <button type="submit" class="btn btn-dark">Atualizar</button>
         
        </form>
            
        </div>
    </div>
@stop