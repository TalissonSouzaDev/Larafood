@extends('adminlte::page')

@section('title', "Atualizar Perfil {{$profile->name}}")

@section('content_header')
    <h1>Atualizar Perfil {{$profile->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body"><form action="{{route("profile.update",[$profile->id])}}" method="post" class="form">
            @csrf
            @method("PUT")
        @include('admin.pages.profile.form')

        <button type="submit" class="btn btn-dark">Atualizar</button>
         
        </form>
            
        </div>
    </div>
@stop