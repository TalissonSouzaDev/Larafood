@extends('adminlte::page')

@section('title', 'Cadastra Novo Usuario')

@section('content_header')
    <h1>Cadastra Novo Usuario</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route("user.store")}}" method="post" class="form">
                @csrf
            @include('admin.pages.user.form')

            <button type="submit" class="btn btn-dark">Criar</button>
             
            </form>
        </div>
    </div>
@stop
