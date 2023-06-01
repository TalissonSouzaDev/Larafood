@extends('adminlte::page')

@section('title', "Atualizar Usuario {{$user->name}}")

@section('content_header')
    <h1>Atualizar Usuario {{$user->name}}</h1>
    @include('admin.alert.index')
@stop

@section('content')
    <div class="card">
        <div class="card-body"><form action="{{route("user.update",[$user->id])}}" method="post" class="form">
            @csrf
            @method("PUT")
        @include('admin.pages.user.form')

        <button type="submit" class="btn btn-dark">Atualizar</button>
         
        </form>
            
        </div>
    </div>
@stop