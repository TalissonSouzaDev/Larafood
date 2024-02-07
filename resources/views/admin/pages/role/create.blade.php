@extends('adminlte::page')

@section('title', 'Cadastra Novo Cargo')

@section('content_header')
    <h1>Cadastra Novo Cargo</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route("role.store")}}" method="post" class="form">
                @csrf
            @include('admin.pages.role.form')

            <button type="submit" class="btn btn-dark">Criar</button>
             
            </form>
        </div>
    </div>
@stop
