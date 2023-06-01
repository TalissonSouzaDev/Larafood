@extends('adminlte::page')

@section('title', 'Cadastra Novo Perfil')

@section('content_header')
    <h1>Cadastra Novo Perfil</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route("profile.store")}}" method="post" class="form">
                @csrf
            @include('admin.pages.profile.form')

            <button type="submit" class="btn btn-dark">Criar</button>
             
            </form>
        </div>
    </div>
@stop
