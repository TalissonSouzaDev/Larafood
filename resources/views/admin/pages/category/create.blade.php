@extends('adminlte::page')

@section('title', 'Cadastra Nova Categoria')

@section('content_header')
    <h1>Cadastra Nova Categoria</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route("category.store")}}" method="post" class="form">
                @csrf
            @include('admin.pages.category.form')

            <button type="submit" class="btn btn-dark">Criar</button>
             
            </form>
        </div>
    </div>
@stop
