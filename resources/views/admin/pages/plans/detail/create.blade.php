@extends('adminlte::page')

@section('title', 'Cadastra Novo Detalhe do Plano {{$plan->name}}')

@section('content_header')
    <h1>Cadastra Novo Detalhe do Plano {{$plan->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route("plan.detail.store",[$plan->url])}}" method="post" class="form">
                @csrf
            @include('admin.pages.plans.detail.form')

            <button type="submit" class="btn btn-dark">Criar</button>
             
            </form>
        </div>
    </div>
@stop
