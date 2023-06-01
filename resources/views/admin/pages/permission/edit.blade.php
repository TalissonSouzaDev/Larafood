@extends('adminlte::page')

@section('title', "Atualizar Permissão {{$permission->name}}")

@section('content_header')
    <h1>Atualizar Perfil {{$permission->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body"><form action="{{route("permission.update",[$permission->id])}}" method="post" class="form">
            @csrf
            @method("PUT")
        @include('admin.pages.permission.form')

        <button type="submit" class="btn btn-dark">Atualizar</button>
         
        </form>
            
        </div>
    </div>
@stop