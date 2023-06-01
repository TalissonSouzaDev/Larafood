@extends('adminlte::page')

@section('title', 'Cadastra Novo Planos')

@section('content_header')
    <h1>Cadastra Novo Planos</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route("plan.store")}}" method="post" class="form">
                @csrf
            @include('admin.pages.plans.form')

            <button type="submit" class="btn btn-dark">Criar</button>
             
            </form>
        </div>
    </div>
@stop
