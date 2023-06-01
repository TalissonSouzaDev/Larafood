@extends('adminlte::page')

@section('title', 'Cadastra Novo Permissão')

@section('content_header')
    <h1>Cadastra Novo Permissão</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route("permission.store")}}" method="post" class="form">
                @csrf
            @include('admin.pages.permission.form')

            <button type="submit" class="btn btn-dark">Criar</button>
             
            </form>
        </div>
    </div>
@stop
