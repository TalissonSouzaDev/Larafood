@extends('adminlte::page')

@section('title', "Atualizar Cargo {{$role->name}}")

@section('content_header')
    <h1>Atualizar Cargo {{$role->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body"><form action="{{route("role.update",[$role->id])}}" method="post" class="form">
            @csrf
            @method("PUT")
        @include('admin.pages.role.form')

        <button type="submit" class="btn btn-dark">Atualizar</button>
         
        </form>
            
        </div>
    </div>
@stop