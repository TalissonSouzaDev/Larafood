@extends('adminlte::page')

@section('title', "Atualizar Planos {{$plan->name}}")

@section('content_header')
    <h1>Atualizar Planos {{$plan->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body"><form action="{{route("plan.update",[$plan->url])}}" method="post" class="form">
            @csrf
            @method("PUT")
        @include('admin.pages.plans.form')

        <button type="submit" class="btn btn-dark">Atualizar</button>
         
        </form>
            
        </div>
    </div>
@stop