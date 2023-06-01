@extends('adminlte::page')

@section('title', 'Cadastra Nova Mesa')

@section('content_header')
    <h1>Cadastra Nova Mesa</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route("table.store")}}" method="post" class="form">
                @csrf
            @include('admin.pages.table.form')

            <button type="submit" class="btn btn-dark">Criar</button>
             
            </form>
        </div>
    </div>
@stop
