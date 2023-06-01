@extends('adminlte::page')

@section('title', "Atualizar Planos {{$plan->name}}")

@section('content_header')
    <h1>Atualizar Planos {{$plan->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body"><form action="{{route("plan.detail.update",[$plan->url,$detail->id])}}" method="post" class="form">
            @csrf
            @method("PUT")
        @include('admin.pages.plans.detail.form')

        <button type="submit" class="btn btn-dark">Atualizar</button>
         
        </form>
            
        </div>
    </div>
@stop