@extends('adminlte::page')

@section('title', 'Cadastra Novo Produto')

@section('content_header')
    <h1>Cadastra Novo Produto</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route("product.store")}}" method="post" class="form" enctype="multipart/form-data">
                @csrf
            @include('admin.pages.product.form')

            <button type="submit" class="btn btn-dark">Criar</button>
             
            </form>
        </div>
    </div>
@stop
